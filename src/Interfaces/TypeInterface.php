<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Interfaces;

interface TypeInterface
{
    /**
     * Determine if the given content matches the signature
     *
     * @param string $content
     * @return bool
     */
    public function matches(string $content): bool;

    /**
     * Determine of current type is binary
     *
     * @return bool
     */
    public function isBinary(): bool;

    /**
     * Determine if the detected type is an archive
     *
     * @return bool
     */
    public function isArchive(): bool;

    /**
     * Determine if the detected type is an audio file
     *
     * @return bool
     */
    public function isAudio(): bool;

    /**
     * Determine if the detected type is an video
     *
     * @return bool
     */
    public function isVideo(): bool;

    /**
     * Determine if the detected type is an image
     *
     * @return bool
     */
    public function isImage(): bool;

    /**
     * Cast type to string
     *
     * @return string
     */
    public function __toString(): string;
}
