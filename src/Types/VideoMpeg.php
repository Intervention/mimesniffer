<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class VideoMpeg extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "video/mpeg";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^000001B3/";
}
