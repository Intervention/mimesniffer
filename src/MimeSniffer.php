<?php

namespace Intervention\MimeSniffer;

class MimeSniffer
{
    /**
     * Content to search
     *
     * @var string
     */
    protected $content;

    /**
     * Create new instance
     *
     * @param string $content
     */
    public function __construct($content = '')
    {
        $this->setFromString($content);
    }

    /**
     * Create new instance from given string
     *
     * @param string $content
     *
     * @return MimeSniffer
     */
    public static function createFromString(string $content): MimeSniffer
    {
        return new self($content);
    }

    /**
     * Load contents of given string into instance
     *
     * @param string $content
     *
     * @return MimeSniffer
     */
    public function setFromString(string $content): MimeSniffer
    {
        $this->content = strval($content);

        return $this;
    }

    /**
     * Create a new instance and load contents of given filename
     *
     * @param string $filename
     *
     * @return MimeSniffer
     */
    public static function createFromFilename(string $filename): MimeSniffer
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
    public function setFromFilename(string $filename): MimeSniffer
    {
        $fp = fopen($filename, 'r');
        $this->setFromString(fread($fp, 1024));
        fclose($fp);

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
     * Determine if content matches the given type
     * or any if the given types in array
     *
     * @param  AbstractType|array $types AbstractType or array of AbstractTypes
     * @return boolean
     */
    public function matches($types): bool
    {
        if (! is_array($types)) {
            $types = [$types];
        }

        $types = array_map(function ($value) {
            if (is_a($value, AbstractType::class)) {
                return $value;
            }

            if (class_exists($value)) {
                return new $value();
            }
        }, $types);

        $types = array_filter($types, function ($type) {
            return is_a($type, AbstractType::class);
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
     * @return array
     */
    private function getTypeClassnames(): array
    {
        $files = array_diff(scandir(__DIR__ . '/Types'), ['.', '..']);

        $classnames = array_map(function ($filename) {
            return "Intervention\\MimeSniffer\\Types\\" . substr($filename, 0, -4);
        }, $files);

        return array_filter($classnames, function ($classname) {
            return ! in_array($classname, [
                Types\ApplicationOctetStream::class,
                Types\TextPlain::class,
            ]);
        });
    }
}
