<?php

namespace Intervention\MimeSniffer\Test;

use Intervention\MimeSniffer\Exceptions\NotMatchingException;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageBmp;
use Intervention\MimeSniffer\Types\ImageGif;
use Intervention\MimeSniffer\Types\ImageIco;
use Intervention\MimeSniffer\Types\ImageJpeg;
use Intervention\MimeSniffer\Types\ImagePng;
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
        $sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/images/test.jpg');
        $this->assertEquals('FFD8FFE000104A464946000101000001' , $sniffer->getSignature());
    }

    public function testGetSignature()
    {
        $sniffer = MimeSniffer::createFromString('foo');
        $this->assertEquals('666F6F' , $sniffer->getSignature());

        $content = file_get_contents(__DIR__ . '/../tests/images/test.jpg');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('FFD8FFE000104A464946000101000001' , $sniffer->getSignature());

        $content = file_get_contents(__DIR__ . '/../tests/images/test.png');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('89504E470D0A1A0A0000000D49484452' , $sniffer->getSignature());

        $content = file_get_contents(__DIR__ . '/../tests/images/test.gif');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('47494638396114000F00F40700394B63' , $sniffer->getSignature());

        $content = file_get_contents(__DIR__ . '/../tests/images/test.bmp');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('424D3802000000000000360000002800' , $sniffer->getSignature());

        $content = file_get_contents(__DIR__ . '/../tests/images/test.ico');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('00000100010010100000010020002805' , $sniffer->getSignature());

        $content = file_get_contents(__DIR__ . '/../tests/images/test.webp');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertEquals('52494646C40000005745425056503820' , $sniffer->getSignature());
    }

    public function testGetTypeNotMatching()
    {
        $this->expectException(NotMatchingException::class);
        $sniffer = MimeSniffer::createFromString('foo');
        $sniffer->getType();
    }

    public function testGetTypeJpeg()
    {
        $content = file_get_contents(__DIR__ . '/../tests/images/test.jpg');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertInstanceOf(ImageJpeg::class, $sniffer->getType());
    }

    public function testGetTypePng()
    {
        $content = file_get_contents(__DIR__ . '/../tests/images/test.png');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertInstanceOf(ImagePng::class, $sniffer->getType());
    }

    public function testGetTypeGif()
    {
        $content = file_get_contents(__DIR__ . '/../tests/images/test.gif');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertInstanceOf(ImageGif::class, $sniffer->getType());
    }

    public function testGetTypeBmp()
    {
        $content = file_get_contents(__DIR__ . '/../tests/images/test.bmp');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertInstanceOf(ImageBmp::class, $sniffer->getType());
    }

    public function testGetTypeIco()
    {
        $content = file_get_contents(__DIR__ . '/../tests/images/test.ico');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertInstanceOf(ImageIco::class, $sniffer->getType());
    }

    public function testGetTypeWebp()
    {
        $content = file_get_contents(__DIR__ . '/../tests/images/test.webp');
        $sniffer = MimeSniffer::createFromString($content);
        $this->assertInstanceOf(ImageWebp::class, $sniffer->getType());
    }
}
