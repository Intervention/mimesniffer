<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ImageSvg extends AbstractType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "image/svg+xml";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^(<\?xml[^>]*\?>.*)?<svg[^>]*>/is";
}
