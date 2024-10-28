<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class CategoriesActionTypeEnums extends Enum
{
    const links = 'links';
    const other = 'other';
}
