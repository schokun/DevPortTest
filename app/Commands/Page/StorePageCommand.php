<?php

namespace App\Commands\Page;

use App\Models\Page;
use App\Services\StringGenerator;


final class StorePageCommand
{
    /**
     * @var StringGenerator
     */
    private StringGenerator $stringGeneratorService;

    public function __construct(StringGenerator $stringGeneratorService)
    {
        $this->stringGeneratorService = $stringGeneratorService;
    }

    public function execute(int $userId): Page
    {
        $page = new Page();

        $page->link = $this->stringGeneratorService->generateUniqueString();
        $page->user_id = $userId;
        $page->expires_at = \Carbon\Carbon::now()->addDays(7);

        $page->save();

        return $page;
    }


}
