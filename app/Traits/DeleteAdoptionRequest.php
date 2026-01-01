<?php

namespace App\Traits;

use App\Models\AdoptionRequest;

trait DeleteAdoptionRequest
{
    public function deleteAdoptionRequest(int $id): void
    {
        $this->authorize('delete', AdoptionRequest::class);

        $adoptionRequest = AdoptionRequest::findOrFail($id);

        $adoptionRequest->delete();

        session()->flash('status', __('admin/adoption-requests.delete_flash_message'));

        $this->redirectRoute('admin.adoption-requests.index', [
            'locale' => app()->getLocale()
        ], navigate: true);
    }
}
