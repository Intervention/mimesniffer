<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageGif extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "image/gif";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^47494638(37|39)61/";
}
