<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageIco extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "image/x-icon";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^00000100/";
}
