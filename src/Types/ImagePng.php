<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImagePng extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/png";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^89504E470D0A1A0A/";
}
