<?php
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
// | Authors: Bogdan Stăncescu                                            |
// +----------------------------------------------------------------------+
//
// Numbers_Words class extension to spell numbers in Romanian.
//

require_once 'Numbers/Words.php';

class Numbers_Words_RomanianRoTest extends PHPUnit_Framework_TestCase
{
    var $handle;
    var $lang = 'ro_RO';

    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(
            new PHPUnit_Framework_TestSuite('Numbers_Words_RomanianRoTest')
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
        $digits = array(
          'zero',
          'unu',
          'doi',
          'trei',
          'patru',
          'cinci',
          'șase',
          'șapte',
          'opt',
          'nouă'
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
        $tens = array(11 => 'unsprezece',
                      12 => 'doisprezece',
                      16 => 'șaisprezece',
                      19 => 'nouăsprezece',
                      20 => 'douăzeci',
                      21 => 'douăzeci și unu',
                      26 => 'douăzeci și șase',
                      30 => 'treizeci',
                      31 => 'treizeci și unu',
                      40 => 'patruzeci',
                      43 => 'patruzeci și trei',
                      50 => 'cincizeci',
                      55 => 'cincizeci și cinci',
                      60 => 'șaizeci',
                      67 => 'șaizeci și șapte',
                      70 => 'șaptezeci',
                      79 => 'șaptezeci și nouă'
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
        $hundreds = array(100 => 'una sută',
                          101 => 'una sută unu',
                          199 => 'una sută nouăzeci și nouă',
                          203 => 'două sute trei',
                          287 => 'două sute optzeci și șapte',
                          300 => 'trei sute',
                          356 => 'trei sute cincizeci și șase',
                          410 => 'patru sute zece',
                          434 => 'patru sute treizeci și patru',
                          578 => 'cinci sute șaptezeci și opt',
                          689 => 'șase sute optzeci și nouă',
                          729 => 'șapte sute douăzeci și nouă',
                          894 => 'opt sute nouăzeci și patru',
                          999 => 'nouă sute nouăzeci și nouă'
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
        /*
            Grammar purists will object to the usage of "una sută" and "una mie", which is
            technically incorrect ("o sută" and "o mie" are the stricly correct forms
            from a grammatical POV). However, since there's a reasonable expectation
            that this will mostly be used for counting money, we're using the
            financial convention, which avoids "o mie", presumably because
            the "o" could be easily modified. See for example
            http://en.wikipedia.org/wiki/File:ROL_100_1966_obverse.jpg
            http://en.wikipedia.org/wiki/File:ROL_1000_1993_obverse.jpg
            http://en.wikipedia.org/wiki/File:100L_av.jpg
        */
        $thousands = array(1000 => 'una mie',
                           1001 => 'una mie unu',
                           1097 => 'una mie nouăzeci și șapte',
                           1104 => 'una mie una sută patru',
                           1243 => 'una mie două sute patruzeci și trei',
                           2385 => 'două mii trei sute optzeci și cinci',
                           3766 => 'trei mii șapte sute șaizeci și șase',
                           4196 => 'patru mii una sută nouăzeci și șase',
                           5846 => 'cinci mii opt sute patruzeci și șase',
                           6459 => 'șase mii patru sute cincizeci și nouă',
                           7232 => 'șapte mii două sute treizeci și doi',
                           8569 => 'opt mii cinci sute șaizeci și nouă',
                           9539 => 'nouă mii cinci sute treizeci și nouă'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, $this->lang));
        }
    }



    /**
     * en_GB (old version) and en_US differentiate in their millions/billions/trillions
     * because en_GB once used the long scale, and en_US the short scale.
     *
     * We're testing the short scale here.
     */
    function testMore()
    {

        $this->assertEquals('un milion', $this->handle->toWords(1000000, $this->lang));

        $this->assertEquals('două miliarde', $this->handle->toWords(2000000000, $this->lang));


        // 32 bit systems vs PHP_INT_SIZE - 3 trillion is a little high, so use a string version.
        $number = '3000000000000' > PHP_INT_SIZE? '3000000000000' : 3000000000000;

        $this->assertEquals('trei trilioane', $this->handle->toWords($number, $this->lang));
    }

    /**
    * Casual testing for a couple of values in the local currency
    * (in this case, RON)
    */
    function testLocalCurrency()
    {
        $this->assertEquals('un leu', $this->handle->toCurrency(1, $this->lang));
        $this->assertEquals('doi lei', $this->handle->toCurrency(2, $this->lang));
        $this->assertEquals('două mii de lei', $this->handle->toCurrency(2000, $this->lang));

    }

}
