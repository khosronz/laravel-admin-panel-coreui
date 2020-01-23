<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ZabbixValuesType extends Enum
{
    const numeric_float = 0;
    const character = 1;
    const log = 2;
    const numeric_unsigned = 3;
    const text = 4;
}
