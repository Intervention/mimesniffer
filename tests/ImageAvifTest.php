<?php

namespace Intervention\MimeSniffer\Test;

use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageAvif;

class ImageAvifTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.avif');
        $this->type = $this->sniffer->getType();
    }

    public function testType()
    {
        $this->assertInstanceOf(ImageAvif::class, $this->type);
    }

    public function testIsImage()
    {
        $this->assertTrue($this->type->isImage());
    }
}
