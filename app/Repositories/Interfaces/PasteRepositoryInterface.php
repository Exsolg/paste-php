<?php

namespace App\Repositories\Interfaces;

use App\DTO\Paste\PasteCreationDTO;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PasteRepositoryInterface
{
    public function get(string $id): Paste;

    public function getByHash(string $hash): Paste;

    public function add(PasteCreationDTO $paste): Paste;

    public function getLastPublic(int $count = 10): Collection;

    public function getLastByUserId(string $userId, int $count = 10): Collection;

    public function getPaginationByUserId(string $userId, int $pageSize = 10): LengthAwarePaginator;
}
