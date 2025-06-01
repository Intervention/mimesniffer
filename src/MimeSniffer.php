<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer;

use Intervention\MimeSniffer\Interfaces\TypeInterface;
use InvalidArgumentException;

class MimeSniffer
{
    /**
     * Content to detect mime type from
     */
    protected string $content;

    /**
     * Create new instance
     *
     * @throws InvalidArgumentException
     */
    public function __construct(mixed $content = null)
    {
        match (true) {
            is_string($content) && file_exists($content) => $this->setFromFilename($content),
            is_string($content) => $this->setFromString($content),
            is_resource($content) => $this->setFromPointer($content),
            default => null,
        };
    }

    /**
     * Create a new instance and load contents of given filename
     *
     * @throws InvalidArgumentException
     */
    public static function createFromFilename(string $filename): self
    {
        return (new self())->setFromFilename($filename);
    }

    /**
     * Create a new instance and load contents of given filename
     *
     * @throws InvalidArgumentException
     */
    public static function createFromPointer(mixed $pointer): self
    {
        return (new self())->setFromPointer($pointer);
    }

    /**
     * Universal factory method
     *
     * @throws InvalidArgumentException
     */
    public static function create(mixed $content): self
    {
        return new self($content);
    }

    /**
     * Create new instance from given string
     *
     * @throws InvalidArgumentException
     */
    public static function createFromString(string $content): self
    {
        return (new self())->setFromString($content);
    }

    /**
     * Load contents of given string into instance
     */
    public function setFromString(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Load contents of given filename in current instance
     *
     * @throws InvalidArgumentException
     */
    public function setFromFilename(string $filename): self
    {
        $fp = fopen($filename, 'r');
        $this->setFromString(fread($fp, 1024));
        fclose($fp);

        return $this;
    }

    /**
     * Load contents of given filename in current instance
     *
     * @throws InvalidArgumentException
     */
    public function setFromPointer(mixed $pointer): self
    {
        if (!is_resource($pointer)) {
            throw new InvalidArgumentException('Argument #1 $pointer must be of type resource.');
        }

        $this->setFromString(fread($pointer, 1024));

        return $this;
    }

    /**
     * Return detected type
     */
    public function getType(): TypeInterface
    {
        foreach ($this->getTypeClassnames() as $classname) {
            $type = new $classname();
            if ($type->matches($this->content)) {
                return $type;
            }
        }

        $binaryType = new Types\ApplicationOctetStream();
        if ($this->matches($binaryType)) {
            return $binaryType;
        }

        return new Types\TextPlain();
    }

    /**
     * Determine if content matches the given type or any if the given types in array
     *
     * @param TypeInterface|string|array<TypeInterface|string> $types
     */
    public function matches(TypeInterface|string|array $types): bool
    {
        if (!is_array($types)) {
            $types = [$types];
        }

        $types = array_filter($types, fn(TypeInterface|string $type): bool => match (true) {
            ($type instanceof TypeInterface) => true,
            class_exists($type) => true,
            default => false,
        });

        $types = array_map(fn(TypeInterface|string $type): TypeInterface => match (true) {
            is_string($type) => new $type(),
            default => $type,
        }, $types);

        foreach ($types as $type) {
            if ($type->matches($this->content)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Return array of type classnames
     *
     * @return array<string>
     */
    private function getTypeClassnames(): array
    {
        $classnames = array_map(
            fn(string $filename): string => "Intervention\\MimeSniffer\\Types\\" . substr($filename, 0, -4),
            array_diff(scandir(__DIR__ . '/Types'), ['.', '..'])
        );

        return array_filter($classnames, function (string $classname): bool {
            return !in_array($classname, [
                Types\ApplicationOctetStream::class,
                Types\TextPlain::class,
            ]);
        });
    }
}
