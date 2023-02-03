<?php

namespace App\Http\Controllers;

use App\Http\Requests\Paste\StorePasteRequest;
use App\Http\Services\Interfaces\PasteServiceInterface;
use App\Http\Services\PasteService;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('pastes.get', ['paste' => $paste]);
    }

    public function createPaste(): View
    {
        return view('pastes.create');
    }

    public function store(StorePasteRequest $request): RedirectResponse
    {
        $paste = $this->pasteService->createPaste($request);
        return redirect('/paste/' . $paste->hash);
    }
}
