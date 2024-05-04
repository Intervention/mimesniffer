<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer;

class MimeSniffer
{
    /**
     * Content to detect mime type from
     *
     * @var string
     */
    protected string $content;

    /**
     * Universal factory method
     *
     * @param mixed $content
     * @return MimeSniffer
     */
    public static function create(mixed $content): self
    {
        if (is_string($content) && file_exists($content)) {
            return self::createFromFilename($content);
        }

        if (is_string($content)) {
            return self::createFromString($content);
        }

        if (is_resource($content)) {
            return self::createFromPointer($content);
        }

        return new self();
    }

    /**
     * Create new instance from given string
     *
     * @param string $content
     *
     * @return MimeSniffer
     */
    public static function createFromString(string $content): self
    {
        return (new self())->setFromString($content);
    }

    /**
     * Load contents of given string into instance
     *
     * @param string $content
     *
     * @return MimeSniffer
     */
    public function setFromString(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Create a new instance and load contents of given filename
     *
     * @param string $filename
     *
     * @return MimeSniffer
     */
    public static function createFromFilename(string $filename): self
    {
        return (new self())->setFromFilename($filename);
    }

    /**
     * Load contents of given filename in current instance
     *
     * @param string $filename
     *
     * @return MimeSniffer
     */
    public function setFromFilename(string $filename): self
    {
        $fp = fopen($filename, 'r');
        $this->setFromString(fread($fp, 1024));
        fclose($fp);

        return $this;
    }

    /**
     * Create a new instance and load contents of given filename
     *
     * @param resource $pointer
     *
     * @return MimeSniffer
     */
    public static function createFromPointer($pointer): self
    {
        return (new self())->setFromPointer($pointer);
    }

    /**
     * Load contents of given filename in current instance
     *
     * @param resource $pointer
     *
     * @return MimeSniffer
     */
    public function setFromPointer($pointer): self
    {
        $this->setFromString(fread($pointer, 1024));

        return $this;
    }

    /**
     * Return detected type
     *
     * @return AbstractType
     */
    public function getType(): AbstractType
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
     * @param AbstractType|string|array<AbstractType|string> $types
     * @return bool
     */
    public function matches(AbstractType|string|array $types): bool
    {
        if (!is_array($types)) {
            $types = [$types];
        }

        $types = array_filter($types, function ($type) {
            return match (true) {
                ($type instanceof AbstractType) => true,
                is_string($type) && class_exists($type) => true,
                default => false,
            };
        });

        $types = array_map(function ($type) {
            return match (true) {
                is_string($type) => new $type(),
                default => $type,
            };
        }, $types);

        $types = array_filter($types, function ($type) {
            return $type instanceof AbstractType;
        });

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
        $files = array_diff(scandir(__DIR__ . '/Types'), ['.', '..']);

        $classnames = array_map(function ($filename) {
            return "Intervention\\MimeSniffer\\Types\\" . substr($filename, 0, -4);
        }, $files);

        return array_filter($classnames, function ($classname) {
            return !in_array($classname, [
                Types\ApplicationOctetStream::class,
                Types\TextPlain::class,
            ]);
        });
    }
}
