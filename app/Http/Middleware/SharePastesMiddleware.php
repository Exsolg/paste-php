<?php

namespace App\Http\Middleware;

use App\Repositories\Interfaces\PasteRepositoryInterface;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View as FacadeView;

class SharePastesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    protected PasteRepositoryInterface $pasteRepository;

    public function __construct(PasteRepositoryInterface $pasteRepository)
    {
        $this->pasteRepository = $pasteRepository;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $pastes = Auth::check()
                ? $this->pasteRepository->getLastByUserId(Auth::id())
                : $this->pasteRepository->getLastPublic();

        FacadeView::share('lastPastes', $pastes);

        return $next($request);
    }
}
