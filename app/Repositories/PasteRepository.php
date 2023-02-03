<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

function hash(string $id): string
{
    $md5 = md5($id);
    $base64 = base64_encode($id);

    $randomMd5Idx = rand(0, strlen($md5) - 6);
    $randomBase64Idx = rand(0, strlen($base64) - 6);

    $md5 = substr($md5, $randomMd5Idx, 5);
    $base64 = substr($base64, $randomBase64Idx, 5);

    return $md5 . $base64;
}

class PasteRepository implements PasteRepositoryInterface
{
    private function isExpired(Paste $paste): bool
    {
        if($paste->expired_at and strtotime($paste->expired_at) < strtotime(date('d-m-Y h:i:s'))) {
            return true;
        }

        return false;
    }

    public function get(string $id): Paste
    {
        $paste = Paste::findOrFail($id);

        if($this->isExpired($paste)) {
            throw new ModelNotFoundException();
        }

        return $paste;
    }

    public function getByHash(string $hash): Paste
    {
        $paste = Paste::where('hash', $hash)->firstOrFail();

        if($this->isExpired($paste)) {
            throw new ModelNotFoundException();
        }

        return $paste;
    }

    public function add(array $data): Paste
    {
        $paste = Paste::create([
            'paste' => $data['paste'],
            'access_type' => $data['accessType'],
            'user_id' => $data['userId'],
            'syntax' => $data['syntax'],
            'expired_at' => $data['expiredAt'],
        ]);

        $paste->hash = hash($paste->id);

        $paste->save();

        return $paste;
    }
}
