<?php

namespace Phug\Test\Element;

use Phug\Formatter;
use Phug\Formatter\Element\AttributeElement;
use Phug\Formatter\Element\MarkupElement;
use Phug\Formatter\Format\XmlFormat;

/**
 * @coversDefaultClass \Phug\Formatter\Element\AttributeElement
 */
class AttributeElementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::<public>
     * @covers \Phug\Formatter\Format\XmlFormat::formatAttributes
     */
    public function testAttributeElement()
    {
        $attributes = new AttributeElement('foo', '/foo/bar.png');

        self::assertSame('foo', $attributes->getName());
        self::assertSame('/foo/bar.png', $attributes->getValue());

        $img = new MarkupElement('img');
        $attribute = new AttributeElement('src', '/foo/bar.png');
        $img->getAttributes()->attach($attribute);
        $attribute = new AttributeElement('alt', 'text');
        $img->getAttributes()->attach($attribute);
        $formatter = new Formatter([
            'default_class_name' => XmlFormat::class,
        ]);

        self::assertSame(
            '<img src="/foo/bar.png" alt="text" />',
            $formatter->format($img)
        );
    }
}
