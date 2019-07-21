<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ApplicationPdf extends AbstractType
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