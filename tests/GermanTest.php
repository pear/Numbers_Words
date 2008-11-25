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
if (!defined('PHPUNIT_MAIN_METHOD')) {
    define('PHPUNIT_MAIN_METHOD', 'Numbers_Words_GermanTest::main');
}

require_once 'Numbers/Words.php';
require_once 'PHPUnit/Framework.php';

class Numbers_Words_GermanTest extends PHPUnit_Framework_TestCase
{
    var $handle;

    public static function main()
    {
        require_once 'PHPUnit/TextUI/TestRunner.php';
        PHPUnit_TextUI_TestRunner::run(
            new PHPUnit_Framework_TestSuite('Numbers_Words_GermanTest')
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
        $digits = array('null',
                        'eins',
                        'zwei',
                        'drei',
                        'vier',
                        'fünf',
                        'sechs',
                        'sieben',
                        'acht',
                        'neun'
                       );
        for ($i = 0; $i < 10; $i++) {
            $number = $this->handle->toWords($i, 'de');
            $this->assertEquals($digits[$i], $number);
        }
    }

    /**
     * Testing numbers between 10 and 99
     */
    function testTens()
    {
        $tens = array(11 => 'elf',
                      12 => 'zwölf',
                      16 => 'sechzehn',
                      19 => 'neunzehn',
                      20 => 'zwanzig',
                      21 => 'einundzwanzig',
                      26 => 'sechsundzwanzig',
                      30 => 'dreißig',
                      31 => 'einunddreißig',
                      40 => 'vierzig',
                      43 => 'dreiundvierzig',
                      50 => 'fünfzig',
                      55 => 'fünfundfünfzig',
                      60 => 'sechzig',
                      67 => 'siebenundsechzig',
                      70 => 'siebzig',
                      79 => 'neunundsiebzig'
                     );
        foreach ($tens as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'de'));
        }
    }

    /**
     * Testing numbers between 100 and 999
     */
    function testHundreds()
    {
        $hundreds = array(100 => 'einhundert',
                          101 => 'einhunderteins',
                          199 => 'einhundertneunundneunzig',
                          203 => 'zweihundertdrei',
                          287 => 'zweihundertsiebenundachtzig',
                          300 => 'dreihundert',
                          356 => 'dreihundertsechsundfünfzig',
                          410 => 'vierhundertzehn',
                          434 => 'vierhundertvierunddreißig',
                          578 => 'fünfhundertachtundsiebzig',
                          689 => 'sechshundertneunundachtzig',
                          729 => 'siebenhundertneunundzwanzig',
                          894 => 'achthundertvierundneunzig',
                          999 => 'neunhundertneunundneunzig'
                         );
        foreach ($hundreds as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'de'));
        }
    }

    /**
     * Testing numbers between 1000 and 9999
     */
    function testThousands()
    {
        $thousands = array(1000 => 'eintausend',
                           1001 => 'eintausendeins',
                           1097 => 'eintausendsiebenundneunzig',
                           1104 => 'eintausendeinhundertvier',
                           1243 => 'eintausendzweihundertdreiundvierzig',
                           2385 => 'zweitausenddreihundertfünfundachtzig',
                           3766 => 'dreitausendsiebenhundertsechsundsechzig',
                           4196 => 'viertausendeinhundertsechsundneunzig',
                           5846 => 'fünftausendachthundertsechsundvierzig',
                           6459 => 'sechstausendvierhundertneunundfünfzig',
                           7232 => 'siebentausendzweihundertzweiunddreißig',
                           8569 => 'achttausendfünfhundertneunundsechzig',
                           9539 => 'neuntausendfünfhundertneununddreißig'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'de'));
        }
    }
}

if (PHPUNIT_MAIN_METHOD == 'Numbers_Words_GermanTest::main') {
    Numbers_Words_GermanTest::main();
}
?>