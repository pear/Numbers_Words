<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words class extension to spell numbers in Azerbaijani.
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Numbers
 * @package   Numbers_Words
 * @author    Shahriyar Imanov <shehi@imanov.me>
 * @copyright 1997-2008 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://pear.php.net/package/Numbers_Words
 */

require_once 'Numbers/Words.php';

class Numbers_Words_AzerbaijaniAzTest extends PHPUnit_Framework_TestCase
{
    var $handle;
    var $lang = 'az';

    public static function main()
    {
        require_once 'PHPUnit/TextUI/TestRunner.php';
        PHPUnit_TextUI_TestRunner::run(
            new PHPUnit_Framework_TestSuite('Numbers_Words_AzerbaijaniAzTest')
        );
    }

    function setUp()
    {
        $this->handle = new Numbers_Words();
    }

    /**
     * Testing numbers between 0 and 9
     */
    function testDigits()
    {
        $digits = array('sıfır',
            'bir',
            'iki',
            'üç',
            'dörd',
            'beş',
            'altı',
            'yeddi',
            'səkkiz',
            'doqquz'
        );
        for ($i = 0; $i < 10; $i++) {
            $number = $this->handle->toWords($i, $this->lang);
            $this->assertEquals($digits[$i], $number);
        }
    }

    /**
     * Testing numbers between 10 and 99
     */
    function testTens()
    {
        $tens = array(
            11 => 'on bir',
            12 => 'on iki',
            16 => 'on altı',
            19 => 'on doqquz',
            20 => 'iyirmi',
            21 => 'iyirmi bir',
            26 => 'iyirmi altı',
            30 => 'otuz',
            31 => 'otuz bir',
            40 => 'qırx',
            43 => 'qırx üç',
            50 => 'əlli',
            55 => 'əlli beş',
            60 => 'altmış',
            67 => 'altmış yeddi',
            70 => 'yetmiş',
            79 => 'yetmiş doqquz'
        );
        foreach ($tens as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, $this->lang));
        }
    }

    /**
     * Testing numbers between 100 and 999
     */
    function testHundreds()
    {
        $hundreds = array(100 => 'yüz',
            101 => 'yüz bir',
            199 => 'yüz doxsan doqquz',
            203 => 'iki yüz üç',
            287 => 'iki yüz səksən yeddi',
            300 => 'üç yüz',
            356 => 'üç yüz əlli altı',
            410 => 'dörd yüz on',
            434 => 'dörd yüz otuz dörd',
            578 => 'beş yüz yetmiş səkkiz',
            689 => 'altı yüz səksən doqquz'
        );
        foreach ($hundreds as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, $this->lang));
        }
    }

    /**
     * Testing numbers between 1000 and 9999
     */
    function testThousands()
    {
        $thousands = array(
            1000 => 'min',
            1001 => 'min bir',
            1097 => 'min doxsan yeddi',
            1104 => 'min yüz dörd',
            1243 => 'min iki yüz qırx üç',
            2385 => 'iki min üç yüz səksən beş',
            3766 => 'üç min yeddi yüz altmış altı',
            4196 => 'dörd min yüz doxsan altı'
        );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, $this->lang));
        }
    }

    function testMore()
    {

        $this->assertEquals('bir milyon', $this->handle->toWords(1000000, $this->lang));

        $this->assertEquals('iki milyard', $this->handle->toWords(2000000000, $this->lang));


        // 32 bit systems vs PHP_INT_SIZE - 3 billion is a little high, so use a string version.
        $number = '3000000000000' > PHP_INT_SIZE ? '3000000000000' : 3000000000000;

        $this->assertEquals('üç trilyon', $this->handle->toWords($number, $this->lang));

    }
}
