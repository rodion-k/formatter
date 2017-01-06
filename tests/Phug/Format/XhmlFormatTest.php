<?php

namespace Phug\Test\Format;

use Phug\Formatter\Element\DoctypeElement;
use Phug\Formatter\Element\DocumentElement;
use Phug\Formatter\Format\BasicFormat;
use Phug\Formatter\Format\FramesetFormat;
use Phug\Formatter\Format\MobileFormat;
use Phug\Formatter\Format\OneDotOneFormat;
use Phug\Formatter\Format\PlistFormat;
use Phug\Formatter\Format\StrictFormat;
use Phug\Formatter\Format\TransitionalFormat;

/**
 * @coversDefaultClass \Phug\Formatter\Format\XhtmlFormat
 */
class XhmlFormatTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     */
    public function testBasicFormat()
    {
        $document = new DocumentElement();
        $document->appendChild(new DoctypeElement());
        $xmlFormat = new BasicFormat();

        self::assertSame(
            '<!DOCTYPE html PUBLIC '.
            '"-//W3C//DTD XHTML Basic 1.1//EN" '.
            '"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">',
            $xmlFormat($document)
        );
    }

    /**
     * @covers ::__construct
     */
    public function testFramesetFormat()
    {
        $document = new DocumentElement();
        $document->appendChild(new DoctypeElement());
        $xmlFormat = new FramesetFormat();

        self::assertSame(
            '<!DOCTYPE html PUBLIC '.
            '"-//W3C//DTD XHTML 1.0 Frameset//EN" '.
            '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
            $xmlFormat($document)
        );
    }

    /**
     * @covers ::__construct
     */
    public function testMobileFormat()
    {
        $document = new DocumentElement();
        $document->appendChild(new DoctypeElement());
        $xmlFormat = new MobileFormat();

        self::assertSame(
            '<!DOCTYPE html PUBLIC '.
            '"-//WAPFORUM//DTD XHTML Mobile 1.2//EN" '.
            '"http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">',
            $xmlFormat($document)
        );
    }

    /**
     * @covers ::__construct
     */
    public function testOneDotOneFormat()
    {
        $document = new DocumentElement();
        $document->appendChild(new DoctypeElement());
        $xmlFormat = new OneDotOneFormat();

        self::assertSame(
            '<!DOCTYPE html PUBLIC '.
            '"-//W3C//DTD XHTML 1.1//EN" '.
            '"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
            $xmlFormat($document)
        );
    }

    /**
     * @covers ::__construct
     */
    public function testPlistFormat()
    {
        $document = new DocumentElement();
        $document->appendChild(new DoctypeElement());
        $xmlFormat = new PlistFormat();

        self::assertSame(
            '<!DOCTYPE plist PUBLIC '.
            '"-//Apple//DTD PLIST 1.0//EN" '.
            '"http://www.apple.com/DTDs/PropertyList-1.0.dtd">',
            $xmlFormat($document)
        );
    }

    /**
     * @covers ::__construct
     */
    public function testStrictFormat()
    {
        $document = new DocumentElement();
        $document->appendChild(new DoctypeElement());
        $xmlFormat = new StrictFormat();

        self::assertSame(
            '<!DOCTYPE html PUBLIC '.
            '"-//W3C//DTD XHTML 1.0 Strict//EN" '.
            '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
            $xmlFormat($document)
        );
    }

    /**
     * @covers ::__construct
     */
    public function testTransitionalFormat()
    {
        $document = new DocumentElement();
        $document->appendChild(new DoctypeElement());
        $xmlFormat = new TransitionalFormat();

        self::assertSame(
            '<!DOCTYPE html PUBLIC '.
            '"-//W3C//DTD XHTML 1.0 Transitional//EN" '.
            '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
            $xmlFormat($document)
        );
    }
}
