@props([
    'notes'
])

<table class="lg:overflow-hidden lg:border-separate lg:rounded-2xl lg:border lg:border-green-300 lg:border-spacing-0">

    {{-- THEAD --}}
    <x-admin.pages.animals.create.table.thead/>

    {{-- TBODY --}}
    <x-admin.pages.animals.create.table.tbody
        :notes="$notes"/>
</table>

