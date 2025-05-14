<?php

namespace app\helpers;

use Ramsey\Uuid\Uuid;

class UuidHelper
{
    public static function generate() {
        return Uuid::uuid4()->toString();
    }
}