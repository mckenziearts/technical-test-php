<?php

declare(strict_types=1);

namespace Yieldstudio\TechnicalTestPhp;

interface SerializerInterface
{
    public function serialize(DataInterface $data, array $groups);
}
