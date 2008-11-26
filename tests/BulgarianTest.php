<?php
declare(encoding='windows-1251');
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
// | Authors: Kouber Saparev                                              |
// +----------------------------------------------------------------------+
//
// Numbers_Words class extension to spell numbers in Bulgarian.
//
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Numbers_Words_BulgarianTest::main');
}

require_once 'Numbers/Words.php';
require_once 'PHPUnit/Framework.php';

class Numbers_Words_BulgarianTest extends PHPUnit_Framework_TestCase
{
    var $handle;

    public static function main()
    {
        require_once 'PHPUnit/TextUI/TestRunner.php';
        PHPUnit_TextUI_TestRunner::run(
            new PHPUnit_Framework_TestSuite('Numbers_Words_BulgarianTest')
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
        $digits = array('нула',
                        'едно',
                        'две',
                        'три',
                        'четири',
                        'пет',
                        'шест',
                        'седем',
                        'осем',
                        'девет'
                       );
        for ($i = 0; $i < 10; $i++) {
            $number = $this->handle->toWords($i, 'bg');
            $this->assertEquals($digits[$i], $number);
        }
    }

    /**
     * Testing numbers between 10 and 99
     */
    function testTens()
    {
        $tens = array(11 => 'единадесет',
                      12 => 'дванадесет',
                      16 => 'шестнадесет',
                      19 => 'деветнадесет',
                      20 => 'двадесет',
                      21 => 'двадесет и едно',
                      26 => 'двадесет и шест',
                      30 => 'тридесет',
                      31 => 'тридесет и едно',
                      40 => 'четиридесет',
                      43 => 'четиридесет и три',
                      50 => 'петдесет',
                      55 => 'петдесет и пет',
                      60 => 'шестдесет',
                      67 => 'шестдесет и седем',
                      70 => 'седемдесет',
                      79 => 'седемдесет и девет'
                     );
        foreach ($tens as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'bg'));
        }
    }

    /**
     * Testing numbers between 100 and 999
     */
    function testHundreds()
    {
        $hundreds = array(100 => 'сто',
                          101 => 'сто и едно',
                          199 => 'сто деветдесет и девет',
                          203 => 'двеста и три',
                          287 => 'двеста осемдесет и седем',
                          300 => 'триста',
                          356 => 'триста петдесет и шест',
                          410 => 'четиристотин и десет',
                          434 => 'четиристотин тридесет и четири',
                          578 => 'петстотин седемдесет и осем',
                          689 => 'шестстотин осемдесет и девет',
                          729 => 'седемстотин двадесет и девет',
                          894 => 'осемстотин деветдесет и четири',
                          999 => 'деветстотин деветдесет и девет'
                         );
        foreach ($hundreds as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'bg'));
        }
    }

    /**
     * Testing numbers between 1000 and 9999
     */
    function testThousands()
    {
        $thousands = array(1000 => 'хил€да',
                           1001 => 'хил€да и едно',
                           1097 => 'хил€да и деветдесет и седем',
                           1104 => 'хил€да сто и четири',
                           1243 => 'хил€да двеста четиридесет и три',
                           2385 => 'две хил€ди триста осемдесет и пет',
                           3766 => 'три хил€ди седемстотин шестдесет и шест',
                           4196 => 'четири хил€ди сто деветдесет и шест',
                           5846 => 'пет хил€ди осемстотин четиридесет и шест',
                           6459 => 'шест хил€ди четиристотин петдесет и девет',
                           7232 => 'седем хил€ди двеста тридесет и две',
                           8569 => 'осем хил€ди петстотин шестдесет и девет',
                           9539 => 'девет хил€ди петстотин тридесет и девет'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'bg'));
        }
    }
}

if (PHPUnit_MAIN_METHOD == 'Numbers_Words_BulgarianTest::main') {
    Numbers_Words_BulgarianTest::main();
}
?>