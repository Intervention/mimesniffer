<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class AudioFlac extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "audio/flac";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^664C6143/";
}
