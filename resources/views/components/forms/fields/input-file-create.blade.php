@props([
    'wire',
    'name',
    'label',
    'input_content',
    'container_class',
])

<div class="file-input-container {!! $container_class !!}">

    <div {!! $attributes->merge(['class' => 'relative flex flex-col gap-6']) !!}>

        <input wire:model="{{ $wire }}"
               name="{{ $name }}"
               class="sr-only"
               type="file"
               id="file"
               multiple
               accept="image/jpeg, image/png, image/gif, image/webp">

        <div class="relative flex flex-col gap-1">
            <span class="text-base font-semibold pl-3">{!! $label !!}</span>
            <label
                class="hover:cursor-pointer py-[5rem] flex flex-row gap-4 w-full justify-center outline outline-dashed outline-gray-200 hover:outline-gray-400 trans-all rounded-2xl"
                for="file">
                {!! $input_content !!}
                <x-icons.file
                    class="text-black"/>
            </label>
            @error($wire)
            <p class="absolute -bottom-5 text-red text-sm font-medium">{!! $message !!}</p>
            @enderror
            @error($wire . '.*')
            <p class="absolute -bottom-5 text-red text-sm font-medium">{!! $message !!}</p>
            @enderror
        </div>
        <div id="image_container" class="flex flex-col gap-4 max-lg:max-h-[6.5rem] max-h-[18.75rem] overflow-y-auto">
            @foreach ($this->form->pictures as $index => $picture)
                <div
                    class="upload_img flex gap-4 flex-row justify-between items-center px-2 py-1 rounded-lg border border-gray-200">
                    <!-- IMAGE -->
                    <div class="flex flex-row items-center gap-4">
                        <img alt="image"
                             class="w-12 aspect-square rounded-sm"
                             src="{{ $picture->temporaryUrl() }}">
                        <div class="flex flex-col gap-1">
                            <span class="break-all">{{ $picture->getClientOriginalName() }}</span>
                            <span class="font-bold">{{ number_format($picture->getSize() / (1024*1024), 2) }} mo</span>
                        </div>
                    </div>

                    <!-- CROIX -->
                    <button wire:click="deleteImage({{ $index }})"
                            type="button" id="cross" class="cross hover:cursor-pointer">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.7071 11.9889L18.0159 17.2978L17.3088 18.0049L12 12.696L6.69117 18.0049L5.98407 17.2978L11.2929 11.9889L5.99512 6.69116L6.70222 5.98406L12 11.2818L17.2978 5.98406L18.0049 6.69116L12.7071 11.9889Z"
                                fill="currentColor"/>
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>

    </div>

</div>
