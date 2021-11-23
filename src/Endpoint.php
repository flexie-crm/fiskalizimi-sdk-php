<?php

namespace Flexie\Fatura;

abstract class Endpoint
{
    const FX_GET_CURRENCY_RATE = "https://flexie.io/currency";

    const FX_NEW_INVOICE = [
        "url" => "https://fatura.flexie.io/listener/063683f90a4a4b2af1cbb8093ec3cbd2/37703aa073a8fa95d622ec764d6c4bdc",
        "key" => "0FlkkYB1RURvwhXehzfoOkBvrJjp0bgxTDKfESSqYpHw8szqGp",
        "secret" => "VcZ2Z0BlWyOJp0tyjbocoWFFyPYh0tY2jRwbVHCjUeC5sDA0am"
    ];

    const FX_NEW_INVOICE_ASYNC = [
        "url" => "https://fatura.flexie.io/listener/3e4f56b2067d3ac94908c541454dafb7/ce74c424995bf73433dace88eb1ea954",
        "key" => "FpeYkfDz2u0CM0MpsRLoipDte27e4oIJNXI7dlHfQISDJE2cwN",
        "secret" => "BPdeirgpFkNo4BlMJz8rOY9HBTlE5RrGGEUZ6boLvcazOvmx4u"
    ];

    const FX_TCR_OPERATION = [
        "url" => "https://fatura.flexie.io/listener/2332f8d44096443d829f11311a5fac5c/6d9e245cd6670942da4f060d8dc30441",
        "key" => "CsT0gw6ICQ1r9mNeeHna6VYYijKjeSkRleRCKXkmOmOXIBbWjz",
        "secret" => "6pu5oNp97D1rvnGmZqkjN8FB6ochkvRrVlxj9WsgAuI5SosROM"
    ];

    const FX_TCR_OPERATION_ASYNC = [
        "url" => "https://fatura.flexie.io/listener/6118bdc0e0fc16811ed10c33fa6a97e2/71763b04d7fa61cd9c3d085c321e6cd1",
        "key" => "lbWP8X0nzbkIEXSzcPcMO1Gq3R7Le3LAfIpnGpLgB5Yg3RQgG2",
        "secret" => "2u3IV6z2SO5EokmOI2dtjPzh5C9VSPXVk1Ef8di12oFrI2fr5t"
    ];

    const FX_VERIFY_NUIS = [
        "url" => "https://fatura.flexie.io/listener/1badf25a0acce9a818f80c89a731c866/6dd661d4a756c7df5c0afa1a97ea87fa",
        "key" => "LHZOM4tx7K0umNuVAA2CqxakjlubosvddkaKmmWYgQdDFya46b",
        "secret" => "2HoP3lUQ9vlwvBLICWlb52mkonfXXtceC8Wt9MgDOTUrRTMepH"
    ];

    const FX_GET_EIC = [
        "url" => "https://fatura.flexie.io/listener/9d974cbb3f6cb0f49831d66fdfa46101/d0868f01db5976c567c673d445bdbfca",
        "key" => "zNWOTZIoiHmpChBmI5bk5AZfcD3pcyULlQAeQjD800yCh9Y0e9",
        "secret" => "kjKjyWWBm9ahVv7vKXOo6OpErGNqH2z1mkkUhhwDrHUmd2SX0G"
    ];
}