<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageJpeg extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/jpeg";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^FFD8FF(DB|E0|EE|E1)/";
}
