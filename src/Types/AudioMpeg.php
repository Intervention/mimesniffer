<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class AudioMpeg extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "audio/mpeg";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^(FFFB|494433)/";
}
