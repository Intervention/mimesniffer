<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationOgg extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "application/ogg";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^4F676753/";
}
