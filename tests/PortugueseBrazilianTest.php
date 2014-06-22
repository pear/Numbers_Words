<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words class extension to spell numbers in Portuguese Brazilian.
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
 * @author     Igor Feghali <ifeghali@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/Numbers_Words
 */

require_once 'Numbers/Words.php';

class Numbers_Words_PortugueseBrazilianTest extends PHPUnit_Framework_TestCase
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
        $digits = array('zero',
                        'um',
                        'dois',
                        'três',
                        'quatro',
                        'cinco',
                        'seis',
                        'sete',
                        'oito',
                        'nove'
                       );
        for ($i = 0; $i < 10; $i++)
        {
            $number = $this->handle->toWords($i, 'pt_BR');
            $this->assertEquals($digits[$i], $number);

            if ($i > 0) {
                $number = $this->handle->toWords(-$i, 'pt_BR');
                $this->assertEquals($digits[$i].' negativo', $number);
            }
        }
    }

    /**
     * Testing numbers between 10 and 99
     */
    function testTens()
    {
        $tens = array(11 => 'onze',
                      12 => 'doze',
                      16 => 'dezesseis',
                      19 => 'dezenove',
                      20 => 'vinte',
                      21 => 'vinte e um',
                      26 => 'vinte e seis',
                      30 => 'trinta',
                      31 => 'trinta e um',
                      40 => 'quarenta',
                      43 => 'quarenta e três',
                      50 => 'cinqüenta',
                      55 => 'cinqüenta e cinco',
                      60 => 'sessenta',
                      67 => 'sessenta e sete',
                      70 => 'setenta',
                      79 => 'setenta e nove'
                     );
        foreach ($tens as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'pt_BR'));
            $this->assertEquals("$word negativo", $this->handle->toWords(-$number, 'pt_BR'));
        }
    }

    /**
     * Testing numbers between 100 and 999
     */
    function testHundreds()
    {
        $hundreds = array(100 => 'cem',
                          101 => 'cento e um',
                          199 => 'cento e noventa e nove',
                          203 => 'duzentos e três',
                          287 => 'duzentos e oitenta e sete',
                          300 => 'trezentos',
                          356 => 'trezentos e cinqüenta e seis',
                          410 => 'quatrocentos e dez',
                          434 => 'quatrocentos e trinta e quatro',
                          578 => 'quinhentos e setenta e oito',
                          689 => 'seiscentos e oitenta e nove',
                          729 => 'setecentos e vinte e nove',
                          717 => 'setecentos e dezessete',
                          894 => 'oitocentos e noventa e quatro',
                          999 => 'novecentos e noventa e nove'
                         );
        foreach ($hundreds as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'pt_BR'));
            $this->assertEquals("$word negativo", $this->handle->toWords(-$number, 'pt_BR'));
        }
    }

    /**
     * Testing numbers between 1000 and 9999
     */
    function testThousands()
    {
        $thousands = array(1000 => 'um mil',
                           1001 => 'um mil e um',
                           1097 => 'um mil e noventa e sete',
                           1104 => 'um mil cento e quatro',
                           1243 => 'um mil duzentos e quarenta e três',
                           2200 => 'dois mil e duzentos',
                           2385 => 'dois mil trezentos e oitenta e cinco',
                           3766 => 'três mil setecentos e sessenta e seis',
                           4196 => 'quatro mil cento e noventa e seis',
                           5846 => 'cinco mil oitocentos e quarenta e seis',
                           6459 => 'seis mil quatrocentos e cinqüenta e nove',
                           7232 => 'sete mil duzentos e trinta e dois',
                           8569 => 'oito mil quinhentos e sessenta e nove',
                           9539 => 'nove mil quinhentos e trinta e nove'
                          );
        foreach ($thousands as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'pt_BR'));
            $this->assertEquals("$word negativo", $this->handle->toWords(-$number, 'pt_BR'));
        }
    }

    /**
     * Testing numbers greater than 9999
     */
    function testMillions()
    {
        $millions = array(1000001   => 'um milhão e um',
                          2000025   => 'dois milhões e vinte e cinco',
                          5100000   => 'cinco milhões e cem mil',
                          5015004   => 'cinco milhões quinze mil e quatro',
                          5123000   => 'cinco milhões cento e vinte e três mil',
                          7100100   => 'sete milhões cem mil e cem',
                          8100345   => 'oito milhões cem mil trezentos e quarenta e cinco',
                          8000016   => 'oito milhões e dezesseis',
                          100000001 => 'cem milhões e um',
                          345199054 => 'trezentos e quarenta e cinco milhões cento e noventa e nove mil e cinqüenta e quatro',
                         1000077000 => 'um bilhão e setenta e sete mil',
                         1000777000 => 'um bilhão setecentos e setenta e sete mil',
                          );
        foreach ($millions as $number => $word) {
            $this->assertEquals($word, $this->handle->toWords($number, 'pt_BR'));
            $this->assertEquals("$word negativo", $this->handle->toWords(-$number, 'pt_BR'));
        }
    }

    /**
     * Testing Currency
     */
    function testCurrency()
    {
        $money = array('1.00' => 'um real',
                       '1.01' => 'um real e um centavo',
                       '1.10' => 'um real e dez centavos',
                       '1.11' => 'um real e onze centavos',
                       '1.21' => 'um real e vinte e um centavos',
                       '2.00' => 'dois reais',
                       '2.01' => 'dois reais e um centavo',
                       '2.10' => 'dois reais e dez centavos',
                       '2.11' => 'dois reais e onze centavos',
                       '2.21' => 'dois reais e vinte e um centavos',
                       '0.01' => 'um centavo de real',
                       '0.45' => 'quarenta e cinco centavos de real',
                    '1000.00' => 'um mil reais',
                 '1000000.00' => 'um milhão de reais',
                 '1000001.00' => 'um milhão e um reais',
                 '1100000.00' => 'um milhão e cem mil reais',
               '100001000000' => 'cem bilhões e um milhão de reais',
                 '1000000000' => 'um bilhão de reais',
                          );
        foreach ($money as $number => $word) {
            $this->assertEquals($word, $this->handle->toCurrency($number, 'pt_BR'));
            $this->assertEquals("$word negativo", $this->handle->toCurrency(-$number, 'pt_BR'));
        }
    }
}
