<?php

namespace App\Enums;

enum AdoptionRequestsStatus: string
{
    case Refused = 'refused';
    case InWay = 'in_way';
    case Closed = 'closed';
    case Awaiting = 'awaiting';
}
