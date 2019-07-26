<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationRar extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "application/x-rar-compressed";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^526172211A07(01)?00/";
}
