<?php

namespace App\Commands\Page;

use App\Models\Page;
use Carbon\Carbon;

final class GetPageCommand
{

    public function execute(string $link): ?Page
    {
        $page = $this->findByLink($link);

        if ($this->expressed($page)) {
            $page->delete();

            return null;
        }

        return $page;
    }

    private function findByLink(string $link): Page
    {
        return Page::where('link', $link)->first();
    }

    private function expressed(Page $page): bool
    {
       return  Carbon::now()->timestamp > Carbon::parse($page->expires_at)->timestamp;
    }
}
