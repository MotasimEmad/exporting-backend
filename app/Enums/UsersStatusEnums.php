<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class UsersStatusEnums extends Enum
{
    const active = 'active';
    const deleted = 'deleted';
}