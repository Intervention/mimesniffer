<?php

namespace Intervention\MimeSniffer\Test;

use Intervention\MimeSniffer\Exceptions\NotMatchingException;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ApplicationZip;
use Intervention\MimeSniffer\Types\ImageGif;
use Intervention\MimeSniffer\Types\ImageJpeg;
use Intervention\MimeSniffer\Types\ImagePng;
use Intervention\MimeSniffer\Types\TextPlain;
use PHPUnit\Framework\TestCase;

final class MimeSnifferTest extends TestCase
{
    public function testConstructor(): void
    {
        $sniffer = new MimeSniffer('foo');
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);

        $sniffer = new MimeSniffer();
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);
    }

    public function testCreateFromString(): void
    {
        $sniffer = MimeSniffer::createFromString('foo');
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);
    }

    public function testCreateFromFilename(): void
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.jpg');
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);
    }

    public function testSetFromString(): void
    {
        $sniffer = new MimeSniffer();
        $sniffer = $sniffer->setFromString('foo');
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);
    }

    public function testSetFromFilename(): void
    {
        $sniffer = new MimeSniffer();
        $sniffer = $sniffer->setFromFilename(__DIR__ . '/../tests/stubs/zip');
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);
    }

    public function testMatchesType(): void
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.gif');
        $this->assertTrue($sniffer->matches(new ImageGif()));
        $this->assertFalse($sniffer->matches(new ImageJpeg()));
    }

    public function testMatchesArray(): void
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.gif');
        $this->assertTrue($sniffer->matches([new ImageJpeg(), new ImagePng(), new ImageGif()]));
        $this->assertFalse($sniffer->matches([new ImageJpeg(), new ImagePng()]));
        $this->assertTrue($sniffer->matches([ImageJpeg::class, ImagePng::class, ImageGif::class]));
        $this->assertFalse($sniffer->matches([ImageJpeg::class, ImagePng::class]));
    }

    public function testMatchesBogus(): void
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/zip');
        $this->assertFalse($sniffer->matches('foo'));
        $this->assertFalse($sniffer->matches(['foo', 'bar']));
        $this->assertFalse($sniffer->matches([]));
        $this->assertFalse($sniffer->matches(null));
        $this->assertTrue($sniffer->matches(['foo', ApplicationZip::class]));
    }
}
