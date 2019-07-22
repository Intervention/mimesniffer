<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ImageBmp extends AbstractType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/bmp";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^424D/";
}
