<?php

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageHeic;

final class ImageHeicTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/heic');
        $this->type = $this->sniffer->getType();
    }

    public function testType(): void
    {
        $this->assertInstanceOf(ImageHeic::class, $this->type);
    }

    public function testIsImage(): void
    {
        $this->assertTrue($this->type->isImage());
    }
}
