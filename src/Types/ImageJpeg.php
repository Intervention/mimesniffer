<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageJpeg extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "image/jpeg";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^FFD8FF(DB|E0|E1|E2|E3|E4|E5|E6|E7|E8|E9|EA|EB|EC|ED|EE|EF)/";
}
