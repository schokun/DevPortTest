<?php

namespace App\Commands\Page;

use App\Models\Page;
use App\Services\StringGenerator;

final class GenerateNewLinkCommand
{
    /**
     * @var StringGenerator
     */
    private StringGenerator $stringGeneratorService;

    public function __construct(
        StringGenerator $stringGeneratorService
    )
    {
        $this->stringGeneratorService = $stringGeneratorService;
    }

    public function execute(): Page
    {
        $page = new Page();
        $page->link = $this->stringGeneratorService->generateUniqueString();
        $page->expires_at = \Carbon\Carbon::now()->addDays(7);
        $page->user_id = auth()->id();

        $page->save();

        return $page;
    }
}
