<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ApplicationZip extends AbstractType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "application/zip";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^504B(0304|0506|0708)/";
}
