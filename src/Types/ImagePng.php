<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImagePng extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "image/png";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^89504E470D0A1A0A/";
}
