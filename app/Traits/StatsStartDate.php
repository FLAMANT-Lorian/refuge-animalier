<?php

namespace App\Traits;

use App\Enums\DateRange;
use Carbon\Carbon;

trait StatsStartDate
{
    public ?string $startDate = null;

    public function getStatsStartDate(string $selected_period): array
    {
        $today = Carbon::now();
        $now = Carbon::now();

        if ($selected_period === DateRange::day->value) {
            $this->startDate = $now->startOfDay();
        } elseif ($selected_period === DateRange::week->value) {
            $this->startDate = $now->startOfWeek();
        } else {
            $this->startDate = $now->startOfMonth();
        }

        return [$this->startDate, $today];
    }
}
