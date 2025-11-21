<?php

namespace App\Enums;

enum AnimalStatus: string
{
    case Adopted = 'Adopté';
    case InTreatment = 'En soin';
    case ProcessOfAdoption = 'En cours d’adoptions';
    case AwaitingAdoption = 'En attente d’adoption';
}
