<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Tests;

use Intervention\MimeSniffer\Interfaces\TypeInterface;
use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImagePsd;

final class ImagePsdTest extends TestCase
{
    public MimeSniffer $sniffer;
    public TypeInterface $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/stubs/psd');
        $this->type = $this->sniffer->getType();
    }

    public function testType(): void
    {
        $this->assertInstanceOf(ImagePsd::class, $this->type);
    }

    public function testIsImage(): void
    {
        $this->assertTrue($this->type->isImage());
    }
}
