<?php

namespace App\Repositories\Interfaces;

use App\Models\Paste;

interface PasteRepositoryInterface
{
    public function getPasteById(string $id): Paste;
}
