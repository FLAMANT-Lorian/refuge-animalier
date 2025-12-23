@props([
   'label',
   'loading_label'
])

<button type="submit"
    {!! $attributes->merge(['class' => 'in-data-loading:hidden hover:cursor-pointer text-white py-3 px-4 border bg-green-500 border-green-500 rounded-lg font-base font-medium hover:bg-transparent hover:text-black transition-all']) !!}>
    {{ $label }}
</button>
<span class="not-in-data-loading:hidden self-end flex felx-row gap-4 items-center">
    {{ $loading_label }}
    <svg width="24" height="24" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" fill="none">
        <circle cx="25" cy="25" r="20" stroke="green" stroke-width="5" stroke-linecap="round"
                stroke-dasharray="31.4 31.4">
            <animateTransform
                attributeName="transform"
                type="rotate"
                from="0 25 25"
                to="360 25 25"
                dur="1s"
                repeatCount="indefinite"
            />
        </circle>
    </svg>
</span>
