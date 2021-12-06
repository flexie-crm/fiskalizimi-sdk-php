<?php

namespace Flexie\Fatura;

use DateTime;
use Exception;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Psr\Http\Message\ResponseInterface;

class Fiskalizimi
{
    /**
     * @var Invoice
     */
    protected $invoice;
    /**
     * @var string
     */
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @throws Exception
     */
    public function newInvoice(Invoice $invoice, $method = "sync"): Invoice
    {
        $this->invoice = $invoice;
        $this->newInvoiceToFlexie($method);

        return $this->invoice;
    }

    /**
     * @throws Exception
     */
    protected function newInvoiceToFlexie($method = "sync")
    {
        if (!$this->invoice instanceof Invoice) {
            throw new Exception("Invoice object not initialized. Create Invoice object first, then send to Flexie");
        }

        try {
            /**@var GuzzleResponse $res */
            $res = $this->sendPayload(($method == "sync") ? Endpoint::FX_NEW_INVOICE : Endpoint::FX_NEW_INVOICE_ASYNC, $this->invoice->toArray());
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody(), true);

            // Check if it's an ok response
            if (!isset($result["ok"]) || !$result["ok"]) {
                throw new Exception("There was an error at Fiskalizimi. Error Code " . $result["fz_error_code"] . ". Error Message " . $result["fz_error_message"]);
            }

            // Enrich invoice properties
            foreach ($result as $key => $value) {
                $this->invoice->enrichInvoiceProperties($key, $value);
            }
        } else {
            throw new Exception("There was an error on HTTP request, failed with code " . $res->getStatusCode() . ". " . $res->getBody()->getContents());
        }
    }

    /**
     * @throws Exception
     */
    public function validateNuis(string $nuis): bool
    {
        // Check NUIS format first
        if (!preg_match('/^[a-zA-Z](.[0-9]{1,8}[a-zA-Z])?$/', $nuis)) {
            throw new Exception("NUIS does not match pattern of starting and ending with a letter, and being 10 characters in length (/^[a-zA-Z](.[0-9]{1,8}[a-zA-Z])?$/).");
        }

        try {
            /**@var GuzzleResponse $res */
            $res = $this->sendPayload(Endpoint::FX_VERIFY_NUIS, [
                "nuis" => $nuis
            ]);
        } catch (Exception $ex) {
            throw new Exception($ex);
        }

        if ($res->getStatusCode() == 200) {
            return (boolean) json_decode($res->getBody(), true)["found"] ?? false;
        }

        return false;
    }

    public function getCurrencyRate(): array
    {
        $client = new Client();
        $response = $client->get(Endpoint::FX_GET_CURRENCY_RATE);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return [];
    }

    /**
     * @throws Exception
     */
    public function getEInvoiceCode(string $nivf): string
    {
        if (empty($nivf)) {
            throw new Exception("Please provide a valid NIVF code in order to retrieve EIC");
        }

        try {
            /**@var GuzzleResponse $res */
            $res = $this->sendPayload(Endpoint::FX_GET_EIC, [
                "nivf" => $nivf
            ]);
        } catch (Exception $ex) {
            throw new Exception($ex);
        }

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true)["eic"] ?? "";
        }

        return "";
    }

    public function getInvoicePdf(string $eic)
    {

    }

    /**
     * @throws Exception
     */
    public function tcrOperation(string $type, float $amount, string $overrideTcrCode = null, $overrideChangeDateTime = null, $method = "sync"): string
    {
        if (!in_array($type, ["INITIAL", "WITHDRAW", "DEPOSIT"])) {
            throw new Exception("Bad TCR Operation, it should be either one of the following: INITIAL, WITHDRAW or DEPOSIT");
        }

        $tcr = [
            "operation" => $type,
            "amount" => $amount
        ];

        if ($overrideTcrCode) {
            $tcr["overrideTcrCode"] = $overrideTcrCode;
        }

        if ($overrideChangeDateTime) {
            $tcr["overrideChangeDateTime"] = $overrideChangeDateTime;
        }

        try {
            /**@var GuzzleResponse $res */
            $res = $this->sendPayload(($method == "sync") ? Endpoint::FX_TCR_OPERATION : Endpoint::FX_TCR_OPERATION_ASYNC, $tcr);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody(), true);

            // Check if it's an ok response
            if (!isset($result["ok"]) || !$result["ok"]) {
                throw new Exception("There was an error at TCR Operation. Error Code " . $result["fz_error_code"] . ". Error Message " . $result["fz_error_message"]);
            }

           return $result["fcdc"] ?? "";
        }

        throw new Exception("There was an error at TCR Operation. Error Code " . $res->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function addTcr(string $tcrIdentifier, DateTime $validFrom, DateTime $validTo = null): string
    {
        if (empty($tcrIdentifier)) {
            throw new Exception("Please provide an alpha-numeric identifier for this TCR, as it would be needed later on, in case you edit it.");
        }

        $tcr = [
            "tcrIdentifier" => $tcrIdentifier,
            "validFrom" => $validFrom->format("Y-m-d")
        ];

        if ($validTo) {
            $tcr["validTo"] = $validTo->format("Y-m-d");
        }

        try {
            /**@var GuzzleResponse $res */
            $res = $this->sendPayload(Endpoint::FX_NEW_TCR, $tcr);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody(), true);

            // Check if it's an ok response
            if (!isset($result["ok"]) || !$result["ok"]) {
                throw new Exception("There was an error at New TCR. Error Code " . $result["fz_error_code"] . ". Error Message " . $result["fz_error_message"]);
            }

            return $result["tcrCode"] ?? "";
        } else {
            throw new Exception("Error on getting new TCRCode from Flexie Service. Error Code " . $res->getStatusCode() . ". Error Message " . $res->getBody()->getContents());
        }
    }

    /**
     * @throws Exception
     */
    public function editTcr(string $tcrIdentifier, DateTime $validTo): bool
    {
        if (empty($tcrIdentifier)) {
            throw new Exception("Please provide a valid TCR Identifier you want to edit");
        }

        try {
            /**@var GuzzleResponse $res */
            $res = $this->sendPayload(Endpoint::FX_EDIT_TCR, [
                "tcrIdentifier" => $tcrIdentifier,
                "validTo" => $validTo->format("Y-m-d")
            ]);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody(), true);

            // Check if it's an ok response
            if (!isset($result["ok"]) || !$result["ok"]) {
                throw new Exception("There was an error on editing TCR. Error Code " . $result["fz_error_code"] . ". Error Message " . $result["fz_error_message"]);
            }

            return true;
        }

        return false;
    }

    /**
     * @param string[] $endpoint
     * @param array $payload
     * @return ResponseInterface
     * @throws Exception
     */
    private function sendPayload(array $endpoint, array $payload): ResponseInterface
    {
        $tokenIssuedDate = new DateTime();
        $tokenExpireDate = new DateTime('+1 hour');

        $token = JWT::encode([
            "iss" => $endpoint["key"],
            "iat" => $tokenIssuedDate->getTimestamp(),
            "exp" => $tokenExpireDate->getTimestamp(),
        ], $endpoint["secret"]);

        $client = new Client([
            'base_uri' => $endpoint["url"],
            'headers' => [
                'Content-Type' => 'application/json',
                'token' => $token,
                'key' => $this->key
            ]
        ]);

        try {
            $response = $client->request('POST', '', [
                'json' => $payload
            ]);

            // Try to decode first
            $responseDecoded = json_decode($response->getBody(), true);

            if (isset($responseDecoded["active"]) && !$responseDecoded["active"]) {
                throw new Exception("Client with KEY " . $this->key . " it's not active, please contact support@flexie.io");
            }

            return $response;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        } catch (GuzzleException $ex) {
            throw new Exception($ex->getMessage());
        }
    }
}