<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class AudioFlac extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "audio/flac";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^664C6143/";
}
