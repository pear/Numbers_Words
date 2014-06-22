<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words class extension to spell numbers in Polish.
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
 * @author    Piotr Klaban <makler@man.torun.pl>
 * @copyright 1997-2008 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      http://pear.php.net/package/Numbers_Words
 */

require_once 'Numbers/Words.php';

class Numbers_Words_PolishTest extends PHPUnit_Framework_TestCase
{
    var $handle;

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
                        'jeden',
                        'dwa',
                        'trzy',
                        'cztery',
                        'pięć',
                        'sześć',
                        'siedem',
                        'osiem',
                        'dziewięć'
                       );
        for ($i = 0; $i < 10; $i++)
        {
            $number = $this->handle->toWords($i, 'pl');
            $this->assertEquals($digits[$i], $number);
        }
    }

    /**
     * Testing numbers between 10 and 99
     */
    function testTens()
    {
        $tens = array(11 => 'jedenaście',
                      12 => 'dwanaście',
                      16 => 'szesnaście',
                      19 => 'dziewiętnaście',
                      20 => 'dwadzieścia',
                      21 => 'dwadzieścia jeden',
                      26 => 'dwadzieścia sześć',
                      30 => 'trzydzieści',
                      31 => 'trzydzieści jeden',
                      40 => 'czterdzieści',
                      43 => 'czterdzieści trzy',
                      50 => 'pięćdziesiąt',
                      55 => 'pięćdziesiąt pięć',
                      60 => 'sześćdziesiąt',
                      67 => 'sześćdziesiąt siedem',
                      70 => 'siedemdziesiąt',
                      79 => 'siedemdziesiąt dziewięć'
                     );
        foreach ($tens as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'pl'));
        }
    }

    /**
     * Testing numbers between 100 and 999
     */
    function testHundreds()
    {
        $hundreds = array(100 => 'sto',
                          101 => 'sto jeden',
                          199 => 'sto dziewięćdziesiąt dziewięć',
                          203 => 'dwieście trzy',
                          287 => 'dwieście osiemdziesiąt siedem',
                          300 => 'trzysta',
                          356 => 'trzysta pięćdziesiąt sześć',
                          410 => 'czterysta dziesięć',
                          434 => 'czterysta trzydzieści cztery',
                          578 => 'pięćset siedemdziesiąt osiem',
                          689 => 'sześćset osiemdziesiąt dziewięć',
                          729 => 'siedemset dwadzieścia dziewięć',
                          894 => 'osiemset dziewięćdziesiąt cztery',
                          999 => 'dziewięćset dziewięćdziesiąt dziewięć'
                         );
        foreach ($hundreds as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'pl'));
        }
    }

    /**
     * Testing numbers between 1000 and 9999
     */
    function testThousands()
    {
        $thousands = array(1000 => 'jeden tysiąc',
                           1001 => 'jeden tysiąc jeden',
                           1097 => 'jeden tysiąc dziewięćdziesiąt siedem',
                           1104 => 'jeden tysiąc sto cztery',
                           1243 => 'jeden tysiąc dwieście czterdzieści trzy',
                           2385 => 'dwa tysiące trzysta osiemdziesiąt pięć',
                           3766 => 'trzy tysiące siedemset sześćdziesiąt sześć',
                           4196 => 'cztery tysiące sto dziewięćdziesiąt sześć',
                           5846 => 'pięć tysięcy osiemset czterdzieści sześć',
                           6459 => 'sześć tysięcy czterysta pięćdziesiąt dziewięć',
                           7232 => 'siedem tysięcy dwieście trzydzieści dwa',
                           8569 => 'osiem tysięcy pięćset sześćdziesiąt dziewięć',
                           9539 => 'dziewięć tysięcy pięćset trzydzieści dziewięć'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'pl'));
        }
    }
}
