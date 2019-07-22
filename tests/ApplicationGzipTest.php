<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ApplicationGzip;

class ApplicationGzipTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/gzip');
        $this->type = $this->sniffer->getType();
    }

    public function testType()
    {
        $this->assertInstanceOf(ApplicationGzip::class, $this->type);
    }

    public function testIsImage()
    {
        $this->assertFalse($this->type->isImage());
    }
}
