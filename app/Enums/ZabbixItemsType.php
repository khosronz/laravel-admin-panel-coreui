<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ZabbixItemsType extends Enum
{
    const Zabbix_agent = 0;
    const SNMPv1_agent = 1;
    const Zabbix_trapper = 2;
    const simple_check = 3;
    const SNMPv2_agent = 4;
    const Zabbix_internal = 5;
    const SNMPv3_agent = 6;
    const Zabbix_agent_active = 7;
    const Zabbix_aggregate = 8;
    const web_item = 9;
    const external_check = 10;
    const database_monitor = 11;
    const IPMI_agent = 12;
    const SSH_agent = 13;
    const TELNET_agent = 14;
    const calculated = 15;
    const JMX_agent = 16;
    const SNMP_trap = 17;
    const Dependent_item = 18;
    const HTTP_agent = 19;
}
