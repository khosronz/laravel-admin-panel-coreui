<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ZabbixTriggerSeverity extends Enum
{
    const NOT_CLASSIFIED = 0;
    const INFORMATION = 1;
    const WARNING = 2;
    const AVERAGE = 3;
    const HIGH = 4;
    const DISASTER = 5;
}
