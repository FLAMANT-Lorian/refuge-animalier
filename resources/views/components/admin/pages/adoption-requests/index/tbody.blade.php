@props([
 'adoption_requests'
])

<tbody class="flex flex-col gap-6 min-[750px]:grid min-[750px]:grid-cols-2 min-[1100px]:grid-cols-3 lg:block">
    @foreach($this->adoption_requests as $adoption_request)
        <x-admin.pages.adoption-requests.index.tr :adoption_request="$adoption_request"/>
    @endforeach
</tbody>
