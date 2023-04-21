<?php

namespace App\Http\Controllers;

use App\Commands\Page\{
        GenerateNewLinkCommand,
        DisableLinkCommand,
        GetPageCommand
};
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    /**
     * @var GenerateNewLinkCommand
     */
    private GenerateNewLinkCommand $generateNewLinkCommand;

    /**
     * @var DisableLinkCommand
     */
    private DisableLinkCommand $disableLinkCommand;

    /**
     * @var GetPageCommand
     */
    private GetPageCommand $getPageCommand;

    public function __construct(
        GenerateNewLinkCommand $generateNewLinkCommand,
        DisableLinkCommand $disableLinkCommand,
        GetPageCommand $getPageCommand
    )
    {
        $this->generateNewLinkCommand = $generateNewLinkCommand;
        $this->disableLinkCommand = $disableLinkCommand;
        $this->getPageCommand = $getPageCommand;
    }

    public function show(string $link): View
    {
        $page = $this->getPageCommand->execute($link);

        if(!$page) {
            return view('generate_new_link');
        }

        $link = $page->link;

        return view('page', compact('link'));
    }

    public function generateNewLink(): RedirectResponse
    {
        $page = $this->generateNewLinkCommand->execute();

        return redirect("/pages/{$page->link}");
    }

    public function showGenerateLink(): View
    {
        return view('generate_new_link');
    }

    public function disableLink(string $link): RedirectResponse
    {
        $this->disableLinkCommand->execute($link);

        return redirect('/pages/link/new');
    }
}
