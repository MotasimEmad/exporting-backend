<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class CategoriesTypesEnums extends Enum
{
    const main = 'main';
    const other = 'other';
}