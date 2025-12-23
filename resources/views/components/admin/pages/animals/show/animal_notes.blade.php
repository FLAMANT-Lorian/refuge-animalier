@props([
    'animal'
])

<section id="notes" class="flex flex-col gap-4 pt-8 border-t border-t-gray-200">
    <h2 class="text-lg">
        {!! __('admin/animals.visit_notes_title') !!}
    </h2>

    <x-admin.pages.animals.show.table.table
        :animal="$animal"/>

    <div class="flex flex-col md:flex-row gap-4 justify-between">
        <button type="button"
                wire:click="openModal('create-note', {!! $animal->id !!})"
                class="text-blue-500 hover:underline hover:cursor-pointer self-start">
            {!! __('admin/animals.add_visit_notes') !!}
        </button>

        {{--  PAGINATION --}}
        {!! $this->notes->links('vendor.livewire.tailwind', ['scrollTo' => false,'results_name' => __('admin/animals.notes')]) !!}
    </div>
</section>
