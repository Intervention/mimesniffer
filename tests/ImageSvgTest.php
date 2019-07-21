<?php

namespace Intervention\MimeSniffer\Test;

use Intervention\MimeSniffer\Exceptions\NotMatchingException;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageSvg;
use PHPUnit\Framework\TestCase;

class ImageSvgTest extends TestCase
{
    public $sniffer;
    public $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.svg');
        $this->type = $this->sniffer->getType();
    }

    public function testType()
    {
        $this->assertInstanceOf(ImageSvg::class, $this->type);
    }

    public function testIsImage()
    {
        $this->assertTrue($this->type->isImage());
    }

    public function testPlainXmlIsNotSvg()
    {
        $this->expectException(NotMatchingException::class);
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.xml');
        $this->assertInstanceOf(ImageSvg::class, $sniffer->getType());
    }
}
