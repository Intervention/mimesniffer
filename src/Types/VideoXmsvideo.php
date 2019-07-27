<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class VideoXmsvideo extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "video/x-msvideo";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^52494646.{8}41564920/";
}
