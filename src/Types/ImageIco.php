<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ImageIco extends AbstractType
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