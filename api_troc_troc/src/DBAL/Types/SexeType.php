<?php

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

class SexeType extends AbstractEnumType
{
    public const MEN = 'men';
    public const WOMEN = 'women';
    public const NOT_PRECISE = 'not-precise';

    public static array $choices = [
        self::MEN => 'homme',
        self::WOMEN => 'femme',
        self::NOT_PRECISE => 'non précisé',
    ];

}