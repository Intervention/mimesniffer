<?php

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ApplicationZip;

final class ApplicationZipTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/zip');
        $this->type = $this->sniffer->getType();
    }

    public function testType(): void
    {
        $this->assertInstanceOf(ApplicationZip::class, $this->type);
    }

    public function testIsArchive(): void
    {
        $this->assertTrue($this->type->isArchive());
    }
}
