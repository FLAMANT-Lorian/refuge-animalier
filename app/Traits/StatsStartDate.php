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

    public function getCorrectPeriodForPDF(string $selected_period): string
    {
        if ($selected_period === DateRange::day->value) {
            return Carbon::now()->translatedFormat('d F Y');
        } elseif ($selected_period === DateRange::week->value) {
            return 'Semaine du ' . Carbon::now()->translatedformat('d F Y');
        } else {
            return Carbon::now()->translatedFormat('F') . ' ' . Carbon::now()->year;
        }
    }
}
