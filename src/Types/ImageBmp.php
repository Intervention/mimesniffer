<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageBmp extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "image/bmp";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^424D/";
}
