<button wire:click="{!! $attributes->wire('click') !!}" type="button" class="hover:cursor-pointer">
    <svg
            {!! $attributes->merge(['class' => 'rounded-0 hover:bg-green-100 border border-transparent hover:border-green-300 hover:rounded-lg transition-all ease-in-out duration-200']) !!}
        width="36" height="36" viewBox="0 0 36 36"
        fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M10 12.1765H26M16 22.7647V16.4118M20 22.7647V16.4118M22 27H14C12.8954 27 12 26.0519 12 24.8824V13.2353C12 12.6505 12.4477 12.1765 13 12.1765H23C23.5523 12.1765 24 12.6505 24 13.2353V24.8824C24 26.0519 23.1046 27 22 27ZM16 12.1765H20C20.5523 12.1765 21 11.7024 21 11.1176V10.0588C21 9.47405 20.5523 9 20 9H16C15.4477 9 15 9.47405 15 10.0588V11.1176C15 11.7024 15.4477 12.1765 16 12.1765Z"
            stroke="#292A2B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</button>
