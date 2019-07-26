<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationPdf extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "application/pdf";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^255044462D/";
}
