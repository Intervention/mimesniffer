<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ImageWebp extends AbstractType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/webp";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^52494646.{8}57454250/";
}
