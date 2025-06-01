<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationGzip extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "application/gzip";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^1F8B/";
}
