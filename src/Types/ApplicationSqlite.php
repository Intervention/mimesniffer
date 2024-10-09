<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractBinaryType;

class ApplicationSqlite extends AbstractBinaryType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public string $name = "application/vnd.sqlite3";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected string $pattern = "/^53514C69746520666F726D6174203300/";
}
