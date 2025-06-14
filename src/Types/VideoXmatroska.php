<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class VideoXmatroska extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "video/x-matroska";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^1A45DFA3/";
}
