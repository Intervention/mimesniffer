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
        $content = fread($fp, 256);
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
            if ($type->matches($this->getHeader())) {
                return $type;
            }
        }

        throw new Exceptions\NotMatchingException('No matching type found');
    }

    /**
     * Return head of current content
     *
     * @return string
     */
    public function getHeader()
    {
        if ($this->hasBinaryContent()) {
            return strtoupper(substr(bin2hex($this->content), 0, 32));
        }

        return substr($this->content, 0, 256);
    }

    /**
     * Determine of the current content is binary
     *
     * @return boolean
     */
    public function hasBinaryContent()
    {
        if (is_string($this->content)) {
            
            $binary_chars = [
                "\x00", "\x01", "\x02", "\x03", "\x04", "\x05", "\x06", "\x07",
                "\0x08", "\x0B", "\x0E", "\x0F", "\x10", "\x11", "\x12", "\x13",
                "\x14", "\x15", "\x16", "\x17", "\x18", "\x19", "\x1A", "\x1C",
                "\x1D", "\x1E", "\x1F",
            ];

            foreach ($binary_chars as $char) {
                if (strpos($this->content, $char) !== false) {
                    return true;
                }
            }
        }

        return false;
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
