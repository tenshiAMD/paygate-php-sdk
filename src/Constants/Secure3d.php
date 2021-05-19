<?php

namespace CoreProc\Paynamics\Paygate\Constants;

class Secure3d
{
    public const TRY3D = 'try3d';
    public const ENABLED = 'enabled';

    public static function toArray()
    {
        return [
            self::TRY3D,
            self::ENABLED,
        ];
    }
}
