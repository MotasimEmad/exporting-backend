<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class FeedbackTagEnums extends Enum
{
    const improvement = 'improvement';
    const bug = 'bug';
}
