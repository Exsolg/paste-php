<?php

namespace App\Http\Controllers;

use App\Http\Services\Interfaces\PasteServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\View\View;

class PasteController extends Controller
{
    private PasteServiceInterface $pasteService;
    public function __construct(PasteServiceInterface $pasteService)
    {
        $this->pasteService = $pasteService;
    }
    public function getByHash($hash): View
    {
        $paste = $this->pasteService->getPasteByHash($hash);
        return view('paste', ['paste' => $paste]);
    }
}
