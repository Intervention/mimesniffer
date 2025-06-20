<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ImageHeic extends AbstractBinaryType
{
    /**
     * Name of content type
     */
    public string $name = "image/heic";

    /**
     * Signature pattern: ftyp(heic|heix|hevc|heim|heis|hevm|hevs)
     */
    protected string $pattern = "/66747970(68656963|68656978|68657663|6865696D|68656973|6865766D|68657673)/";
}
