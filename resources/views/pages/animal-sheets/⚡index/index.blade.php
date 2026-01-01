<main class="messages_index flex-1" id="content">

    <div class="flex flex-col gap-8 px-6 py-12 md:px-12 lg:px-16 lg:py-10 lg:grid lg:grid-cols-9 lg:gap-6">

        {{-- EN TÊTE --}}
        <x-admin.pages.animal-sheets.heading.section
            :app_title="$app_title"/>

        {{-- TABLEAU DES FiCHES --}}
        <x-admin.pages.animal-sheets.index.table
            class="lg:col-start-1 lg:col-end-10"
            :animal_sheets="$this->animal_sheets"/>

    </div>
    @if($openSheetMessage)
        <x-admin.modals.animal-sheets.animal-sheet
            :sheet="$sheetToSee"/>
    @elseif($openSheetDelete)
        <x-admin.modals.animal-sheets.deleteSheet
            :sheet="$sheetToDelete"/>
    @endif
</main>


