<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Interfaces;

interface TypeInterface
{
    /**
     * Determine if the given content matches the signature
     */
    public function matches(string $content): bool;

    /**
     * Determine of current type is binary
     */
    public function isBinary(): bool;

    /**
     * Determine if the detected type is an archive
     */
    public function isArchive(): bool;

    /**
     * Determine if the detected type is an audio file
     */
    public function isAudio(): bool;

    /**
     * Determine if the detected type is an video
     */
    public function isVideo(): bool;

    /**
     * Determine if the detected type is an image
     */
    public function isImage(): bool;

    /**
     * Cast type to string
     */
    public function __toString(): string;
}
