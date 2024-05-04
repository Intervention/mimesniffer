<?php

namespace Intervention\MimeSniffer\Tests;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageBmp;

final class ImageBmpTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.bmp');
        $this->type = $this->sniffer->getType();
    }

    public function testType(): void
    {
        $this->assertInstanceOf(ImageBmp::class, $this->type);
    }

    public function testIsImage(): void
    {
        $this->assertTrue($this->type->isImage());
    }
}
