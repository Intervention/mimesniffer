<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationOgg extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "application/ogg";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^4F676753/";
}
