<?php

/**
 * @file
 * Tests for struc bit field testing functions.
 */

namespace Itafroma\Zork\Tests;

use Itafroma\Zork\Struc\Adv;
use Itafroma\Zork\Struc\ZObject;
use Itafroma\Zork\Struc\Room;
use Itafroma\Zork\Struc\Syntax;
use PHPUnit\Framework\TestCase;
use function Itafroma\Zork\atrz;
use function Itafroma\Zork\atro;
use function Itafroma\Zork\atrnn;
use function Itafroma\Zork\gtrnn;
use function Itafroma\Zork\rtrc;
use function Itafroma\Zork\rtrnn;
use function Itafroma\Zork\rtro;
use function Itafroma\Zork\rtrz;
use function Itafroma\Zork\strnn;
use function Itafroma\Zork\trnn;
use function Itafroma\Zork\trc;
use function Itafroma\Zork\tro;
use function Itafroma\Zork\trz;

class StrucFlagsTest extends TestCase
{
    /**
     * Tests Itafroma\Zork\trnn().
     *
     * @covers ::Itafroma\Zork\trnn
     * @dataProvider objectFlagsProvider
     */
    public function testTrnn($obj, $bit)
    {
        $obj->oflags = $bit;

        $this->assertTrue(trnn($obj, $bit));
    }

    /**
     * Tests Itafroam\Zork\rtrnn().
     *
     * @covers ::Itafroma\Zork\rtrnn
     * @dataProvider roomFlagsProvider
     */
    public function testRtrnn($rm, $bit)
    {
        $rm->rbits = $bit;

        $this->assertTrue(rtrnn($rm, $bit));
    }

    /**
     * Tests Itafroam\Zork\gtrnn().
     *
     * @covers ::Itafroma\Zork\gtrnn
     * @dataProvider roomFlagsProvider
     */
    public function testGtrnn($rm, $bit)
    {
        $rm->rglobal = $bit;

        $this->assertTrue(gtrnn($rm, $bit));
    }

    /**
     * Tests Itafroma\Zork\rtrz().
     *
     * @covers ::Itafroma\Zork\rtrz
     * @dataProvider roomFlagsProvider
     */
    public function testRtrz($rm, $bit)
    {
        $rm->rbits = $bit;
        $return = rtrz($rm, $bit);

        $this->assertEquals($rm->rbits, $return);
        $this->assertEquals($rm->rbits, 0);
    }

    /**
     * Tests Itafroma\Zork\trc().
     *
     * @covers ::Itafroma\Zork\trc
     * @dataProvider objectFlagsProvider
     */
    public function testTrc($obj, $bit)
    {
        $obj->oflags = $bit;
        $return = trc($obj, $bit);

        $this->assertEquals($obj->oflags, $return);
        $this->assertEquals($obj->oflags, 0);
    }

    /**
     * Tests Itafroma\Zork\trz().
     *
     * @covers ::Itafroma\Zork\trz
     * @dataProvider objectFlagsProvider
     */
    public function testTrz($obj, $bit)
    {
        $obj->oflags = $bit;
        $return = trz($obj, $bit);

        $this->assertEquals($obj->oflags, $return);
        $this->assertEquals($obj->oflags, 0);
    }

    /**
     * Tests Itafroma\Zork\tro().
     *
     * @covers ::Itafroma\Zork\tro
     * @dataProvider objectFlagsProvider
     */
    public function testTro($obj, $bit)
    {
        $return = tro($obj, $bit);

        $this->assertEquals($obj->oflags, $return);
        $this->assertEquals($obj->oflags, $bit);
    }

    /**
     * Tests Itafroma\Zork\rtro().
     *
     * @covers ::Itafroma\Zork\rtro
     * @dataProvider roomFlagsProvider
     */
    public function testRtro($rm, $bit)
    {
        $return = rtro($rm, $bit);

        $this->assertEquals($rm->rbits, $return);
        $this->assertEquals($rm->rbits, $bit);
    }

    /**
     * Tests Itafroma\Zork\rtrc().
     *
     * @covers ::Itafroma\Zork\rtrc
     * @dataProvider roomFlagsProvider
     */
    public function testRtrc($rm, $bit)
    {
        $rm->rbits = $bit;
        $return = rtrc($rm, $bit);

        $this->assertEquals($rm->rbits, $return);
        $this->assertEquals($rm->rbits, 0);
    }

    /**
     * Tests Itafroma\Zork\atrnn().
     *
     * @covers ::Itafroma\Zork\atrnn
     * @dataProvider advFlagsProvider()
     */
    public function testAtrnn($adv, $bit)
    {
        $adv->aflags = $bit;

        $this->assertTrue(atrnn($adv, $bit));
    }

    /**
     * Tests Itafroma\Zork\atrz().
     *
     * @covers ::Itafroma\Zork\atrz
     * @dataProvider advFlagsProvider
     */
    public function testAtrz($adv, $bit)
    {
        $adv->aflags = $bit;
        $return = atrz($adv, $bit);

        $this->assertEquals($adv->aflags, $return);
        $this->assertEquals($adv->aflags, 0);
    }

    /**
     * Tests Itafroma\Zork\atro().
     *
     * @covers ::Itafroma\Zork\atro
     * @dataProvider advFlagsProvider
     */
    public function testAtro($adv, $bit)
    {
        $return = atro($adv, $bit);

        $this->assertEquals($adv->aflags, $return);
        $this->assertEquals($adv->aflags, $bit);
    }

    /**
     * Tests Itafroma\Zork\strnn().
     *
     * @covers ::Itafroma\Zork\strnn
     * @dataProvider syntaxFlagsProvider()
     */
    public function testStrnn($syntax, $bit)
    {
        $syntax->sflags = $bit;

        $this->assertTrue(strnn($syntax, $bit));
    }


    /**
     * Provides objects (items) and a test flag.
     */
    public function objectFlagsProvider()
    {
        return [
            [new ZObject(), 1 << 2],
        ];
    }

    /**
     * Provides rooms and a test flag.
     */
    public function roomFlagsProvider()
    {
        return [
            [new Room(), 1 << 2],
        ];
    }

    /**
     * Provides adventurers and a test flag.
     */
    public function advFlagsProvider()
    {
        return [
            [new Adv(), 1 << 2],
        ];
    }

    /**
     * Provides syntaxes and a test flag.
     */
    public function syntaxFlagsProvider()
    {
        return [
            [new Syntax(), 1 << 2],
        ];
    }
}
