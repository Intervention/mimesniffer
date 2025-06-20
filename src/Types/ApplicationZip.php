<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationZip extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "application/zip";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^504B(0304|0506|0708)/";
}
