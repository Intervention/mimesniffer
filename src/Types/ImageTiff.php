<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ImageTiff extends AbstractType
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
