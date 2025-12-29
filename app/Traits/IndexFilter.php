<?php

namespace App\Traits;

trait IndexFilter
{
    public function sortBy(string $column, string $direction): void
    {
        if ($direction === 'middle') {
            $this->filter_direction = null;
            $this->filter_column = null;
            return;
        }

        $this->filter_column = $column;
        $this->filter_direction = $direction;
    }
}
