<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ImageSvg extends AbstractType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/svg+xml";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^(<\?xml[^>]*\?>.*)?<svg[^>]*>/is";
}
