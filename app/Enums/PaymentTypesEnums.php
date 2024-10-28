<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class PaymentTypesEnums extends Enum
{
    const bank_transfer = 'bank_transfer';
    const package = 'package';

    const online_payment = 'online_payment';
}
