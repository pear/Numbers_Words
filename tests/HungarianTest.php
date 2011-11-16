<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words class extension to spell numbers in British English.
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Numbers
 * @package   Numbers_Words
 * @author    Mátyás Somfai <somfai.matyas@gmail.com>
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://pear.php.net/package/Numbers_Words
 */

/*
 * PEAR QA suggests that we do not set
 * error_reporting
 *
 * error_reporting(E_ALL | E_STRICT);
 */
ini_set('display_errors', 1);

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Numbers_Words_HungarianTest::main');
}

require_once 'Numbers/Words.php';
require_once 'PHPUnit/Framework.php';

class Numbers_Words_HungarianTest extends PHPUnit_Framework_TestCase
{
    var $handle;
    var $lang = 'hu_HU';

    public static function main()
    {
        require_once 'PHPUnit/TextUI/TestRunner.php';
        PHPUnit_TextUI_TestRunner::run(
            new PHPUnit_Framework_TestSuite('Numbers_Words_HungarianTest')
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
        $digits = array('nulla',
                        'egy',
                        'kettõ',
                        'három',
                        'négy',
                        'öt',
                        'hat',
                        'hét',
                        'nyolc',
                        'kilenc'
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
        $tens = array(11 => 'tizenegy',
                      12 => 'tizenkettõ',
                      16 => 'tizenhat',
                      19 => 'tizenkilenc',
                      20 => 'húsz',
                      21 => 'húszonegy',
                      26 => 'húszonhat',
                      30 => 'harminc',
                      31 => 'harmincegy',
                      40 => 'negyven',
                      43 => 'negyvenhárom',
                      50 => 'ötven',
                      55 => 'ötvenöt',
                      60 => 'hatvan',
                      67 => 'hatvanhét',
                      70 => 'hetven',
                      79 => 'hetvenkilenc'
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
        $hundreds = array(100 => 'egyszáz',
                          101 => 'egyszázegy',
                          199 => 'egyszázkilencvenkilenc',
                          203 => 'kettõszázhárom',
                          287 => 'kettõszáznyolcvanhét',
                          300 => 'háromszáz',
                          356 => 'háromszázötvenhat',
                          410 => 'négyszáztíz',
                          434 => 'négyszázharmincnégy',
                          578 => 'ötszázhetvennyolc',
                          689 => 'hatszáznyolcvankilenc',
                          729 => 'hétszázhúszonkilenc',
                          894 => 'nyolcszázkilencvennégy',
                          999 => 'kilencszázkilencvenkilenc'
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
        $thousands = array(1000 => 'egyezer',
                           1001 => 'egyezeregy',
                           1097 => 'egyezerkilencvenhét',
                           1104 => 'egyezeregyszáznégy',
                           1243 => 'egyezerkettõszáznegyvenhárom',
                           2385 => 'kettõezer-háromszáznyolcvanöt',
                           3766 => 'háromezer-hétszázhatvanhat',
                           4196 => 'négyezer-egyszázkilencvenhat',
                           5846 => 'ötezer-nyolcszáznegyvenhat',
                           6459 => 'hatezer-négyszázötvenkilenc',
                           7232 => 'hétezer-kettõszázharminckettõ',
                           8569 => 'nyolcezer-ötszázhatvankilenc',
                           9539 => 'kilencezer-ötszázharminckilenc'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, $this->lang));
        }
    }
    
    /**
    */
    function testMore()
    {

        $this->assertEquals('egymillió', $this->handle->toWords(1000000, $this->lang));
		$this->assertEquals('egymillió-egyezer-ötszáz', $this->handle->toWords(1001500, $this->lang));
		$this->assertEquals('kettõmillió-egy', $this->handle->toWords(2000001, $this->lang));
		$this->assertEquals('nyolcmillió-kettõezer-egy', $this->handle->toWords(8002001, $this->lang));
        $this->assertEquals('kettõmilliárd', $this->handle->toWords(2000000000, $this->lang));


        // 32 bit systems vs PHP_INT_SIZE - 3 billion is a little high, so use a string version.
        $number = '3000000000000' > PHP_INT_SIZE? '3000000000000' : 3000000000000;

        $this->assertEquals('hárombillió', $this->handle->toWords($number, $this->lang));
    
    }
}

if (PHPUnit_MAIN_METHOD == 'Numbers_Words_HungarianTest::main') {
    Numbers_Words_HungarianTest::main();
}
