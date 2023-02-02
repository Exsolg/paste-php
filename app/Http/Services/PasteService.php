<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\PasteServiceInterface;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PasteService implements PasteServiceInterface
{
    private PasteRepositoryInterface $pasteRepository;
    public function __construct(PasteRepositoryInterface $pasteRepository)
    {
        $this->pasteRepository = $pasteRepository;
    }

    public function getPasteByHash(string $hash): Paste
    {
        return $this->pasteRepository->getPasteByHash($hash);
    }
}
