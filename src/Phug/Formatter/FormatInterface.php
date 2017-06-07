<?php

namespace Phug\Formatter;

use Phug\Formatter;

/**
 * Mandatory methods for all output formats.
 */
interface FormatInterface
{
    public function __construct(Formatter $formatter = null);

    public function format($element);

    public function setFormatter(Formatter $formatter);

    public function removeElementHandler($className);

    public function setElementHandler($className, callable $handler);

    public function removePhpTokenHandler($phpTokenId);

    public function setPhpTokenHandler($phpTokenId, $handler);

    public function __invoke(ElementInterface $element);
}
