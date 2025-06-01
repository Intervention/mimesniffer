<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ImageSvg extends AbstractType
{
    /**
     * Name of content type
     */
    public string $name = "image/svg+xml";

    /**
     * Signature pattern
     */
    protected string $pattern = "/^(<\?xml[^>]*\?>.*)?<svg[^>]*>/is";
}
