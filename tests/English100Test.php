<?php
declare(encoding='iso-8859-15');
/* vim: set expandtab tabstop=4 shiftwidth=4: */
//
// +----------------------------------------------------------------------+
// | PHP version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2003 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Piotr Klaban                                                |
// +----------------------------------------------------------------------+
//
// Numbers_Words class extension to spell numbers in German.
//
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Numbers_Words_English100Test::main');
}

require_once 'Numbers/Words.php';
require_once 'PHPUnit/Framework.php';

class Numbers_Words_English100Test extends PHPUnit_Framework_TestCase
{
    var $handle;
    var $lang = 'en_100';

    public static function main()
    {
        require_once 'PHPUnit/TextUI/TestRunner.php';
        PHPUnit_TextUI_TestRunner::run(
            new PHPUnit_Framework_TestSuite('Numbers_Words_English100Test')
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
        $digits = array('zero',
                        'one',
                        'two',
                        'three',
                        'four',
                        'five',
                        'six',
                        'seven',
                        'eight',
                        'nine'
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
        $tens = array(11 => 'eleven',
                      12 => 'twelve',
                      16 => 'sixteen',
                      19 => 'nineteen',
                      20 => 'twenty',
                      21 => 'twenty-one',
                      26 => 'twenty-six',
                      30 => 'thirty',
                      31 => 'thirty-one',
                      40 => 'forty',
                      43 => 'forty-three',
                      50 => 'fifty',
                      55 => 'fifty-five',
                      60 => 'sixty',
                      67 => 'sixty-seven',
                      70 => 'seventy',
                      79 => 'seventy-nine'
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
        $hundreds = array(100 => 'one hundred',
                          101 => 'one hundred one',
                          199 => 'one hundred ninety-nine',
                          203 => 'two hundred three',
                          287 => 'two hundred eighty-seven',
                          300 => 'three hundred',
                          356 => 'three hundred fifty-six',
                          410 => 'four hundred ten',
                          434 => 'four hundred thirty-four',
                          578 => 'five hundred seventy-eight',
                          689 => 'six hundred eighty-nine',
                          729 => 'seven hundred twenty-nine',
                          894 => 'eight hundred ninety-four',
                          999 => 'nine hundred ninety-nine'
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
        $thousands = array(1000 => 'ten hundred',
                           1001 => 'ten hundred one',
                           1097 => 'ten hundred ninety-seven',
                           1104 => 'eleven hundred four',
                           1243 => 'twelve hundred forty-three',
                           2385 => 'twenty-three hundred eighty-five',
                           3766 => 'thirty-seven hundred sixty-six',
                           4196 => 'forty-one hundred ninety-six',
                           5846 => 'fifty-eight hundred forty-six',
                           6459 => 'sixty-four hundred fifty-nine',
                           7232 => 'seventy-two hundred thirty-two',
                           8569 => 'eighty-five hundred sixty-nine',
                           9539 => 'ninety-five hundred thirty-nine'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, $this->lang));
        }
    }
    
    /**
    * Test *yllions and *ylliards
    */
    function testMore()
    {
        $morers = array(
                    50000 => 'five myriad',
                   600000 => 'sixty myriad',
                  7000000 => 'seven hundred myriad',
                 80000000 => 'eighty hundred myriad',
                900000000 => 'nine myllion',
               1000000000 => 'ten myllion'
        );
        foreach ($morers as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, $this->lang));
        }
    
    }
}

if (PHPUnit_MAIN_METHOD == 'Numbers_Words_English100Test::main') {
    Numbers_Words_English100Test::main();
}
?>