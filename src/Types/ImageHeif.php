<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageHeif extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/heif";

    /**
     * Signature pattern
     *
     * ftyp(mif1|msf1)
     *
     * @var string
     */
    protected $pattern = "/66747970(6D696631|6D736631)/";
}
