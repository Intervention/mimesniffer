<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class TextPlain extends AbstractType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "text/plain";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^.*/s";
}
