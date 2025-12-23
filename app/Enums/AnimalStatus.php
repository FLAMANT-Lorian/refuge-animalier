<?php

namespace App\Enums;

enum AnimalStatus: string
{
    case Adopted = 'adopted';
    case InTreatment = 'in_treatment';
    case ProcessOfAdoption = 'process_of_adoption';
    case AwaitingAdoption = 'awaiting_adoption';

}
