<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageJpeg2000 extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = 'image/jp2';

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^0000000C6A5020200D0A870A/";
}
