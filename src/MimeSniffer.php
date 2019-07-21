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
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Create new instance from given string
     *
     * @param  string $content
     * @return MimeSniffer
     */
    public static function createFromString($content)
    {
        return new self($content);
    }

    /**
     * Create a new instance and load contents of given filename
     *
     * @param  string $filename
     * @return MimeSniffer
     */
    public static function createFromFilename($filename)
    {
        $fp = fopen($filename, 'r');
        $content = fread($fp, 32);
        fclose($fp);

        return new self($content);
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
            if ($type->matches($this->getSignature())) {
                return $type;
            }
        }

        throw new Exceptions\NotMatchingException('No matching type found');
    }

    /**
     * Return file signature of current content
     *
     * @return string
     */
    public function getSignature()
    {
        return strtoupper(substr(bin2hex($this->content), 0, 32));
    }

    /**
     * Return array of type classnames
     *
     * @return array
     */
    private function getTypeClassnames()
    {
        $files = array_diff(scandir(__DIR__ . '/Types'), ['.', '..']);

        return array_map(function ($filename) {
            return "Intervention\\MimeSniffer\\Types\\" . substr($filename, 0, -4);
        }, $files);
    }
}
