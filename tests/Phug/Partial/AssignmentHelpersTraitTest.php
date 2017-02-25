<?php

namespace Phug\Test\Partial;

use Phug\Formatter\Format\XmlFormat;

/**
 * @coversDefaultClass \Phug\Formatter\Partial\AssignmentHelpersTrait
 */
class AssignmentHelpersTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::provideAttributeAssignments
     */
    public function testAttributeAssignments()
    {
        $format = new XmlFormat();
        $attributes = ['class' => 'foo', 'foobar' => '11'];
        $helper = $format->getHelper('attribute_assignments');

        self::assertSame(
            'foo bar',
            $helper($attributes, 'class', 'bar')
        );

        self::assertSame(
            '22',
            $helper($attributes, 'foobar', '22')
        );
    }

    /**
     * @covers ::provideAttributeAssignment
     * @covers \Phug\Formatter\AbstractFormat::setFormatter
     */
    public function testAttributeAssignment()
    {
        $format = new XmlFormat();
        $attributes = ['class' => 'foo zoo'];
        $helper = $format->getHelper('attribute_assignment');
        $helper($attributes, 'class', 'bar zoo');

        self::assertSame(
            ['class' => 'foo zoo bar'],
            $attributes
        );
    }

    /**
     * @covers ::provideAttributesAssignment
     * @covers ::provideClassAttributeAssignment
     * @covers ::provideStyleAttributeAssignment
     */
    public function testAttributesAssignment()
    {
        $format = new XmlFormat();
        $helper = $format->getHelper('attributes_assignment');
        $code = $helper([
            'a'     => 'b',
            'c'     => 'a',
            'class' => ['foo zoo', 'foo bar'],
            'style' => ['min-width' => 'calc(100% - 50px)'],
        ], [
            'a'     => 'c',
            'd'     => true,
            'class' => 'foo zoo',
            'style' => 'content: "a"; background: rgb(2, 12, 255)',
        ]);

        self::assertSame(
            ' a="c" c="a" class="foo zoo bar" '.
            'style="min-width:calc(100% - 50px);'.
            'content: "a"; background: rgb(2, 12, 255)" d="d"',
            $code
        );
    }
}