<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationOgg extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "application/ogg";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^4F676753/";
}
