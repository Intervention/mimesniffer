<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImagePsd extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "image/vnd.adobe.photoshop";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^38425053/";
}
