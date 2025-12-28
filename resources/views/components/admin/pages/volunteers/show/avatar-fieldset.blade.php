<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-semibold">{!! __('admin/volunteers.fieldset1_legend') !!}</legend>
    <div class="flex flex-row gap-6">
        @if($this->avatarForm->avatar)
            <img alt="{!! __('admin/settings.avatar_alt') !!}"
                 class="rounded-full h-30 w-30"
                 src="{{ $this->avatarForm->avatar->temporaryUrl() }}">
        @elseif($path = $this->volunteer->avatar_path)
            @if(Storage::disk('public')->exists('avatars/variant/120x120/' . $path))
                <img alt="{!! __('admin/settings.avatar_alt') !!}"
                     class="rounded-full h-30 w-30"
                     src="{{ asset('storage/avatars/variant/120x120/' . $path) }}">
            @else
                <div
                    class="h-30 w-30 rounded-full bg-white border border-gray-200 flex items-center justify-center">
                    <span class="text-black text-center ">{{ __('admin/animals.image_process') }}</span>
                </div>
            @endif
        @else
            <div class="rounded-full h-30 w-30 p-4 bg-gray-100">
                <img alt="{!! __('admin/settings.avatar_alt') !!}"
                     src="{!! asset('assets/img/default-avatar.svg') !!}">
            </div>
        @endif
        <div class="flex flex-col items-center md:flex-row gap-4">
            <div class="inline-flex">
                <input wire:model="avatarForm.avatar" class="single_file sr-only" type="file" name="avatar" id="avatar">
                <label for="avatar"
                       class="font-normal w-full text-center px-4 py-2.5 text-white bg-green-500 rounded-lg border border-green-500 hover:bg-transparent hover:text-black transition-all ease-in-out duration-200 hover:cursor-pointer">
                    {!! __('admin/volunteers.choose_an_avatar') !!}
                </label>
            </div>
            @if($this->volunteer->avatar_path)
                <x-forms.buttons.delete
                    wire:click="openModal('delete-volunteer-avatar')"
                    :label="__('admin/volunteers.delete_avatar')"
                />
            @endif
        </div>
    </div>
</fieldset>


