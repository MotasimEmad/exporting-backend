<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class AdsPublishTypesEnums extends Enum
{
    const link = 'link';
    const description = 'description';
}