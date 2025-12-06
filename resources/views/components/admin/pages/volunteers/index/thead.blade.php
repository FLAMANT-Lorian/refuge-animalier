<thead class="max-lg:hidden w-full bg-green-500">
    <tr x-data="{ arrow_name: 'middle', arrow_email: 'middle', arrow_date: 'middle'}" class="flex w-full items-center">
        <th scope="col" class="p-2 w-[3rem]">
            <input class="volunteers hover:cursor-pointer" type="checkbox" name="all_coll_selector"
                   id="all_coll_selector"
                   title="Séléctionner tout les bénévoles">
            <label for="all_coll_selector" class="sr-only">Séléctionner tout les bénévoles</label>
        </th>
        <th scope="col" class="flex-1 text-left">
            <div class="px-4 py-2">
                <button type="button" @click="
                if (arrow_name === 'middle') {
                    arrow_email = 'middle';
                    arrow_date = 'middle';
                    arrow_name = 'desc'
                } else if (arrow_name === 'desc') {
                     arrow_email = 'middle';
                    arrow_date = 'middle';
                    arrow_name = 'asc'
                } else if (arrow_name === 'asc') {
                     arrow_email = 'middle';
                    arrow_date = 'middle';
                    arrow_name = 'middle'
                }"
                      class="hover:cursor-pointer flex flex-row gap-2 font-semibold text-white">
                    Nom complet
                    <svg class="fill-white transition-all ease-in-out duration-200"
                         :class="{
                            '-rotate-0': arrow_name === 'desc',
                            '-rotate-180': arrow_name === 'asc',
                            '-rotate-90': arrow_name === 'middle'
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
                if (arrow_email === 'middle') {
                    arrow_name = 'middle';
                    arrow_date = 'middle';
                    arrow_email = 'desc'
                } else if (arrow_email === 'desc') {
                     arrow_name = 'middle';
                    arrow_date = 'middle';
                    arrow_email = 'asc'
                } else if (arrow_email === 'asc') {
                     arrow_name = 'middle';
                    arrow_date = 'middle';
                    arrow_email = 'middle'
                }"
                    class="hover:cursor-pointer flex flex-row gap-2 font-semibold text-white">
                    Adresse e-mail
                    <svg class="fill-white transition-all ease-in-out duration-200"
                         :class="{
                            '-rotate-0': arrow_email === 'desc',
                            '-rotate-180': arrow_email === 'asc',
                            '-rotate-90': arrow_email === 'middle'
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
                    arrow_name = 'middle';
                    arrow_email = 'middle';
                    arrow_date = 'desc'
                } else if (arrow_date === 'desc') {
                     arrow_name = 'middle';
                    arrow_email = 'middle';
                    arrow_date = 'asc'
                } else if (arrow_date === 'asc') {
                     arrow_name = 'middle';
                    arrow_email = 'middle';
                    arrow_date = 'middle'
                }"
                    class="hover:cursor-pointer flex flex-row gap-2 font-semibold text-white">
                    Date d’entrée
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
                    Statut
                </span>
            </div>
        </th>
        <th scope="col" class="text-right w-[9.375rem]">
            <div class="px-4 py-2">
                <span class="font-semibold text-white">
                    Actions
                </span>
            </div>
        </th>
    </tr>
</thead>
