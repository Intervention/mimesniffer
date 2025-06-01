<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationRar extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "application/x-rar-compressed";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^526172211A07(01)?00/";
}
