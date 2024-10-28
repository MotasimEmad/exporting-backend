<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class NotificationsScreensEnums extends Enum
{
    const ad_details_screen = '/ad-details-screen';
    const chat_conversations_screen = '/chat-conversations-screen';
    const coupons_screen = 'coupons';
}
