<?php

namespace Intervention\MimeSniffer;

abstract class AbstractType
{
    /**
     * Name of content type (mime type)
     *
     * @var string
     */
    public $name = '';

    /**
     * Signature pattern of type
     *
     * @var string
     */
    protected $pattern = "/^$/";

    /**
     * Determine if the given content matches the signature
     *
     * @param  string $content
     * @return bool
     */
    public function matches($content)
    {
        return preg_match($this->pattern, $this->prepareContent($content)) === 1;
    }

    /**
     * Determine if the detected type is an image
     *
     * @return boolean
     */
    public function isImage()
    {
        return substr($this->name, 0, 5) === 'image';
    }

    /**
     * Determine if the detected type is an video
     *
     * @return boolean
     */
    public function isVideo()
    {
        return substr($this->name, 0, 5) === 'video';
    }

    /**
     * Determine if the detected type is an audio file
     *
     * @return boolean
     */
    public function isAudio()
    {
        return substr($this->name, 0, 5) === 'audio';
    }

    /**
     * Determine if the detected type is an archive
     *
     * @return boolean
     */
    public function isArchive()
    {
        return in_array($this->name, [
            'application/zip',
            'application/x-rar-compressed',
            'application/x-tar',
            'application/gzip',
        ]);
    }

    /**
     * Prepare content (can be extended by child classes)
     *
     * @param  string $content
     * @return string
     */
    public function prepareContent($content)
    {
        return substr($content, 0, 1024);
    }

    /**
     * Determine of current type is binary
     *
     * @return boolean
     */
    public function isBinary()
    {
        return false;
    }

    /**
     * Cast type to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
