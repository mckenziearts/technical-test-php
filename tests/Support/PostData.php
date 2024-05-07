<?php

declare(strict_types=1);

namespace Yieldstudio\TechnicalTestPhp\Tests\Support;

use Yieldstudio\TechnicalTestPhp\Attributes\Groups;
use Yieldstudio\TechnicalTestPhp\Attributes\MapOutputName;
use Yieldstudio\TechnicalTestPhp\Data;

class PostData extends Data
{
    #[Groups('public'), MapOutputName('id')]
    public string $uuid;

    #[Groups('public')]
    public string $title;

    #[Groups('public')]
    public string $content;

    #[Groups('private')]
    public int $viewsCount;

    #[Groups('public')]
    public AuthorData $author;

    public function __construct(
        string $uuid,
        string $title,
        string $content,
        int $viewsCount,
        AuthorData $author,
    )
    {
        $this->uuid = $uuid;
        $this->title = $title;
        $this->content = $content;
        $this->viewsCount = $viewsCount;
        $this->author = $author;
    }
}
