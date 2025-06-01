<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationPdf extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "application/pdf";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^255044462D/";
}
