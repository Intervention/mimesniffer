<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageBmp extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "image/bmp";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^424D/";
}
