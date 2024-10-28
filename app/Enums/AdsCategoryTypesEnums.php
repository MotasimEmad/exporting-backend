<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class AdsCategoryTypesEnums extends Enum
{
    const ad = 'ad';
    const product = 'product';
}
