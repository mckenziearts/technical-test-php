<?php

declare(strict_types=1);

namespace Yieldstudio\TechnicalTestPhp\Attributes;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE|Attribute::TARGET_PROPERTY)]
readonly class Groups
{
    public function __construct(public string $groups)
    {
    }
}