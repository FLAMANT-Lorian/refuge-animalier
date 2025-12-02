<?php

namespace App\Enums;

enum MessageStatus: string
{
    case read = 'Ouvert';
    case unread = 'Nouveau';
}
