<?php

namespace App\Enum;

enum SessionKey: string
{
    case ALERT_FLASH_MESSAGE = 'alert_flash_message';
    case SUCCESS_FLASH_MESSAGE = 'success_flash_message';
}
