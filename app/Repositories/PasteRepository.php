<?php

namespace App\Repositories;

use App\DTO\Paste\PasteCreationDTO;
use App\Helpers\Arrays;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

function hash(string $id): string
{
    $md5 = md5($id);
    $base64 = base64_encode($id);

    $randomMd5Idx = rand(0, strlen($md5) - 6);
    $randomBase64Idx = rand(0, strlen($base64) - 6);

    $md5 = substr($md5, $randomMd5Idx, 5);
    $base64 = substr($base64, $randomBase64Idx, 5);

    return $md5.$base64;
}

class PasteRepository implements PasteRepositoryInterface
{
    private function isExpired(Paste $paste): bool
    {
        if ($paste->expired_at and strtotime($paste->expired_at) < strtotime(Carbon::now())) {
            return true;
        }

        return false;
    }

    public function get(string $id): Paste
    {
        $paste = Paste::findOrFail($id);

        if ($this->isExpired($paste)) {
            throw new ModelNotFoundException();
        }

        return $paste;
    }

    public function getByHash(string $hash): Paste
    {
        $paste = Paste::where('hash', $hash)->firstOrFail();

        if ($this->isExpired($paste)) {
            throw new ModelNotFoundException();
        }

        return $paste;
    }

    public function add(PasteCreationDTO $paste): Paste
    {
        $paste = $paste->toArray();
        Arrays::keysToSnakeCase($paste);

        $paste = Paste::create($paste);
        $paste->hash = hash($paste->id);
        $paste->save();

        return $paste;
    }

    public function getLastPublic(int $count = 10): Collection
    {
        return Paste::where('access_type', 'public')
                            ->where('expired_at', '>', Carbon::now())
                            ->orderBy('created_at', 'desc')
                            ->limit($count)
                            ->get();
    }

    public function getLastByUserId(string $userId, int $count = 10): Collection
    {
        return Paste::where('user_id', $userId)
                            ->where('expired_at', '>', Carbon::now())
                            ->orderBy('created_at', 'desc')
                            ->limit($count)->get();
    }

    public function getPaginationByUserId(string $userId, int $pageSize = 10): LengthAwarePaginator
    {
        $pastes = Paste::where('user_id', $userId)
                        ->where('expired_at', '>', Carbon::now())
                        ->orderBy('created_at', 'desc')
                        ->paginate($pageSize);

        return $pastes->withQueryString();
    }
}
