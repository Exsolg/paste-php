<?php

namespace App\Repositories\Interfaces;

use App\Models\Paste;

interface PasteRepositoryInterface
{
    public function get(string $id): Paste;
    public function getByHash(string $hash);
    public function add(array $data);
}
