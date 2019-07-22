<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ImageGif extends AbstractType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/gif";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^47494638(37|39)61/";
}
