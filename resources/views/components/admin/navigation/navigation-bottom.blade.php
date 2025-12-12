@props([
    'profile_data'
])

<div class="flex flex-col gap-4 border-t border-t-gray-200 pt-4 mt-6">

    {{-- PROFIL --}}
    <x-admin.navigation.navigation-profile :profile_data="$profile_data"/>
    <form action="" method="post">
        <button
            class="w-full font-medium px-4 py-2.5 bg-green-500 rounded-lg text-white hover:text-black self-start hover:bg-transparent border border-green-500 transition-all">
            {!! __('admin/navigation.logout') !!}
        </button>
    </form>
</div>
