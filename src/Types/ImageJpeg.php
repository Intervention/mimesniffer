<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ImageJpeg extends AbstractType
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
