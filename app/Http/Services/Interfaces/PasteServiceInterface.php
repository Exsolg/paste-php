<?php

namespace App\Http\Services\Interfaces;

use App\Models\Paste;

interface PasteServiceInterface
{
    public function getPasteByHash(string $id): Paste;
}
