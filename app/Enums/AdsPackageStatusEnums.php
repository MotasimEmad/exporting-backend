<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class AdsPackageStatusEnums extends Enum
{
    const active = 'active';
    const inactive = 'inactive';
}
