<thead class="max-lg:hidden w-full bg-green-500">
    <tr x-data="{arrow_date: 'middle', arrow_volunteer: 'middle', arrow_animal: 'middle'}"
        class="flex w-full items-center">
        <th scope="col" class="flex-1 text-left">
            <div class="px-4 py-2">
                <button type="button" @click="
                if (arrow_volunteer === 'middle') {
                    arrow_date = 'middle';
                    arrow_animal= 'middle';
                    arrow_volunteer = 'desc'
                } else if (arrow_volunteer === 'desc') {
                    arrow_date = 'middle';
                    arrow_animal= 'middle';
                    arrow_volunteer = 'asc'
                } else if (arrow_volunteer === 'asc') {
                    arrow_date = 'middle';
                    arrow_animal= 'middle';
                    arrow_volunteer = 'middle'
                }
                $wire.sortBy('volunteer', arrow_volunteer)"
                        class="hover:cursor-pointer flex flex-row gap-2 font-semibold text-white">
                    {!! __('admin/animal-sheets.volunteer') !!}
                    <svg class="fill-white transition-all ease-in-out duration-200"
                         :class="{
                            '-rotate-0': arrow_volunteer === 'desc',
                            '-rotate-180': arrow_volunteer === 'asc',
                            '-rotate-90': arrow_volunteer === 'middle'
                         }"
                         width="24" height="24" viewBox="0 0 24 24"
                         fill="fill-current"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.8641 4V17.182L16.2778 13.9219L17.5 15.0891L12.6111 19.7582C12.2736 20.0806 11.7264 20.0806 11.3889 19.7582L6.5 15.0891L7.72222 13.9219L11.1359 17.182V4H12.8641Z"/>
                    </svg>
                </button>
            </div>
        </th>
        <th scope="col" class="flex-1 text-left">
            <div class="px-4 py-2">
                <button type="button" @click="
                if (arrow_animal === 'middle') {
                    arrow_date = 'middle';
                    arrow_volunteer = 'middle';
                    arrow_animal = 'desc'
                } else if (arrow_animal === 'desc') {
                    arrow_date = 'middle';
                    arrow_volunteer = 'middle';
                    arrow_animal = 'asc'
                } else if (arrow_animal === 'asc') {
                    arrow_date = 'middle';
                    arrow_volunteer = 'middle';
                    arrow_animal = 'middle'
                }
                $wire.sortBy('animal', arrow_animal)"
                        class="hover:cursor-pointer flex flex-row gap-2 font-semibold text-white">
                    {!! __('admin/animal-sheets.animal') !!}
                    <svg class="fill-white transition-all ease-in-out duration-200"
                         :class="{
                            '-rotate-0': arrow_animal === 'desc',
                            '-rotate-180': arrow_animal === 'asc',
                            '-rotate-90': arrow_animal === 'middle'
                         }"
                         width="24" height="24" viewBox="0 0 24 24"
                         fill="fill-current"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.8641 4V17.182L16.2778 13.9219L17.5 15.0891L12.6111 19.7582C12.2736 20.0806 11.7264 20.0806 11.3889 19.7582L6.5 15.0891L7.72222 13.9219L11.1359 17.182V4H12.8641Z"/>
                    </svg>
                </button>
            </div>
        </th>
        <th scope="col" class="flex-1 text-left">
            <div class="px-4 py-2">
                <button type="button" @click="
                if (arrow_date === 'middle') {
                    arrow_volunteer = 'middle';
                    arrow_animal = 'middle';
                    arrow_date = 'desc'
                } else if (arrow_date === 'desc') {
                    arrow_volunteer = 'middle';
                    arrow_animal = 'middle';
                    arrow_date = 'asc'
                } else if (arrow_date === 'asc') {
                    arrow_volunteer = 'middle';
                    arrow_animal = 'middle';
                    arrow_date = 'middle'
                }
                $wire.sortBy('created_at', arrow_date)"
                        class="hover:cursor-pointer flex flex-row gap-2 font-semibold text-white">
                    {!! __('admin/animal-sheets.date') !!}
                    <svg class="fill-white transition-all ease-in-out duration-200"
                         :class="{
                            '-rotate-0': arrow_date === 'desc',
                            '-rotate-180': arrow_date === 'asc',
                            '-rotate-90': arrow_date === 'middle'
                         }"
                         width="24" height="24" viewBox="0 0 24 24"
                         fill="fill-current"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.8641 4V17.182L16.2778 13.9219L17.5 15.0891L12.6111 19.7582C12.2736 20.0806 11.7264 20.0806 11.3889 19.7582L6.5 15.0891L7.72222 13.9219L11.1359 17.182V4H12.8641Z"/>
                    </svg>
                </button>
            </div>
        </th>
        <th scope="col" class="text-left w-[10rem]">
            <div class="px-4 py-2">
                <span class="font-semibold text-white">
                    {!! __('admin/animal-sheets.status') !!}
                </span>
            </div>
        </th>
        <th scope="col" class="text-right w-[9.375rem]">
            <div class="px-4 py-2">
                <span class="font-semibold text-white">
                    {!! __('admin/animal-sheets.actions') !!}
                </span>
            </div>
        </th>
    </tr>
</thead>
