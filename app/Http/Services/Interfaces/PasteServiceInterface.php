<?php

namespace App\Http\Services\Interfaces;

use App\Http\Requests\Paste\StorePasteRequest;
use App\Models\Paste;

interface PasteServiceInterface
{
    public function getPasteByHash(string $id): Paste;
    public function createPaste(StorePasteRequest $request): Paste;
}
