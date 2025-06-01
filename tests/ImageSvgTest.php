<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Tests;

use Intervention\MimeSniffer\Interfaces\TypeInterface;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageSvg;
use Intervention\MimeSniffer\Types\TextPlain;
use PHPUnit\Framework\TestCase;

final class ImageSvgTest extends TestCase
{
    public MimeSniffer $sniffer;
    public TypeInterface $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.svg');
        $this->type = $this->sniffer->getType();
    }

    public function testType(): void
    {
        $this->assertInstanceOf(ImageSvg::class, $this->type);
    }

    public function testIsImage(): void
    {
        $this->assertTrue($this->type->isImage());
    }

    public function testPlainXmlIsNotSvg(): void
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.xml');
        $this->assertInstanceOf(TextPlain::class, $sniffer->getType());
    }

    public function testSvgWithoutXmlTag(): void
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/svg');
        $this->assertInstanceOf(ImageSvg::class, $sniffer->getType());
    }
}
