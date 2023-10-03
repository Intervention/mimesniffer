<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageAvif extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/avif";

    /**
     * Signature pattern
     *
     * ftyp(avif)
     *
     * @var string
     */
    protected $pattern = "/66747970(61766966)/";
}
