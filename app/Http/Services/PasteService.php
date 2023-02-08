<?php

namespace App\Http\Services;

use App\DTO\Paste\PasteCreationDTO;
use App\Enums\Paste\AccessType;
use App\Http\Services\Interfaces\PasteServiceInterface;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
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

        if ($paste->access_type == AccessType::PRIVATE and $paste->user_id != Auth::id()) {
            throw new ModelNotFoundException();
        }

        return $paste;
    }

    public function createPaste(PasteCreationDTO $paste): Paste
    {
        $paste->userId = Auth::id();

        return $this->pasteRepository->add($paste);
    }

    public function list(int $pageSize = 10): LengthAwarePaginator
    {
        return $this->pasteRepository->getPaginationByUserId(Auth::id(), $pageSize);
    }
}
