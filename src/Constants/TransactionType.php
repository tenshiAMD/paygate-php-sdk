<?php

namespace CoreProc\Paynamics\Paygate\Constants;

class TransactionType
{
    public const SALE = 'sale';
    public const AUTHORIZED = 'authorized';
    public const PREAUTHORIZED = 'preauthorized';

    public static function toArray()
    {
        return [
            self::SALE,
            self::AUTHORIZED,
            self::PREAUTHORIZED,
        ];
    }
}
