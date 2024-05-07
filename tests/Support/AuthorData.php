<?php

declare(strict_types=1);

namespace Yieldstudio\TechnicalTestPhp\Tests\Support;

use Yieldstudio\TechnicalTestPhp\Attributes\Groups;
use Yieldstudio\TechnicalTestPhp\Attributes\MapOutputName;
use Yieldstudio\TechnicalTestPhp\Data;

class AuthorData extends Data
{
    #[Groups('public'), MapOutputName('id')]
    public string $uuid;

    #[Groups('public')]
    public string $firstname;

    #[Groups('public')]
    public string $lastname;

    #[Groups('admin')]
    public string $phoneNumber;

    public function __construct(
        string $uuid,
        string $firstname,
        string $lastname,
        string $phoneNumber,
    )
    {
        $this->uuid = $uuid;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phoneNumber = $phoneNumber;
    }
}
