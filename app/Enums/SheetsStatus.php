<?php

namespace App\Enums;

enum SheetsStatus: string
{
    case InOrder = 'En ordre';
    case Creation = 'Création';
    case Modification = 'Modification';
}
