<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Numbers_Words
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Numbers
 * @package    Numbers_Words
 * @author     Marcelo Subtil Marcal <jason@conectiva.com.br>
 * @author     Mario H.C.T. <mariolinux@mitus.com.br>
 * @author     Igor Feghali <ifeghali@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    CVS: $Id$
 * @link       http://pear.php.net/package/Numbers_Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into Brazilian Portuguese.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Marcelo Subtil Marcal <jason@conectiva.com.br>
 * @author   Mario H.C.T. <mariolinux@mitus.com.br>
 * @author   Igor Feghali <ifeghali@php.net>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_pt_BR extends Numbers_Words
{
    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'pt_BR';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Brazilian Portuguese';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'Português Brasileiro';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'negativo';

    /**
     * The word separator for numerals
     * @var string
     * @access private
     */
    var $_sep = ' e ';

    /**
     * The array containing numbers 11-19.
     * In Brazilian Portuguese numbers in that range are contracted
     * in a single word.
     * @var array
     * @access private
     */
    var $_contractions = array(
        '',
        'onze',
        'doze',
        'treze',
        'quatorze',
        'quinze',
        'dezesseis',
        'dezessete',
        'dezoito',
        'dezenove'
    );

    var $_words = array(
        /**
         * The array containing the digits (indexed by the digits themselves).
         * @var array
         * @access private
         */
        array(
            '',         // 0: not displayed
            'um',
            'dois',
            'três',
            'quatro',
            'cinco',
            'seis',
            'sete',
            'oito',
            'nove'
        ),

        /**
         * The array containing numbers for 10,20,...,90.
         * @var array
         * @access private
         */
        array(
            '',         // 0: not displayed
            'dez',
            'vinte',
            'trinta',
            'quarenta',
            'cinqüenta',
            'sessenta',
            'setenta',
            'oitenta',
            'noventa'
        ),

        /**
         * The array containing numbers for hundreds.
         * @var array
         * @access private
         */
        array(
            '',         // 0: not displayed
            'cento',    // 'cem' is a special case handled in toWords()
            'duzentos',
            'trezentos',
            'quatrocentos',
            'quinhentos',
            'seiscentos',
            'setecentos',
            'oitocentos',
            'novecentos'
        ),
    );

    /**
     * The sufixes for exponents (singular)
     * @var array
     * @access private
     */
    var $_exponent = array(
        '',         // 0: not displayed
        'mil',
        'milhão',
        'bilhão',
        'trilhão',
        'quatrilhão',
        'quintilhão',
        'sextilhão',
        'septilhão',
        'octilhão',
        'nonilhão',
        'decilhão',
        'undecilhão',
        'dodecilhão',
        'tredecilhão',
        'quatuordecilhão',
        'quindecilhão',
        'sedecilhão',
        'septendecilhão'
    );

    /**
     * The currency names (based on the below links,
     * informations from central bank websites and on encyclopedias)
     *
     * @var array
     * @link http://30-03-67.dreamstation.com/currency_alfa.htm World Currency Information
     * @link http://www.jhall.demon.co.uk/currency/by_abbrev.html World currencies
     * @link http://www.shoestring.co.kr/world/p.visa/change.htm Currency names in English
     * @access private
     */
    var $_currency_names = array(
        'BRL' => array(array('real'), array('centavo')) );

    /**
     * The default currency name
     * @var string
     * @access public
     */
    var $def_currency = 'BRL'; // Real

    // {{{ toWords()

    /**
     * Converts a number to its word representation
     * in Brazilian Portuguese language
     *
     * @param integer $num An integer between -999E54 and 999E54
     *
     * @return string  The corresponding word representation
     *
     * @access public
     * @author Igor Feghali <ifeghali@php.net>
     */
    function toWords($num)
    {
        $ret = array();
        $words = array();

        /**
         * Removes leading zeros, spaces, decimals etc.
         * Adds thousands separator.
         */
        $num = number_format($num, 0, '.', '.');

        /**
         * Testing Zero
         */
        if ($num == 0) {
            return 'zero';
        }

        /**
         * Negative ?
         */
        if ($num < 0) {
            $ret[] = $this->_minus;
            $num = -$num;
        }

        /**
         * Breaks into chunks of 3 digits.
         * Reversing array to process from right to left.
         */
        $chunks = array_reverse(explode(".", $num));

        /**
         * Looping through the chunks
         */
        $sep = false;
        foreach ($chunks as $index => $chunk) {
            /**
             * Testing Range
             */
            if (!array_key_exists($index, $this->_exponent)) {
                return Numbers_Words::raiseError('Number out of range.');
            }

            /**
             * Testing Zero
             */
            if ($chunk == 0) {
                continue;
            }

            /**
             * Testing plural of exponent
             */
            if ($chunk > 1) {
                $exponent = str_replace('ão', 'ões', $this->_exponent[$index]);
            } else {
                $exponent = $this->_exponent[$index];
            }

            /**
             * Adding exponent
             */
            $ret[] = $exponent;

            $word = array_filter($this->_parseChunk($chunk, strlen($chunk)));
            $ret[] = implode($this->_sep, $word);
        }

        $ret = array_reverse(array_filter($ret));
        return implode(' ', $ret);
    }

    // }}}
    // {{{ _parseChunck()

    /**
     * Recursive function that parses an indivial chunk
     *
     * @param string $chunk String representation of a 3-digit-max number
     * @param int $i Width of number
     *
     * @return array Words of parsed number
     *
     * @access private
     * @author Igor Feghali <ifeghali@php.net>
     */

    function _parseChunk($chunk, $i)
    {
        /**
         * 100 is a special case
         */
        if ($chunk == 100) {
            return array('cem');
        }

        /**
         * Testing contractions (11~19)
         */
        if (($chunk < 20) && ($chunk > 10)) {
            return array($this->_contractions[$chunk % 10]);
        }

        /**
         * Testing Zero
         */
        if ($chunk == 0) {
            return array();
        }

        $n = (int)$chunk[0];
        $word = $this->_words[$i-1][$n];

        return array_merge(array($word), $this->_parseChunk(substr($chunk, 1), --$i));
    }

    // }}}
    // {{{ toCurrencyWords()

    /**
     * Converts a currency value to its word representation
     * (with monetary units) in Portuguese language
     *
     * @param integer $int_curr         An international currency symbol
     *                                   as defined by the ISO 4217 standard (three characters)
     * @param integer $decimal          A money total amount without fraction part (e.g. amount of dollars)
     * @param integer $fraction         Fractional part of the money amount (e.g.  amount of cents)
     *                                   Optional. Defaults to false.
     * @param integer $convert_fraction Convert fraction to words (left as numeric if set to false).
     *                                   Optional. Defaults to true.
     *
     * @return string  The corresponding word representation for the currency
     *
     * @access public
     * @author Mario H.C.T. <mariolinux@mitus.com.br>
     * @since  Numbers_Words 0.10.1
     */
    function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
    {
        $int_curr = strtoupper($int_curr);
        if (!isset($this->_currency_name[$int_curr])) {
            $int_curr = $this->def_currency;
        }
        $curr_names = $this->_currency_names[$int_curr];

        $ret = trim($this->toWords($decimal));
        $lev = ($decimal == 1) ? 0 : 1;
        if ($lev > 0) {
            if (count($curr_names[0]) > 1) {
                $ret .= $this->_sep . $curr_names[0][$lev];
            } else {
                if ($int_curr == "BRL") {
                    $ret .= $this->_sep . $curr_names[0][0] . 'is';
                } else {
                    $ret .= $this->_sep . $curr_names[0][0] . 's';
                }
            }
        } else {
            if ($int_curr == "BRL") {
                $ret .= $this->_sep . $curr_names[0][0] . 'l';
            } else {
                $ret .= $this->_sep . $curr_names[0][0];
            }
        }

        if ($fraction !== false) {
            if ($int_curr == "BRL") {
                $ret .= $this->_sep . 'e';
            }

            if ($convert_fraction) {
                $ret .= $this->_sep . trim($this->toWords($fraction));
            } else {
                $ret .= $this->_sep . $fraction;
            }

            $lev = ($fraction == 1) ? 0 : 1;
            if ($lev > 0) {
                if (count($curr_names[1]) > 1) {
                    $ret .= $this->_sep . $curr_names[1][$lev];
                } else {
                    $ret .= $this->_sep . $curr_names[1][0] . 's';
                }
            } else {
                $ret .= $this->_sep . $curr_names[1][0];
            }
        }

        return $ret;
    }
    // }}}
}

?>
