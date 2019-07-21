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
     * Determine if the given content matches the signature
     *
     * @param  string $content
     * @return bool
     */
    public function matches($content)
    {
        return preg_match("/^<\?xml(\s|.)+<svg/i", $content) === 1;
    }
}