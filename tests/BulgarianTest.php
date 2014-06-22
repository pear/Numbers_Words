<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words class extension to spell numbers in Bulgarian.
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Numbers
 * @package    Numbers_Words
 * @author     Kouber Saparev <kouber@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/Numbers_Words
 */

require_once 'Numbers/Words.php';

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
        $thousands = array(1000 => 'хиляда',
                           1001 => 'хиляда и едно',
                           1097 => 'хиляда и деветдесет и седем',
                           1104 => 'хиляда сто и четири',
                           1243 => 'хиляда двеста четиридесет и три',
                           2385 => 'две хиляди триста осемдесет и пет',
                           3766 => 'три хиляди седемстотин шестдесет и шест',
                           4196 => 'четири хиляди сто деветдесет и шест',
                           5846 => 'пет хиляди осемстотин четиридесет и шест',
                           6459 => 'шест хиляди четиристотин петдесет и девет',
                           7232 => 'седем хиляди двеста тридесет и две',
                           8569 => 'осем хиляди петстотин шестдесет и девет',
                           9539 => 'девет хиляди петстотин тридесет и девет'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'bg'));
        }
    }
}
