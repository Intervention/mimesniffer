<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageGif extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "image/gif";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/^47494638(37|39)61/";
}
