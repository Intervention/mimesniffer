<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationTar extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "application/x-tar";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^.{514}7573746172/";
}
