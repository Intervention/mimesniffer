<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class TextPlain extends AbstractType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "text/plain";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^.*/s";
}
