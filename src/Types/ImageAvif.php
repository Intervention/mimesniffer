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
     * @var string
     */
    protected $pattern = "/^0000001C66747970/";
}
