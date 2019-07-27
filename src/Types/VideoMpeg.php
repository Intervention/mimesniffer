<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class VideoMpeg extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "video/mpeg";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^000001B3/";
}
