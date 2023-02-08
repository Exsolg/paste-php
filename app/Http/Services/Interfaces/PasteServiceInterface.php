<?php

namespace App\Http\Services\Interfaces;

use App\DTO\Paste\PasteCreationDTO;
use App\Models\Paste;
use Illuminate\Pagination\LengthAwarePaginator;

interface PasteServiceInterface
{
    public function getPasteByHash(string $hash): Paste;

    public function createPaste(PasteCreationDTO $paste): Paste;

    public function list(int $pageSize): LengthAwarePaginator;
}
