<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageTiff extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/tiff";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^(49492A00|4D4D002A)/";
}
