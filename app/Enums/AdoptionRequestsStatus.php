<?php

namespace App\Enums;

enum AdoptionRequestsStatus: string
{
    case Refused = 'Refusées';
    case InWay = 'En cours';
    case Closed = 'Clôturées';
    case Awaiting = 'En attente';
}
