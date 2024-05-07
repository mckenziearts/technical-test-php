<?php

declare(strict_types=1);

namespace Yieldstudio\TechnicalTestPhp;

use ReflectionClass;
use Yieldstudio\TechnicalTestPhp\Attributes\Groups;
use Yieldstudio\TechnicalTestPhp\Attributes\MapOutputName;

class Serialize implements SerializerInterface
{
    public function __construct(?string $type = null)
    {
    }

    public function serialize(DataInterface $data, array $groups): false | string
    {
        $object = $this->extract($data, $groups);

        return json_encode($object, JSON_PRETTY_PRINT);
    }

    protected function reflectProperties(array $data, ReflectionClass $reflectionClass, object $object, array $groups): array
    {
        $reflectionProperties = $reflectionClass->getProperties();

        foreach ($reflectionProperties as $reflectionProperty) {
            $attributes = $reflectionProperty->getAttributes(Groups::class);
            $mapOutputNameAttributes = $reflectionProperty->getAttributes(MapOutputName::class);
            $name = count($mapOutputNameAttributes) > 0
                ? $mapOutputNameAttributes[0]->getArguments()[0]
                : $reflectionProperty->getName();

            foreach ($attributes as $attribute) {
                if (! in_array($attribute->getArguments()[0], $groups)) {
                    continue;
                }

                $value = $reflectionProperty->getValue($object);
                if (is_object($value)) {
                    $value = $this->extract($value, $groups);
                }

                $data[$name] = $value;
            }
        }

        return $data;
    }

    public function extract($object, array $groups): array
    {
        $data = [];
        $reflectionClass = new ReflectionClass($object);

        return $this->reflectProperties($data, $reflectionClass, $object, $groups);
    }
}