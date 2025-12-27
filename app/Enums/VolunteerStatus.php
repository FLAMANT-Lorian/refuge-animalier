<?php

namespace App\Enums;

enum VolunteerStatus: string
{
    case Active = 'Active';
    case InBreak = 'On break';
    case Parts = 'Left';
}
