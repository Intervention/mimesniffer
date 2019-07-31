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
    public static function createFromString($content)
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
    public function setFromString($content)
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
    public static function createFromFilename($filename)
    {
        return (new self)->setFromFilename($filename);
    }

    /**
     * Load contents of given filename in current instance
     *
     * @param string $filename
     *
     * @return MimeSniffer
     */
    public function setFromFilename($filename)
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
    public function getType()
    {
        foreach ($this->getTypeClassnames() as $classname) {
            $type = new $classname;
            if ($type->matches($this->content)) {
                return $type;
            }
        }

        $binaryType = new Types\ApplicationOctetStream;
        if ($this->matches($binaryType)) {
            return $binaryType;
        }

        return new Types\TextPlain;
    }

    /**
     * Determine if content matches the given type
     *
     * @param  AbstractType $type
     * @return boolean
     */
    public function matches(AbstractType $type)
    {
        return $type->matches($this->content);
    }

    /**
     * Return array of type classnames
     *
     * @return array
     */
    private function getTypeClassnames()
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
