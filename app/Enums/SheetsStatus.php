<?php

namespace App\Enums;

enum SheetsStatus: string
{
    case Validate = 'validate';
    case Creation = 'creation';
    case Modification = 'modification';
}
