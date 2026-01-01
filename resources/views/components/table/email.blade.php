@props([
    'destination'
])

<a href="{!! $destination !!}">
    <svg
        {!! $attributes->merge(['class' => 'rounded-0 hover:bg-green-100 border border-transparent hover:border-green-300 hover:rounded-lg transition-all ease-in-out duration-200']) !!}
        width="36"
        height="36"
        viewBox="0 0 36 36"
        fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M10.125 12.125L18 17.1875L26.4375 12.125M11.25 24.3044C10.0074 24.3044 9 23.297 9 22.0544V13.25C9 12.0074 10.0074 11 11.25 11H24.75C25.9926 11 27 12.0074 27 13.25V22.0543C27 23.297 25.9926 24.3044 24.75 24.3044H11.25Z"
            stroke="#292A2B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>

</a>
