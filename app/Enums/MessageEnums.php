<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class MessageEnums extends Enum
{
    const read = 'read';
    const unread = 'unread';
}