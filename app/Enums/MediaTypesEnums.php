<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class MediaTypesEnums extends Enum
{
    const image = 'image';
    const video = 'video';
}