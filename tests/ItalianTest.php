<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words class extension to spell numbers in Italian.
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
 * @author     Lorenzo Alberton <l.alberton@quipo.it>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/Numbers_Words
 */

require_once 'Numbers/Words.php';

class Numbers_Words_ItalianTest extends PHPUnit_Framework_TestCase
{
    protected $handle;

    public function setUp() {
        $this->handle = new Numbers_Words();
    }
    /**
     * Testing numbers between 0 and 9
     */
    function testDigits()
    {
        $digits = array(
            'zero',
            'uno',
            'due',
            'tre',
            'quattro',
            'cinque',
            'sei',
            'sette',
            'otto',
            'nove',
        );
        for ($i = 0; $i < 10; $i++) {
            $number = $this->handle->toWords($i, 'it_IT');
            $this->assertEquals($digits[$i], $number);
        }
    }

    /**
     * Testing numbers between 10 and 99
     */
    function testTens()
    {
        $tens = array(
            11 => 'undici',
            12 => 'dodici',
            16 => 'sedici',
            19 => 'diciannove',
            20 => 'venti',
            21 => 'ventuno',
            26 => 'ventisei',
            30 => 'trenta',
            31 => 'trentuno',
            40 => 'quaranta',
            43 => 'quarantatre',
            50 => 'cinquanta',
            55 => 'cinquantacinque',
            60 => 'sessanta',
            67 => 'sessantasette',
            70 => 'settanta',
            79 => 'settantanove',
        );
        foreach ($tens as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'it_IT'));
        }
    }

    /**
     * Testing numbers between 100 and 999
     */
    function testHundreds()
    {
        $hundreds = array(
            100 => 'cento',
            101 => 'centouno',
            199 => 'centonovantanove',
            203 => 'duecentotre',
            287 => 'duecentoottantasette',
            300 => 'trecento',
            356 => 'trecentocinquantasei',
            410 => 'quattrocentodieci',
            434 => 'quattrocentotrentaquattro',
            578 => 'cinquecentosettantotto',
            689 => 'seicentoottantanove',
            729 => 'settecentoventinove',
            894 => 'ottocentonovantaquattro',
            999 => 'novecentonovantanove'
        );
        foreach ($hundreds as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'it_IT'));
        }
    }

    /**
     * Testing numbers between 1000 and 9999
     */
    function testThousands()
    {
        $thousands = array(
            1000 => 'mille',
            1001 => 'milleuno',
            1097 => 'millenovantasette',
            1104 => 'millecentoquattro',
            1243 => 'milleduecentoquarantatre',
            2385 => 'duemilatrecentoottantacinque',
            3766 => 'tremilasettecentosessantasei',
            4196 => 'quattromilacentonovantasei',
            5846 => 'cinquemilaottocentoquarantasei',
            6459 => 'seimilaquattrocentocinquantanove',
            7232 => 'settemiladuecentotrentadue',
            8569 => 'ottomilacinquecentosessantanove',
            9539 => 'novemilacinquecentotrentanove',
        );

        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'it_IT'));
        }
    }
}
