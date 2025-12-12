<div class="sheet_dashboard flex flex-col md:flex-row gap-4 md:h-full">

    {{-- ANIMAUX DANS LE REFUGE --}}
    <div class="w-full flex flex-col gap-6 md:justify-between p-4 border-1 border-[#FF6384] hover:bg-[#FFEAEE] transition-all ease-in-out duration-200 rounded-2xl">
        <p class="text-base font-semibold">{!! __('admin/dashboard.stat1_title') !!}</p>
        <span class="self-end font-bold text-2xl">4</span>
    </div>

    {{-- ADOPTION RÉUSSIES --}}
    <div class="w-full flex flex-col gap-6 md:justify-between p-4 border-1 border-[#36A2EB] hover:bg-[#DEF1FD] transition-all ease-in-out duration-200 rounded-2xl">
        <p class="text-base font-semibold">{!! __('admin/dashboard.stat2_title') !!}</p>
        <span class="self-end font-bold text-2xl">4</span>
    </div>

    {{-- ANIMAUX ACCUEILLIS --}}
    <div class="w-full flex flex-col gap-6 md:justify-between p-4 border-1 border-[#FFCD56] hover:bg-[#FFF5DD] transition-all ease-in-out duration-200 rounded-2xl">
        <p class="text-base font-semibold">{!! __('admin/dashboard.stat3_title') !!}</p>
        <span class="self-end font-bold text-2xl">4</span>
    </div>

</div>
