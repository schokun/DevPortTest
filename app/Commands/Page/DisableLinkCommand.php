<?php

namespace App\Commands\Page;

use App\Models\Page;

final class DisableLinkCommand
{

    public function execute(string $link)
    {
        $page = $this->findByLink($link);
        $page->delete();
    }

    private function findByLink(string $link): Page
    {
        return Page::where('link', $link)->first();
    }
}
