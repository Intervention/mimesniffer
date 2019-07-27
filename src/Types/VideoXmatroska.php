<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class VideoXmatroska extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "video/x-matroska";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^1A45DFA3/";
}
