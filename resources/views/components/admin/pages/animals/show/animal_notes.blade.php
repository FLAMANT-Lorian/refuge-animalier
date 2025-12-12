@props([
    'animal'
])

<section class="flex flex-col gap-4 pt-8 border-t border-t-gray-200">
    <h2 class="text-lg">
        {!! __('admin/animals.visit_notes_title') !!}
    </h2>

    <x-admin.pages.animals.show.table.table
        :animal="$animal"
        :notes="$this->notes"/>

    <div class="flex flex-col md:flex-row gap-4">
        <button type="button"
                wire:click="openModal('create-note', {!! $animal !!})"
                class="text-blue-500 hover:underline hover:cursor-pointer self-start">
            {!! __('admin/animals.add_visit_notes') !!}
        </button>

        {{--  PAGINATION --}}
        {{--{!! $animals->links('vendor.livewire.tailwind', ['results_name' => '$messages']) !!}--}}
    </div>
</section>
