<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer;

use Intervention\MimeSniffer\Interfaces\TypeInterface;

abstract class AbstractType implements TypeInterface
{
    /**
     * Name of content type (mime type)
     *
     * @var string
     */
    public string $name = '';

    /**
     * Signature pattern of type
     *
     * @var string
     */
    protected string $pattern = "/^$/";

    /**
     * {@inheritdoc}
     *
     * @see TypeInterface::matches()
     */
    public function matches(string $content): bool
    {
        return preg_match($this->pattern, $this->prepareContent($content)) === 1;
    }

    /**
     * {@inheritdoc}
     *
     * @see TypeInterface::isImage()
     */
    public function isImage(): bool
    {
        return substr($this->name, 0, 5) === 'image';
    }

    /**
     * {@inheritdoc}
     *
     * @see TypeInterface::isVideo()
     */
    public function isVideo(): bool
    {
        return substr($this->name, 0, 5) === 'video';
    }

    /**
     * {@inheritdoc}
     *
     * @see TypeInterface::isAudio()
     */
    public function isAudio(): bool
    {
        return substr($this->name, 0, 5) === 'audio';
    }

    /**
     * {@inheritdoc}
     *
     * @see TypeInterface::isArchive()
     */
    public function isArchive(): bool
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
     * @param string $content
     * @return string
     */
    public function prepareContent(string $content): string
    {
        return substr($content, 0, 1024);
    }

    /**
     * {@inheritdoc}
     *
     * @see TypeInterface::isBinary()
     */
    public function isBinary(): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     *
     * @see TypeInterface::__toString()
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
