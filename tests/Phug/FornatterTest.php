<?php

namespace Phug\Test;

use Phug\Formatter;
use Phug\Formatter\Format\HtmlFormat;
use Phug\Formatter\Element\MarkupElement;

class FormatterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Phug\Formatter
     */
    public function testFormat()
    {

        $img = new MarkupElement('img');
        $formatter = new Formatter();

        $this->assertSame('<img>', $formatter->format($img, HtmlFormat::class));

        $link = new MarkupElement('a');
        $format = new HtmlFormat();
        $this->assertSame('<a>', $formatter->format($link, $format));
    }

    /**
     * @covers                   Phug\Formatter::format
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage Passed format handler needs to implement
     */
    public function testFormatWithWrongArgument()
    {

        $img = new MarkupElement('img');
        $formatter = new Formatter();

        $this->assertSame('<img>', $formatter->format($img, MarkupElement::class));
    }
}
