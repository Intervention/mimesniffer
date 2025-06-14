<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class AudioMpeg extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "audio/mpeg";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^(FFFB|494433)/";
}
