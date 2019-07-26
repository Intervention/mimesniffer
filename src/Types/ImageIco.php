<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageIco extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/x-icon";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^00000100/";
}
