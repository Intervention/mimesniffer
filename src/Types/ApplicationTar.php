<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationTar extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "application/x-tar";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^.{514}7573746172/";
}
