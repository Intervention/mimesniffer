<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageAvif extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "image/avif";

    /**
     * Signature pattern
     *
     * ftyp(avif)
     *
     * @var string
     */
    protected string $pattern = "/66747970(61766966)/";
}
