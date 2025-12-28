<?php

use App\Enums\UserStatus;
use App\Enums\VolunteerStatus;
use App\Jobs\ProcessUploadImages;
use App\Models\User;
use Illuminate\Http\Testing\File;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\actingAs;
use function PHPUnit\Framework\assertCount;

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'first_name' => 'titi',
            'last_name' => 'titi',
            'email' => 'titi@titi.be',
            'notifications' => [
                'adoption_requests' => false,
                'animal_sheets' => false,
                'messages' => false,
                'activity_report' => false,
            ],
            'availability' => [
                'monday' => '',
                'tuesday' => '',
                'wednesday' => '',
                'thursday' => '',
                'friday' => '',
                'saturday' => '',
                'sunday' => '',
            ],
            'role' => UserStatus::Admin->value,
            'status' => VolunteerStatus::Active->value
        ]);

        actingAs($this->user);
    });

    it('verifies if a you can access to the admin settings page', function () {
        Livewire::test('pages::settings')
            ->assertOk();
    });

    it('verifies if an admin can update his information', function () {

        Livewire::test('pages::settings')
            ->set('form.last_name', 'toto')
            ->set('form.notifications.messages', true)
            ->set('form.availability.monday', 'toto')
            ->call('save');

        $this->user->refresh();

        expect($this->user->last_name)->toBe('toto')
            ->and($this->user->availability['monday'])->toBe('toto')
            ->and($this->user->notifications['messages'])->toBeTrue();
    });
});

describe('CONNECTED USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        actingAs($this->user);
    });

    it('verifies if a connected user can add an avatar for the first time', function () {
        Storage::fake();

        $file = UploadedFile::fake()->image('test.png');

        Livewire::test('pages::settings')
            ->set('avatarForm.avatar', $file);

        assertCount(1, Storage::files(config('avatar.original_path')));
        foreach (config('avatar.sizes') as $size) {
            assertCount(1, Storage::files(
                sprintf(
                    config('avatar.path_to_variant'),
                    $size['width'],
                    $size['height']
                )));
        }
    });

    it('verifies if a connected user can change his avatar and that the old one is removed', function () {
        Storage::fake();

        $file_name = 'test.png';
        $image = File::fake()->image($file_name);

        Storage::disk('public')->putFileAs(
            config('avatar.original_path'),
            $image,
            $file_name
        );

        $this->user->avatar_path = $file_name;

        $job = new ProcessUploadImages($file_name, 'avatar');
        $job->handle();

        $new_image = File::fake()->image('fake.png');

        Livewire::test('pages::settings')
            ->set('avatarForm.avatar', $new_image);

        assertCount(1, Storage::files(config('avatar.original_path')));
        foreach (config('avatar.sizes') as $size) {
            assertCount(1, Storage::files(
                sprintf(
                    config('avatar.path_to_variant'),
                    $size['width'],
                    $size['height']
                )));
        }
    });

    it('verifies that a user cans delete his avatars', function () {
        Storage::fake();

        $file_name = 'test.png';
        $image = File::fake()->image($file_name);

        Storage::disk('public')->putFileAs(
            config('avatar.original_path'),
            $image,
            $file_name
        );

        $this->user->avatar_path = $file_name;

        $job = new ProcessUploadImages($file_name, 'avatar');
        $job->handle();

        assertCount(1, Storage::files(config('avatar.original_path')));

        Livewire::test('pages::settings')
            ->call('openModal', 'delete-user-avatar')
            ->call('delete');

        assertCount(0, Storage::files(config('avatar.original_path')));
        foreach (config('avatar.sizes') as $size) {
            assertCount(0, Storage::files(
                sprintf(
                    config('avatar.path_to_variant'),
                    $size['width'],
                    $size['height']
                )));
        }
    });

    it('verifies if a connected user can update his password', function () {
        Livewire::test('pages::settings')
            ->set('changePasswordForm.old_password', 'password')
            ->set('changePasswordForm.new_password', 'totototo')
            ->call('changePassword')
            ->assertHasNoErrors();
    });

    it('verifies if validation for changePassword works correctly', function () {
        Livewire::test('pages::settings')
            ->set('changePasswordForm.old_password', 'password')
            ->set('changePasswordForm.new_password', 'password')
            ->call('changePassword')
            ->assertHasErrors('changePasswordForm.new_password');

        Livewire::test('pages::settings')
            ->set('changePasswordForm.old_password', 'password')
            ->set('changePasswordForm.new_password', '')
            ->call('changePassword')
            ->assertHasErrors('changePasswordForm.new_password');

        Livewire::test('pages::settings')
            ->set('changePasswordForm.old_password', 'wrong_password')
            ->set('changePasswordForm.new_password', 'password')
            ->call('changePassword')
            ->assertHasErrors('changePasswordForm.old_password');
    });
});
