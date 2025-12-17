<?php

namespace App\Enums;

enum MessageStatus: string
{
    case Read = 'Ouvert';
    case Unread = 'Nouveau';
}
