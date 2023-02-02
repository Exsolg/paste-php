<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PasteRepository implements PasteRepositoryInterface
{
    public function getPasteById(string $id): Paste
    {
        return Paste::findOrFail($id);
    }

    public function getPasteByHash(string $hash): Paste
    {
        $paste = Paste::where('hash', $hash)->first();

        if(!$paste) {
            throw new ModelNotFoundException();
        }

        return $paste;
    }
}
