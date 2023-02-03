<?php

namespace App\Http\Services;

use App\Http\Requests\Paste\StorePasteRequest;
use App\Http\Services\Interfaces\PasteServiceInterface;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class PasteService implements PasteServiceInterface
{
    private PasteRepositoryInterface $pasteRepository;
    public function __construct(PasteRepositoryInterface $pasteRepository)
    {
        $this->pasteRepository = $pasteRepository;
    }

    public function getPasteByHash(string $hash): Paste
    {
        $paste = $this->pasteRepository->getByHash($hash);

        if ($paste->access_type == 'private' and $paste->user_id != Auth::user()?->id) {
            throw new ModelNotFoundException();
        }

        return $paste;
    }

    public function createPaste(StorePasteRequest $request): Paste
    {
        $validated = $request->validated();

        $validated['userId'] = Auth::user()?->id;

        return $this->pasteRepository->add($validated);
    }
}
