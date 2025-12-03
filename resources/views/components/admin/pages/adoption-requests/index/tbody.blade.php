@props([
 'adoption_requests'
])

<tbody class="flex flex-col gap-6 min-[750px]:grid min-[750px]:grid-cols-2 min-[1100px]:grid-cols-3 lg:block">
    @for($i=0; $i < 12; $i++)
        <x-admin.pages.adoption-requests.index.tr :adoption_requests="$adoption_requests"/>
    @endfor
</tbody>
