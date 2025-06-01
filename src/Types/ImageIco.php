<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageIco extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "image/x-icon";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^00000100/";
}
