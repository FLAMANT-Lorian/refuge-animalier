<?php

namespace App\Enums;

enum SheetsStatus: string
{
    case Validate = 'Validée';
    case Creation = 'Création';
    case Modification = 'Modification';
}
