<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ZabbixUserGroupPermission extends Enum
{
    const ACCESS_DENIED =   0;
    const ACCESS_READONLY =   2;
    const ACCESS_READWRITE = 3;
}
