<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ApplicationGzip extends AbstractType
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
