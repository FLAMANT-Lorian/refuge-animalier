@props([
    'value',
    'name',
    'id',
    'label'
])

<div class="flex flex-row items-center col-start-1">
    <input class="peer checkbox hover:cursor-pointer"
           type="checkbox"
           name="{!! $name !!}"
           id="{!! $id !!}"
           @if(old($name))
               checked
        @endif>
    <label class="pl-3 hover:cursor-pointer peer-checked:text-black peer-checked:font-medium text-gray-500 transition-all ease-in-out duration-200" for="{!! $id !!}">
        {!! $label !!}
    </label>
</div>
