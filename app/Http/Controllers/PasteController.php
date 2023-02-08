<?php

namespace App\Http\Controllers;

use App\DTO\Paste\PasteCreationDTO;
use App\Http\Requests\Paste\StorePasteRequest;
use App\Http\Services\Interfaces\PasteServiceInterface;
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

    public function getByHash(string $hash): View
    {
        $paste = $this->pasteService->getPasteByHash($hash);

        return view('pastes.get', ['paste' => $paste]);
    }

    public function create(): View
    {
        return view('pastes.create');
    }

    public function store(StorePasteRequest $request): RedirectResponse
    {
        $paste = PasteCreationDTO::create($request->input());
        $paste = $this->pasteService->createPaste($paste);

        return redirect('/paste/'.$paste->hash);
    }

    public function list(Request $request): View
    {
        $pastes = $request->query('pageSize')
                ? $this->pasteService->list((int) $request->query('pageSize'))
                : $this->pasteService->list();

        return view('pastes.list', ['pastes' => $pastes]);
    }
}
