<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImagePsd extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/vnd.adobe.photoshop";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^38425053/";
}
