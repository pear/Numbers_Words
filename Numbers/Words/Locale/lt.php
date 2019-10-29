<?php
/**
 * Numbers_Words
 *
 * PHP version 5
 *
 * Copyright (c) 1997-2006 The PHP Group
 *
 * This source file is subject to version 3.01 of the PHP license,
 * that is bundled with this package in the file LICENSE, and is
 * available at through the world-wide-web at
 * http://www.php.net/license/3_01.txt
 * If you did not receive a copy of the PHP license and are unable to
 * obtain it through the world-wide-web, please send a note to
 * license@php.net so we can mail you a copy immediately.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Laurynas Butkus <lauris@night.lt>, Paulius Mačernis <sugalvojau@gmail.com>, Matas Bilinkevičius <matasbi@gmail.com>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @version  SVN: $Id$
 * @link     http://pear.php.net/package/Numbers_Words
 */

/**
 * Class for translating numbers into Lithuanian.
 *
 * @author Laurynas Butkus, Paulius Mačernis
 * @package Numbers_Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into Lithuanian.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Laurynas Butkus <lauris@night.lt>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_Locale_lt extends Numbers_Words
{

    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'lt';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Lithuanian';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'lietuviškai';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'minus'; // minus sign

    /**
     * The sufixes for exponents (singular and plural)
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => array(''),
        3 => array('tūkstantis','tūkstančiai','tūkstančių'),
        6 => array('milijonas','milijonai','milijonų'),
        9 => array('bilijonas','bilijonai','bilijonų'),
       12 => array('trilijonas','trilijonai','trilijonų'),
       15 => array('kvadrilijonas','kvadrilijonai','kvadrilijonų'),
       18 => array('kvintilijonas','kvintilijonai','kvintilijonų')
        );

    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'nulis', 'vienas', 'du', 'trys', 'keturi',
        'penki', 'šeši', 'septyni', 'aštuoni', 'devyni'
    );

    /**
     * The word separator
     * @var string
     * @access private
     */
    var $_sep = ' ';

    /**
     * The decimals and fraction separator
     * @var string
     * @access private
     */
    var $_sep_df = ' ir';

    /**
     * The currency names (based on the below links,
     * informations from central bank websites and on encyclopedias)
     *
     * @var array
     * @link http://www.currency-iso.org/en/home/tables/table-a1.html Current currency & funds code list
     * @link http://lt.wikipedia.org/wiki/ISO_4217 Currency names in Lithuanian
     * @access private
     */
    var $_currency_names = array(
        # TODO : describe all
        'AFN' => array(array('afganis', 'afganiai', 'afganių'), array('pulius', 'puliai', 'pulių')),
        'AED' => array(array('Jungtinių Arabų Emyratų dirhamas', 'Jungtinių Arabų Emyratų dirhamai', 'Jungtinių Arabų Emyratų dirhamų'), array('filsas', 'filsai', 'filsų')),
        'ALL' => array(array('lekas', 'lekai', 'lekų'), array('kindrakas', 'kindrakai', 'kindrakų')),
        'AUD' => array(array('Australijos doleris', 'Australijos doleriai', 'Australijos dolerių'), array('centas', 'centai', 'centų')),
        'BAM' => array(array('konvertuojamoji markė', 'konvertuojamos markės', 'konvertuojamų markių'), array('feningas', 'feningai', 'feningų')),
        'BGN' => array(array('Bulgarijos levas', 'Bulgarijos levai', 'Bulgarijos levų'), array('stotinkas', 'stotinkai', 'stotinkų')),
        'BRL' => array(array('Brazilijos realas', 'Brazilijos realai', 'Brazilijos realų'), array('centavas', 'centavai', 'centavų')),
        'BYR' => array(array('Baltarusijos rublis', 'Baltarusijos rubliai', 'Baltarusijos rublių'), array('kapeika', 'kapeikos', 'kapeikų')),
        'CAD' => array(array('Kanados doleris', 'Kanados doleriai', 'Kanados dolerių'), array('centas', 'centai', 'centų')),
        'CHF' => array(array('Šveicarijos frankas', 'Šveicarijos frankai', 'Šveicarijos frankų'), array('rapenas', 'rapenai', 'rapenų')),
        'CYP' => array(array('Kipro svaras', 'Kipro svarai', 'Kipro svarų'), array('centas', 'centai', 'centų')), // EUR since 31 December 2007
        'CZK' => array(array('Čekijos krona', 'Čekijos kronos', 'Čekijos kronų'), array('haleris', 'haleriai', 'halerių')),
        'DKK' => array(array('Danijos krona', 'Danijos kronos', 'Danijos kronų'), array('eris', 'eriai', 'erių')),
        'EEK' => array(array('Estijos krona', 'Estijos kronos', 'Estijos kronų'), array('sentas', 'sentai', 'sentų')), // EUR since 01 January 2011
        'EUR' => array(array('euras', 'eurai', 'eurų'), array('euro centas', 'euro centai', 'euro centų')),
        'LTL' => array(array('litas', 'litai', 'litų'), array('centas', 'centai', 'centų')),
    );

    /**
     * The default currency name
     * @var string
     * @access public
     */
    var $def_currency = 'LTL';

    // }}}
    // {{{ _toWords()

    /**
     * Converts a currency value to its word representation
     * (with monetary units) in English language
     *
     * @param integer $int_curr An international currency symbol
     *                                  as defined by the ISO 4217 standard (three characters)
     * @param integer $decimal A money total amount without fraction part (e.g. amount of dollars)
     * @param integer $fraction Fractional part of the money amount (e.g. amount of cents)
     *                                  Optional. Defaults to false.
     * @param integer $convert_fraction Convert fraction to words (left as numeric if set to false).
     *                                  Optional. Defaults to true.
     *
     * @return string  The corresponding word representation for the currency
     *
     * @access public
     * @author Paulius Mačernis <sugalvojau@gmail.com>
     * @since  Numbers_Words X.XX.X
     */
    function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
    {
        $int_curr = strtoupper($int_curr);
        if (!isset($this->_currency_names[$int_curr])) {
            $int_curr = $this->def_currency;
        }

        // Take care of decimal part
        $ret = trim($this->_toWords($decimal));
        $ret .= $this->_getCurrencyDecimalName($decimal, $int_curr);

        // $fraction must be forced to be 0 if $convert_fraction is set to true and 
        if (($convert_fraction === true) && ($fraction === false)) {
            $fraction = 0;
        }

        // Take care of fractional part
        if ($fraction !== false) {
            $ret .= $this->_sep_df;
         if ($convert_fraction) {
                $ret .= $this->_sep . trim($this->_toWords($fraction));
            } else {
                $ret .= $this->_sep . $fraction;
            }

            $ret .= $this->_getCurrencyFractionName($fraction, $int_curr);
        }
        return $ret;
    }

    // }}}

    /**
     * Converts a number to its word representation
     * in Lithuanian language
     *
     * @param integer $num       An integer between -infinity and infinity inclusive :)
     *                           that need to be converted to words
     * @param integer $power     The power of ten for the rest of the number to the right.
     *                           Optional, defaults to 0.
     * @param integer $powsuffix The power name to be added to the end of the return string.
     *                            Used internally. Optional, defaults to ''.
     *
     * @return string  The corresponding word representation
     *
     * @access protected
     * @author Laurynas Butkus <lauris@night.lt>
     * @since  Numbers_Words 0.16.3
     */
    function _toWords($num, $power = 0, $powsuffix = '')
    {
        $ret = '';

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->_sep . $this->_minus;
            $num = substr($num, 1);
        }

        // strip excessive zero signs and spaces
        $num = trim($num);
        $num = preg_replace('/^0+/', '', $num);

        if (strlen($num) > 3) {
            $maxp = strlen($num)-1;
            $curp = $maxp;
            for ($p = $maxp; $p > 0; --$p) { // power

                // check for highest power
                if (isset($this->_exponent[$p])) {
                    // send substr from $curp to $p
                    $snum = substr($num, $maxp - $curp, $curp - $p + 1);
                    $snum = preg_replace('/^0+/', '', $snum);
                    if ($snum !== '') {
                        $cursuffix = $this->_exponent[$power][count($this->_exponent[$power])-1];
                        if ($powsuffix != '') {
                            $cursuffix .= $this->_sep . $powsuffix;
                        }

                        $ret .= $this->_toWords($snum, $p, $cursuffix);
                    }
                    $curp = $p - 1;
                    continue;
                }
            }
            $num = substr($num, $maxp - $curp, $curp - $p + 1);
            if ($num == 0) {
                return $ret;
            }
        } elseif ($num == 0 || $num == '') {
            return $this->_sep . $this->_digits[0];
        }

        $h = $t = $d = 0;

        switch(strlen($num)) {
        case 3:
            $h = (int)substr($num, -3, 1);

        case 2:
            $t = (int)substr($num, -2, 1);

        case 1:
            $d = (int)substr($num, -1, 1);
            break;

        case 0:
            return;
            break;
        }

        if ( $h > 1 ) {
            $ret .= $this->_sep . $this->_digits[$h] . $this->_sep . 'šimtai';
        } elseif ( $h ) {
            $ret .= $this->_sep . 'šimtas';
        }

        // ten, twenty etc.
        switch ($t) {
        case 9:
            $ret .= $this->_sep . 'devyniasdešimt';
            break;

        case 8:
            $ret .= $this->_sep . 'aštuoniasdešimt';
            break;

        case 7:
            $ret .= $this->_sep . 'septyniasdešimt';
            break;

        case 6:
            $ret .= $this->_sep . 'šešiasdešimt';
            break;

        case 5:
            $ret .= $this->_sep . 'penkiasdešimt';
            break;

        case 4:
            $ret .= $this->_sep . 'keturiasdešimt';
            break;

        case 3:
            $ret .= $this->_sep . 'trisdešimt';
            break;

        case 2:
            $ret .= $this->_sep . 'dvidešimt';
            break;

        case 1:
            switch ($d) {
            case 0:
                $ret .= $this->_sep . 'dešimt';
                break;

            case 1:
                $ret .= $this->_sep . 'vienuolika';
                break;

            case 2:
                $ret .= $this->_sep . 'dvylika';
                break;

            case 3:
                $ret .= $this->_sep . 'trylika';
                break;

            case 4:
                $ret .= $this->_sep . 'keturiolika';
                break;

            case 5:
                $ret .= $this->_sep . 'penkiolika';
                break;

            case 6:
                $ret .= $this->_sep . 'šešiolika';
                break;

            case 7:
                $ret .= $this->_sep . 'septyniolika';
                break;

            case 8:
                $ret .= $this->_sep . 'aštuoniolika';
                break;

            case 9:
                $ret .= $this->_sep . 'devyniolika';
                break;

            }
            break;
        }

        // add digits only in <0>,<1,9> and <21,inf>
        if ($t != 1 && $d > 0) {
            if ( $d > 1 || !$power || $t ) {
                $ret .= $this->_sep . $this->_digits[$d];
            }
        }

        if ($power > 0) {
            if (isset($this->_exponent[$power])) {
                $lev = $this->_exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            //echo " $t $d  <br>";

            if ($t == 1 || ($t > 0 && $d == 0 )) {
                $ret .= $this->_sep . $lev[2];
            } elseif ( $d > 1 ) {
                $ret .= $this->_sep . $lev[1];
            } else {
                $ret .= $this->_sep . $lev[0];
            }
        }

        if ($powsuffix != '') {
            $ret .= $this->_sep . $powsuffix;
        }

        return $ret;
    }

    /**
     * Gets the name of the decimal part.
     *
     * @param   integer $decimal A money total amount without fraction part (e.g. amount of dollars)
     * @param   string $int_curr An international currency symbol
     *                                  as defined by the ISO 4217 standard (three characters)
     * @return  string      Name of the decimal part (e.g. 'dollar', 'dollars', 'litas', 'litai', 'litų')
     *
     * @access  private
     * @author  Paulius Mačernis <sugalvojau@gmail.com>
     * @since   Numbers_Words X.XX.X
     *
     */
    private function _getCurrencyDecimalName($decimal, $int_curr)
    {

        $ret = '' . $this->_sep;

        $curr_names = $this->_currency_names[$int_curr];

        $last_two_digits = (int)substr($decimal, -2);
        if (($last_two_digits >= 10) && ($last_two_digits <= 20)) {
            return ($ret . $curr_names[0][2]); // litų
        }

        $last_digit = (int)substr($decimal, -1);

        switch ($last_digit) {
            case 0:
                return ($ret . $curr_names[0][2]); // litų
            case 1:
                return ($ret . $curr_names[0][0]); // litas
            default: // 2, 3, 4, 5, 6, 7, 8, 9
                return ($ret . $curr_names[0][1]); // litai
        }
    }

    /**
     * Gets the name of the fractional part.
     *
     * @param   integer $fraction Fractional value of the money amount (e.g. amount of cents)
     * @param   string $int_curr An international currency symbol
     *                                  as defined by the ISO 4217 standard (three characters)
     * @return  string      Name of the fractional part (e.g. 'cent', 'cents', 'centas', 'centai', 'centų')
     *
     * @access  private
     * @author  Paulius Mačernis <sugalvojau@gmail.com>
     * @since   Numbers_Words X.XX.X
     *
     */
    private function _getCurrencyFractionName($fraction, $int_curr)
    {

        $ret = '' . $this->_sep;

        $curr_names = $this->_currency_names[$int_curr];

        $last_two_digits = (int)substr($fraction, -2);
        if (($last_two_digits >= 10) && ($last_two_digits <= 20)) {
            return ($ret . $curr_names[1][2]); // centų
        }

        $last_digit = (int)substr($fraction, -1);

        switch ($last_digit) {
            case 0:
                return ($ret . $curr_names[1][2]);  // centų
            case 1:
                return ($ret . $curr_names[1][0]);  // centas
            default: // 2, 3, 4, 5, 6, 7, 8, 9
                return ($ret . $curr_names[1][1]);  // centai
        }
    }
}
