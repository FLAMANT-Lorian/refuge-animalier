@props([
    'body',
    'title',
    'sub_title',
    'have_sub_title' => true,
    'delete_modal' => false
])
<div
    class="show_modal p-6 md:p-12 flex h-full w-full justify-center items-center fixed z-50 inset-0 bg-[rgba(0,0,0,0.4)]">
    <div class="flex flex-col gap-4 w-full {{ $delete_modal ? 'lg:max-w-125' : 'lg:max-w-200' }} max-lg:max-w-175 bg-white p-6 rounded-2xl">
        <div class="flex flex-row gap-4 justify-between items-start">
            <div class="flex flex-col gap-1">
                <p class="text-lg font-medium">
                    {!! $title!!}
                </p>
                @if($have_sub_title)
                    <p class="font-base font-normal">
                        {!! $sub_title !!}
                    </p>
                @endif
            </div>
            <button type="button"
                    wire:click="closeModal()">
                <svg class="hover:cursor-pointer hover:bg-gray-100 rounded-none hover:rounded-lg trans-all" width="32"
                     height="32"
                     viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.7071 15.9889L22.0159 21.2978L21.3088 22.0049L16 16.696L10.6912 22.0049L9.98407 21.2978L15.2929 15.9889L9.99512 10.6912L10.7022 9.98406L16 15.2818L21.2978 9.98406L22.0049 10.6912L16.7071 15.9889Z"
                        fill="#292A2B"/>
                </svg>
            </button>
        </div>
        {!! $body !!}
    </div>
</div>
