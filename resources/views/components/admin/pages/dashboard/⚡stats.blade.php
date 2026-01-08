<?php

use App\Enums\DateRange;
use App\Models\Animal;
use App\Traits\StatsStartDate;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {

    use StatsStartDate;

    public string $selected_period;

    public function mount(): void
    {
        $this->selected_period = DateRange::month->value;
    }

    #[Computed]
    public function getStatsAnimalCount(): int
    {
        return Animal::with(['animalNotes', 'animalSheets', 'breed', 'breed.species'])->count();
    }

    #[Computed]
    public function getStatsSuccessAdoptionsCount(): int
    {
        $period = $this->getStatsStartDate($this->selected_period);

        return Animal::with(['animalNotes', 'animalSheets', 'breed', 'breed.species'])
            ->where('adopted_at', '!=', null)
            ->whereBetween('adopted_at', $period)
            ->count();
    }

    #[Computed]
    public function getStatsNewAnimalsCount(): int
    {
        $period = $this->getStatsStartDate($this->selected_period);

        return Animal::with(['animalNotes', 'animalSheets', 'breed', 'breed.species'])
            ->whereBetween('created_at', $period)->count();
    }

    public function downloadPDF()
    {
        $new_animal_count = $this->getStatsNewAnimalsCount();
        $successfully_adopting = $this->getStatsSuccessAdoptionsCount();
        $total_animal_count = $this->getStatsAnimalCount();
        $period = __('enum.' . strtolower($this->selected_period) . '_filter');

        $pdf = Pdf::loadView('pdf.export', [
            'period' => $this->getCorrectPeriodForPDF($this->selected_period),
            'new_animal_count' => $new_animal_count,
            'successfully_adopting' => $successfully_adopting,
            'total_animal_count' => $total_animal_count,
        ]);

        return response()
            ->streamDownload(
                fn() => print($pdf->download()),
                'report-last-' . strtolower($this->selected_period) . '-lespattesheureuses.pdf');
    }
};
?>

<section {!! $attributes->merge(['class' => 'flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white']) !!}>
    <div class="flex flex-col md:flex-row gap-4">
        <h2 class="text-lg font-semibold">
            {!! __('admin/dashboard.stats_title') !!}
        </h2>
        <x-buttons.download-button
            wire="downloadPDF"
            class="md:ml-auto"
            :title="__('admin/dashboard.download_sheet_title')">
            {!! __('admin/dashboard.download_sheet_text') !!}
        </x-buttons.download-button>
        <x-forms.fields.select-filter
            wire="selected_period"
            :all_selector="false"
            id="stats_filter"
            name="stats_filter"
            :label="__('admin/dashboard.stats_filter_text')"
            :with_label="false"
            :collection="DateRange::cases()"
            identifier="value"/>
    </div>

    {{-- STATS --}}
    <x-admin.pages.dashboard.statistics-cards/>
</section>
