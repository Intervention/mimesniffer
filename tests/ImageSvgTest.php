<?php

namespace Intervention\MimeSniffer\Test;

use Intervention\MimeSniffer\Exceptions\NotMatchingException;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageSvg;
use Intervention\MimeSniffer\Types\TextPlain;
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
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.xml');
        $this->assertInstanceOf(TextPlain::class, $sniffer->getType());
    }

    public function testSvgWithoutXmlTag()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/svg');
        $this->assertInstanceOf(ImageSvg::class, $sniffer->getType());
    }
}
