<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationZip extends AbstractBinaryType
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
