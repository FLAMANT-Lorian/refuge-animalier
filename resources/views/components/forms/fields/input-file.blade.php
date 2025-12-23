@props([
    'name',
    'label',
    'input_content',
    'container_class',
    'multiple' => false
])

<div class="file-input-container {!! $container_class !!}">

    <div {!! $attributes->merge(['class' => 'flex flex-col gap-4']) !!}>

        <input name="{{ $name }}" class="sr-only" type="file" id="file" @if($multiple) multiple @endif>

        <div class="flex flex-col gap-1">
            <span class="text-base font-semibold pl-3">{!! $label !!}</span>
            <label
                class="hover:cursor-pointer py-[5rem] flex flex-row gap-4 w-full justify-center outline outline-dashed outline-gray-200 hover:outline-gray-400 trans-all rounded-2xl"
                for="file">
                {!! $input_content !!}
                <x-icons.file
                    class="text-black"/>
            </label>
        </div>
        <div id="image_container" class="flex flex-col gap-4 max-lg:max-h-[6.5rem] max-h-[18.75rem] overflow-y-auto"></div>

    </div>

</div>
