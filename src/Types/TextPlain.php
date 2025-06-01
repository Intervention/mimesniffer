<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class TextPlain extends AbstractType
{
    /**
     * Name of content type
     */
    public string $name = "text/plain";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^.*/s";
}
