<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ZabbixUnits extends Enum
{
    const bps  =   'Bps'; // Special processing is used for B (byte), Bps (bytes per second) units, which are divided by 1024
    const unixtime =   'unixtime'; //  translated to “yyyy.mm.dd hh:mm:ss”. To translate correctly, the received value must be a Numeric (unsigned) type of information
    const uptime = 'uptime'; // translated to "hh:mm:ss" or "N days, hh:mm:ss"
    const s = 's';  // parameter is treated as number of seconds. translated to ""yyy mmm ddd hhh mmm sss ms"; parameter is treated as number of seconds.
}
