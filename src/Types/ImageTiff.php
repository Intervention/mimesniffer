<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageTiff extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "image/tiff";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^(49492A00|4D4D002A)/";
}
