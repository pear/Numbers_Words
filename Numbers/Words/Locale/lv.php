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
 * @author   Andrius Virbičianskas <a@ndri.us>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @version  SVN: $Id$
 * @link     http://pear.php.net/package/Numbers_Words
 */

/**
 * Class for translating numbers into Latvian.
 *
 * @author Andrius Virbičianskas. Source from Laurynas Butkus.
 * @package Numbers_Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into Latvian.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Andrius Virbičianskas <a@ndri.us>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_Locale_lv extends Numbers_Words
{

    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'lv';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Latvian';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'latviešu';

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
        3 => array('tūkstotis','tūkstoši','tūkstoši'),
        6 => array('miljons','miljoni','miljons'),
        9 => array('miljards','miljardi','miljardi'),
       12 => array('triljons','triljoni','triljoni'),
       15 => array('kvadriljons','kvadriljoni','kvadriljoni'),
       18 => array('kvintiljons','kvintiljoni','kvintiljoni')
        );

    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'nulle', 'viens', 'divi', 'trīs', 'četri',
        'pieci', 'seši', 'septiņi', 'astoņi', 'deviņi'
    );

    /**
     * The word separator
     * @var string
     * @access private
     */
    var $_sep = ' ';

    /**
     * The currency names (based on the below links,
     * informations from central bank websites and on encyclopedias)
     *
     * @var array
     * @link http://www.jhall.demon.co.uk/currency/by_abbrev.html World currencies
     * @link http://www.rusimpex.ru/Content/Reference/Refinfo/valuta.htm Foreign currencies names
     * @link http://www.cofe.ru/Finance/money.asp Currencies names
     * @access private
     */
     // TODO: recheck
    var $_currency_names = array(
      'ALL' => array(array('lek'), array('qindarka')),
      'AUD' => array(array('Austrālijas dolārs', 'Austrālijas dolāri'), array('cents', 'centi')),
      'BAM' => array(array('konvertējamas marka'), array('fenig')),
      'BGN' => array(array('lev'), array('stotinka')),
      'BRL' => array(array('real'), array('centavos')),
      'BYR' => array(array('Baltkrievijas rublis', 'Baltkrievijas rubļi'), array('kapeika', 'kapeikās')),
      'CAD' => array(array('Kanādas dolārs', 'Kanādas dolāri'), array('cents', 'centi')),
      'CHF' => array(array('Šveices franks', 'Šveices franki'), array('rapp')),
      'CYP' => array(array('Kipras mārciņa', 'Kipras mārciņas'), array('cents', 'centi')),
      'CZK' => array(array('Čehijas krona', 'Čehijas kronās'), array('halerz')),
      'DKK' => array(array('Dāniska krona', 'Dāniskas kronas'), array('ore')),
      'EEK' => array(array('kroon'), array('senti')),
      'EUR' => array(array('eiro'), array('eiro-cents', 'eiro-centi')),
      'GBP' => array(array('mārciņa', 'mārciņas'), array('pensi')),
      'HKD' => array(array('Honkongas dolārs', 'Honkongas dolāri'), array('cent')),
      'HRK' => array(array('Horvātijas kuna', 'Horvātijas kunas'), array('lipa')),
      'HUF' => array(array('forint'), array('filler')),
      'ILS' => array(array('jauna šekelis','jauni šekeli'), array('agora','agorot')),
      'ISK' => array(array('Islandes krona', 'Islandes kronas'), array('aurar')),
      'JPY' => array(array('yen'), array('sen')),
      'LTL' => array(array('lit'), array('cents', 'centi')),
      'LVL' => array(array('lat'), array('sentim')),
      'MKD' => array(array('Maķedonijas dinārs', 'Maķedonijas dināri'), array('deni')),
      'MTL' => array(array('Maltas lira', 'Maltas liras'), array('centym')),
      'NOK' => array(array('Norvēģiska krona', 'Norvēģiskas kronas'), array('oere')),
      'PLN' => array(array('zlot'), array('grosz')),
      'ROL' => array(array('Rumānijas leja', 'Rumānijas lejas'), array('bani')),
      'RUB' => array(array('Krievijas rublis', 'Krievijas rubļi'), array('kapeika', 'kapeikās')),
      'SEK' => array(array('Zviedru krona', 'Zviedru kronas'), array('oere')),
      'SIT' => array(array('Tolars', 'Tolari'), array('stotinia')),
      'SKK' => array(array('Slovākijas krona', 'Slovākijas kronas'), array('halier')),
      'TRL' => array(array('lira'), array('kuruю')),
      'UAH' => array(array('hryvna'), array('cents', 'centi')),
      'USD' => array(array('dolārs'), array('cents', 'centi')),
      'YUM' => array(array('dinārs', 'dinārsi'), array('para')),
      'ZAR' => array(array('rand'), array('cents', 'centi'))
    );

    /**
     * The default currency name
     * @var string
     * @access public
     */
    var $def_currency = 'Ls';

    // }}}
    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in Latvian language
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
     * @author Andrius Virbičianskas <a@ndri.us>
     * @since  Numbers_Words 0.16.4
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
            $ret .= $this->_sep . $this->_digits[$h] . $this->_sep . 'simti';
        } elseif ( $h ) {
            $ret .= $this->_sep . 'simts';
        }

        // ten, twenty etc.
        switch ($t) {
        case 9:
            $ret .= $this->_sep . 'deviņdesmit';
            break;

        case 8:
            $ret .= $this->_sep . 'astoņdesmit';
            break;

        case 7:
            $ret .= $this->_sep . 'septiņdesmit';
            break;

        case 6:
            $ret .= $this->_sep . 'sešdesmit';
            break;

        case 5:
            $ret .= $this->_sep . 'piecdesmit';
            break;

        case 4:
            $ret .= $this->_sep . 'četrdesmit';
            break;

        case 3:
            $ret .= $this->_sep . 'trīsdesmit';
            break;

        case 2:
            $ret .= $this->_sep . 'divdesmit';
            break;

        case 1:
            switch ($d) {
            case 0:
                $ret .= $this->_sep . 'desmit';
                break;

            case 1:
                $ret .= $this->_sep . 'vienpadsmit';
                break;

            case 2:
                $ret .= $this->_sep . 'divpadsmit';
                break;

            case 3:
                $ret .= $this->_sep . 'trīspadsmit';
                break;

            case 4:
                $ret .= $this->_sep . 'četrpadsmit';
                break;

            case 5:
                $ret .= $this->_sep . 'piecpadsmit';
                break;

            case 6:
                $ret .= $this->_sep . 'sešpadsmit';
                break;

            case 7:
                $ret .= $this->_sep . 'septiņpadsmit';
                break;

            case 8:
                $ret .= $this->_sep . 'astoņpadsmit';
                break;

            case 9:
                $ret .= $this->_sep . 'deviņpadsmit';
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
    // }}}
    // {{{ toCurrencyWords()

    /**
     * Converts a currency value to its word representation
     * (with monetary units) in Latvian language
     *
     * @param integer $int_curr         An international currency symbol
     *                                  as defined by the ISO 4217 standard (three characters)
     * @param integer $decimal          A money total amount without fraction part (e.g. amount of dollars)
     * @param integer $fraction         Fractional part of the money amount (e.g. amount of cents)
     *                                  Optional. Defaults to false.
     * @param integer $convert_fraction Convert fraction to words (left as numeric if set to false).
     *                                  Optional. Defaults to true.
     *
     * @return string  The corresponding word representation for the currency
     *
     * @access public
     * @author MaxB
     */
    function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
    {
        if (is_array($int_curr))
            $curr_names = $int_curr;
        else
        {
            $int_curr = strtoupper($int_curr);
            if (!isset($this->_currency_names[$int_curr])) {
                $int_curr = $this->def_currency;
            }
            $curr_names = $this->_currency_names[$int_curr];
        }

        $ret = trim($this->_toWords($decimal));
        if (Numbers_Words::$useAbbrAsDecimalNames)
            $ret .= $this->_sep . $int_curr;
        else
        {
            $lev = ($decimal == 1) ? 0 : 1;
            if ($lev > 0) {
                if (count($curr_names[0]) > 1) {
                    $ret .= $this->_sep . $curr_names[0][$lev];
                } else {
                    $ret .= $this->_sep . $curr_names[0][0];
                }
            } else {
                $ret .= $this->_sep . $curr_names[0][0];
            }
        }

        if ($fraction !== false) {
            if ($convert_fraction) {
                $ret .= $this->_sep . trim($this->_toWords($fraction));
            } else {
                $ret .= $this->_sep . $fraction;
            }
            $lev = ($fraction == 1) ? 0 : 1;
            if ($lev > 0) {
                if (count($curr_names[1]) > 1) {
                    $ret .= $this->_sep . $curr_names[1][$lev];
                } else {
                    $ret .= $this->_sep . $curr_names[1][0];
                }
            } else {
                $ret .= $this->_sep . $curr_names[1][0];
            }
        }
        return $ret;
    }
    // }}}

}
