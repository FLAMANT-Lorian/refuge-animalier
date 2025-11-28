<?php

namespace App\Enums;

enum DateRange: string
{
    case day = 'Aujourd’hui';
    case week = "Semaine";
    case month = 'Mois';
}
