<?php

namespace Intervention\MimeSniffer\Test;

use Intervention\MimeSniffer\Exceptions\NotMatchingException;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageBmp;
use Intervention\MimeSniffer\Types\ImageGif;
use Intervention\MimeSniffer\Types\ImageIco;
use Intervention\MimeSniffer\Types\ImageJpeg;
use Intervention\MimeSniffer\Types\ImagePng;
use Intervention\MimeSniffer\Types\ImagePsd;
use Intervention\MimeSniffer\Types\ImageSvg;
use Intervention\MimeSniffer\Types\ImageTiff;
use Intervention\MimeSniffer\Types\ImageWebp;
use PHPUnit\Framework\TestCase;

class MimeSnifferTest extends TestCase
{
    public function testConstructor()
    {
        $sniffer = new MimeSniffer('foo');
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);    
    }

    public function testCreateFromString()
    {
        $sniffer = MimeSniffer::createFromString('foo');
        $this->assertInstanceOf(MimeSniffer::class, $sniffer);    
    }

    public function testCreateFromFilename()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.jpg');
        $this->assertEquals('FFD8FFE000104A464946000101000001' , $sniffer->getHeader());
    }

    public function testGetHeader()
    {
        $sniffer = MimeSniffer::createFromString('foo');
        $this->assertEquals('foo' , $sniffer->getHeader());

        $content = file_get_contents(__DIR__ . '/../tests/files/test.jpg');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('FFD8FFE000104A464946000101000001' , $sniffer->getHeader());

        $content = file_get_contents(__DIR__ . '/../tests/files/test.png');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('89504E470D0A1A0A0000000D49484452' , $sniffer->getHeader());

        $content = file_get_contents(__DIR__ . '/../tests/files/test.gif');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('47494638396114000F00F40700394B63' , $sniffer->getHeader());

        $content = file_get_contents(__DIR__ . '/../tests/files/test.bmp');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('424D3802000000000000360000002800' , $sniffer->getHeader());

        $content = file_get_contents(__DIR__ . '/../tests/files/test.ico');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('00000100010010100000010020002805' , $sniffer->getHeader());

        $content = file_get_contents(__DIR__ . '/../tests/files/test.webp');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('52494646C40000005745425056503820' , $sniffer->getHeader());

        $content = file_get_contents(__DIR__ . '/../tests/stubs/tiff');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('49492A00' , $sniffer->getHeader());

        $content = file_get_contents(__DIR__ . '/../tests/stubs/psd');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('384250531E' , $sniffer->getHeader());
    }

    public function testGetTypeNotMatching()
    {
        $this->expectException(NotMatchingException::class);
        $sniffer = MimeSniffer::createFromString('foo');
        $sniffer->getType();
    }

    public function testGetTypeJpeg()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.jpg');
        $this->assertInstanceOf(ImageJpeg::class, $sniffer->getType());
    }

    public function testGetTypePng()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.png');
        $this->assertInstanceOf(ImagePng::class, $sniffer->getType());
    }

    public function testGetTypeGif()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.gif');
        $this->assertInstanceOf(ImageGif::class, $sniffer->getType());
    }

    public function testGetTypeBmp()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.bmp');
        $this->assertInstanceOf(ImageBmp::class, $sniffer->getType());
    }

    public function testGetTypeIco()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.ico');
        $this->assertInstanceOf(ImageIco::class, $sniffer->getType());
    }

    public function testGetTypeWebp()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.webp');
        $this->assertInstanceOf(ImageWebp::class, $sniffer->getType());
    }

    public function testGetTypeSvg()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.svg');
        $this->assertInstanceOf(ImageSvg::class, $sniffer->getType());
    }

    public function testGetTypeXml()
    {
        $this->expectException(NotMatchingException::class);
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.xml');
        $this->assertInstanceOf(ImageSvg::class, $sniffer->getType());
    }

    public function testGetTypeTiff()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/tiff');
        $this->assertInstanceOf(ImageTiff::class, $sniffer->getType());
    }

    public function testGetTypePsd()
    {
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/psd');
        $this->assertInstanceOf(ImagePsd::class, $sniffer->getType());
    }
}
