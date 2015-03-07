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
 * @author    Ben NG <ben.nsng@gmail.com>
 * @copyright 1997-2008 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      http://pear.php.net/package/Numbers_Words
 */

require_once 'Numbers/Words.php';

class Numbers_Words_ChineseHkTest extends PHPUnit_Framework_TestCase
{
    var $handle;
    var $lang = 'zh_HK';

    public static function main()
    {
        require_once 'PHPUnit/TextUI/TestRunner.php';
        PHPUnit_TextUI_TestRunner::run(
            new PHPUnit_Framework_TestSuite('Numbers_Words_ChineseHkTest')
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
        $digits = array('零',
                        '一',
                        '二',
                        '三',
                        '四',
                        '五',
                        '六',
                        '七',
                        '八',
                        '九'
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
        $tens = array(11 => '十一',
                      12 => '十二',
                      16 => '十六',
                      19 => '十九',
                      20 => '二十',
                      21 => '二十一',
                      26 => '二十六',
                      30 => '三十',
                      31 => '三十一',
                      40 => '四十',
                      43 => '四十三',
                      50 => '五十',
                      55 => '五十五',
                      60 => '六十',
                      67 => '六十七',
                      70 => '七十',
                      79 => '七十九'
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
        $hundreds = array(100 => '一百',
                          101 => '一百零一',
                          199 => '一百九十九',
                          203 => '二百零三',
                          287 => '二百八十七',
                          300 => '三百',
                          356 => '三百五十六',
                          410 => '四百一十',
                          434 => '四百三十四',
                          578 => '五百七十八',
                          689 => '六百八十九',
                          729 => '七百二十九',
                          894 => '八百九十四',
                          999 => '九百九十九'
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
        $thousands = array(1000 => '一千',
                           1001 => '一千零一',
                           1097 => '一千零九十七',
                           1104 => '一千一百零四',
                           1243 => '一千二百四十三',
                           2385 => '二千三百八十五',
                           3766 => '三千七百六十六',
                           4196 => '四千一百九十六',
                           5846 => '五千八百四十六',
                           6459 => '六千四百五十九',
                           7232 => '七千二百三十二',
                           8569 => '八千五百六十九',
                           9539 => '九千五百三十九'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, $this->lang));
        }
    }

    /**
    * en_GB (old version) and en_US differentiate in their millions/billions/trillions
    * because en_GB once used the long scale, and en_US the short scale.
    * GB abandoned the long scale in 1974, though.
    *
    * Numbers_Words still provides the long scale. Use en_US to get short scaled numbers.
    */
    function testMore()
    {

        $this->assertEquals('一百萬', $this->handle->toWords(1000000, $this->lang));

        $this->assertEquals('二十億', $this->handle->toWords(2000000000, $this->lang));


        // 32 bit systems vs PHP_INT_SIZE - 3 billion is a little high, so use a string version.
        $number = '3000000000000' > PHP_INT_SIZE? '3000000000000' : 3000000000000;

        $this->assertEquals('三兆', $this->handle->toWords($number, $this->lang));

    }
}
