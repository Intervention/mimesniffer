<?php

namespace Intervention\MimeSniffer\Types;

use Intervention\MimeSniffer\AbstractType;

class ApplicationOctetStream extends AbstractType
{
    /**
     * Name of content type
     *
     * @var string
     */
    public $name = "application/octet-stream";

    /**
     * Signature pattern
     *
     * @var string
     */
    protected $pattern = "/[\x{00}\x{01}\x{03}\x{04}\x{05}\x{06}\x{07}\x{08}\x{0B}\x{0E}\x{0F}\x{10}\x{11}\x{12}\x{13}\x{14}\x{15}\x{16}\x{17}\x{18}\x{19}\x{1A}\x{1C}\x{1D}\x{1E}\x{1F}]/";
}
