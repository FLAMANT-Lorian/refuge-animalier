@props([
    'multiple' => false
])

<div class="file-input-container">

    <div {!! $attributes->merge(['class' => 'flex flex-col gap-4']) !!}>

        <input class="sr-only" type="file" id="file" @if($multiple) multiple @endif>

        <div class="flex flex-col gap-1">
            <span class="font-semibold pl-3">Photo de profil</span>
            <label
                class="hover:cursor-pointer py-[5rem] flex flex-row gap-4 w-full justify-center border border-dashed border-gray-200 hover:border-gray-500 trans-all rounded-2xl"
                for="file">
                Choisir une photo de profil&nbsp;&hellip;
                <x-icons.file
                    class="text-black"/>
            </label>
        </div>
        <div id="image_container" class="flex flex-col gap-4 max-h-[12.5rem] overflow-y-auto"></div>

    </div>

</div>
