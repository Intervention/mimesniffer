<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class VideoXmsvideo extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "video/x-msvideo";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^52494646.{8}41564920/";
}
