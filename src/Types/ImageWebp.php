<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageWebp extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "image/webp";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^52494646.{8}57454250/";
}
