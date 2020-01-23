<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ZabbixMediaType extends Enum
{
    const EMAIL = 1;
    const JABBER = 2;
    const SMS = 3;
}
