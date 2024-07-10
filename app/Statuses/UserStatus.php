<?php

namespace App\Statuses;

class UserStatus
{
    public const ADMIN = 1;

    public const USER = 2;

    public static array $statuses = [self::USER, self::ADMIN];
}
