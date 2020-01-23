<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ZabbixUsersStatus extends Enum
{
    const enabled =   0; //default
    const disabled =   1;
}
