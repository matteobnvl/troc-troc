<?php

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

class AnnouncementType extends AbstractEnumType
{
    public const SEARCH = 'search';
    public const PROPOSE = 'propose';

    public static array $choices = [
        self::SEARCH => 'cherche',
        self::PROPOSE => 'propose'
    ];
}