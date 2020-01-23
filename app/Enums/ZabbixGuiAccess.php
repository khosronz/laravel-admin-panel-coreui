<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ZabbixGuiAccess extends Enum
{
    const system =   0; //default
    const internal =   1;
    const LDAP = 2;
    const disable = 3;

}
