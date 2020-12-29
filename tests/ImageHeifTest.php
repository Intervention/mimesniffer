<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageHeif;

class ImageHeifTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/heif');
        $this->type = $this->sniffer->getType();
    }

    public function testType()
    {
        $this->assertInstanceOf(ImageHeif::class, $this->type);
    }

    public function testIsImage()
    {
        $this->assertTrue($this->type->isImage());
    }
}
