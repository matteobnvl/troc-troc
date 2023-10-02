<?php

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

class LibelleCategoryType extends AbstractEnumType
{
    public const EATING = 'eating';
    public const ENTERTAINMENT = 'entertainment';
    public const HOME_APPLIANCE = 'home-appliance';
    public const SERVICE = 'service';
    public const DIVERS = 'divers';

    public static array $choices = [
        self::EATING => 'alimentaire',
        self::ENTERTAINMENT => 'divertissement',
        self::HOME_APPLIANCE => 'électroménager',
        self::SERVICE => 'service',
        self::DIVERS => 'divers'
    ];
}