<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer\Tests;

use Intervention\MimeSniffer\Interfaces\TypeInterface;
use PHPUnit\Framework\TestCase;
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ApplicationTar;

final class ApplicationTarTest extends TestCase
{
    public MimeSniffer $sniffer;
    public TypeInterface $type;

    protected function setUp(): void
    {
        $this->sniffer = MimeSniffer::createFromFilename(__DIR__ . '/../tests/files/test.tar');
        $this->type = $this->sniffer->getType();
    }

    public function testType(): void
    {
        $this->assertInstanceOf(ApplicationTar::class, $this->type);
    }

    public function testIsArchive(): void
    {
        $this->assertTrue($this->type->isArchive());
    }
}
