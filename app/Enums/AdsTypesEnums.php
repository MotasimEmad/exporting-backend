<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class AdsTypesEnums extends Enum
{
    const normal = 'normal';
    const banner = 'banner';
}