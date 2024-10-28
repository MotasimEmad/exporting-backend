<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class AdsStatusEnums extends Enum
{
    const live = 'live';
    const pending = 'pending';
    const requested_design = 'requested_design';
    const rejected = 'rejected';
}