<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageHeif extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "image/heif";

    /**
     * Signature pattern
     *
     * ftyp(mif1|msf1)
     *
     * @var string
     */
    protected string $pattern = "/66747970(6D696631|6D736631)/";
}
