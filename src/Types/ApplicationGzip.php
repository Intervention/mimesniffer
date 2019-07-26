<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationGzip extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "application/gzip";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^1F8B/";
}
