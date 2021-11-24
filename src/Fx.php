<?php

namespace Flexie\Fatura;

class Fx
{
    const ASYNC = "async";
    const SYNC = "sync";
    const B2B = "b2b";
    const B2C = "b2c";
    const AUTO_INVOICE = "auto";
    const EXPORT_INVOICE = "export";

    const AUTO_INVOICE_AGREEMENT = "AGREEMENT";
    const AUTO_INVOICE_DOMESTIC = "DOMESTIC";
    const AUTO_INVOICE_ABROAD = "ABROAD";
    const AUTO_INVOICE_SELF = "SELF";
    const AUTO_INVOICE_OTHER = "OTHER";

    const PAYMENT_METHOD_BANK = "ACCOUNT";
    const PAYMENT_METHOD_CASH = "BANKNOTE";
    const PAYMENT_METHOD_CREDIT_CARD = "CARD";
    const PAYMENT_METHOD_CHECK = "CHECK";
    const PAYMENT_METHOD_SVOUCHER = "SVOUCHER";
    const PAYMENT_METHOD_COMPANY = "COMPANY";
    const PAYMENT_METHOD_ORDER = "ORDER";
    const PAYMENT_METHOD_FACTORING = "FACTORING";
    const PAYMENT_METHOD_COMPENSATION = "COMPENSATION";
    const PAYMENT_METHOD_TRANSFER = "TRANSFER";
    const PAYMENT_METHOD_WAIVER = "WAIVER";
    const PAYMENT_METHOD_KIND = "KIND";
    const PAYMENT_METHOD_OTHER = "OTHER";

    const BUSINESS_PROCESS_P1 = "P1";
    const BUSINESS_PROCESS_P2 = "P2";
    const BUSINESS_PROCESS_P6 = "P6";

    const VAT_TYPE_1 = "TYPE_1";
    const VAT_TYPE_2 = "TYPE_2";
    const VAT_MARGIN = "MARGIN_SCHEME";
    const VAT_EXPORT = "EXPORT_OF_GOODS";
}
