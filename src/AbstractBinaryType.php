<?php

declare(strict_types=1);

namespace Intervention\MimeSniffer;

abstract class AbstractBinaryType extends AbstractType
{
    /**
     * Prepare content (can be extended by child classes)
     *
     * @param string $content
     * @return string
     */
    public function prepareContent(string $content): string
    {
        return strtoupper(substr(bin2hex($content), 0, 1024));
    }

    /**
     * {@inheritdoc}
     *
     * @see TypeInterface::isBinary()
     */
    public function isBinary(): bool
    {
        return true;
    }
}
