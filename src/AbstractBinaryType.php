<?php

namespace Intervention\MimeSniffer;

abstract class AbstractBinaryType extends AbstractType
{
    /**
     * Prepare content (can be extended by child classes)
     *
     * @param  string $content
     * @return string
     */
    public function prepareContent(string $content): string
    {
        return strtoupper(substr(bin2hex($content), 0, 1024));
    }

    /**
     * Determine of current type is binary
     *
     * @return boolean
     */
    public function isBinary(): bool
    {
        return true;
    }
}
