<section class="flex flex-col gap-4 pt-8 border-t border-t-gray-200">
    <h2 class="text-lg">
        Notes de visite
    </h2>

    <x-admin.pages.animals.show.table.table
        :notes="$this->notes"/>

    <div class="flex flex-col md:flex-row gap-4">
        <button type="button" class="text-blue-500 hover:underline hover:cursor-pointer self-start">
            Ajouter une nouvelle note de visite
        </button>
        {{--  PAGINATION --}}
        {{--{!! $animals->links('vendor.livewire.tailwind', ['results_name' => '$messages']) !!}--}}
    </div>
</section>
