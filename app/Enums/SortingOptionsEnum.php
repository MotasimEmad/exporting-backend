<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class SortingOptionsEnum extends Enum
{
    const oldest = 'oldest';
    const newest = 'newest';
}
