<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words class extension to spell numbers in FrenchBe.
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
 * @author    David Jean Louis <izi@php.net>
 * @copyright 1997-2008 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      http://pear.php.net/package/Numbers_Words
 */

require_once 'Numbers/Words.php';

class Numbers_Words_FrenchBeTest extends PHPUnit_Framework_TestCase
{
    var $handle;

    public static function main()
    {
        require_once 'PHPUnit/TextUI/TestRunner.php';
        PHPUnit_TextUI_TestRunner::run(
            new PHPUnit_Framework_TestSuite('Numbers_Words_FrenchBeTest')
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
        $digits = array('zéro',
                        'un',
                        'deux',
                        'trois',
                        'quatre',
                        'cinq',
                        'six',
                        'sept',
                        'huit',
                        'neuf'
                       );
        for ($i = 0; $i < 10; $i++) {
            $number = $this->handle->toWords($i, 'fr_BE');
            $this->assertEquals($digits[$i], $number);
        }
    }

    /**
     * Testing numbers between 10 and 99
     */
    function testTens()
    {
        $tens = array(11 => 'onze',
                      12 => 'douze',
                      16 => 'seize',
                      19 => 'dix-neuf',
                      20 => 'vingt',
                      21 => 'vingt et un',
                      26 => 'vingt-six',
                      30 => 'trente',
                      31 => 'trente et un',
                      40 => 'quarante',
                      43 => 'quarante-trois',
                      50 => 'cinquante',
                      55 => 'cinquante-cinq',
                      60 => 'soixante',
                      67 => 'soixante-sept',
                      70 => 'septante',
                      71 => 'septante et un',
                      79 => 'septante-neuf',
                      80 => 'quatre-vingts',
                      81 => 'quatre-vingt-un',
                      91 => 'nonante et un'
                     );
        foreach ($tens as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'fr_BE'));
        }
    }

    /**
     * Testing numbers between 100 and 999
     */
    function testHundreds()
    {
        $hundreds = array(100 => 'cent',
                          101 => 'cent un',
                          199 => 'cent nonante-neuf',
                          203 => 'deux cent trois',
                          287 => 'deux cent quatre-vingt-sept',
                          300 => 'trois cents',
                          356 => 'trois cent cinquante-six',
                          410 => 'quatre cent dix',
                          434 => 'quatre cent trente-quatre',
                          578 => 'cinq cent septante-huit',
                          689 => 'six cent quatre-vingt-neuf',
                          729 => 'sept cent vingt-neuf',
                          894 => 'huit cent nonante-quatre',
                          999 => 'neuf cent nonante-neuf'
                         );
        foreach ($hundreds as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'fr_BE'));
        }
    }

    /**
     * Testing numbers between 1000 and 9999
     */
    function testThousands()
    {
        $thousands = array(1000 => 'mille',
                           1001 => 'mille un',
                           1097 => 'mille nonante-sept',
                           1104 => 'mille cent quatre',
                           1243 => 'mille deux cent quarante-trois',
                           2385 => 'deux mille trois cent quatre-vingt-cinq',
                           3766 => 'trois mille sept cent soixante-six',
                           4196 => 'quatre mille cent nonante-six',
                           5846 => 'cinq mille huit cent quarante-six',
                           6459 => 'six mille quatre cent cinquante-neuf',
                           7232 => 'sept mille deux cent trente-deux',
                           8569 => 'huit mille cinq cent soixante-neuf',
                           9539 => 'neuf mille cinq cent trente-neuf'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'fr_BE'));
        }
    }
}
