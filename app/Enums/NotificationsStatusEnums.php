<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class NotificationsStatusEnums extends Enum
{
    const read = 'read';
    const unread = 'unread';
}
