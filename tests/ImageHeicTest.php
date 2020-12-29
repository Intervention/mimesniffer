<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageHeic;

class ImageHeicTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/heic');
        $this->type = $this->sniffer->getType();
    }

    public function testType()
    {
        $this->assertInstanceOf(ImageHeic::class, $this->type);
    }

    public function testIsImage()
    {
        $this->assertTrue($this->type->isImage());
    }
}
