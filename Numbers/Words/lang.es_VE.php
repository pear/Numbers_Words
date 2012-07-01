<?php
/**
 * Numbers_Words
 *
 * PHP version 5
 *
 * Copyright (c) 1997-2012 The PHP Group
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
 * @author   Pavel Oropeza   <pavel@cognus.ath.cx>
 * @author   Martin Marrese  <mmare@mecon.gov.ar>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @version  SVN: $Id: lang.es_AR.php 269823 2008-11-25 13:47:38Z clockwerx $
 * @link     http://pear.php.net/package/Numbers_Words
 */

/**
 * Class for translating numbers into Spanish.
 *
 * @author   Emilio Silveira <emilio.rst@gmail.com>
 * @package Numbers_Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into Venezuelan Spanish.
 * It supports up to decallones (10^6).
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Pavel Oropeza   <pavel@cognus.ath.cx>
 * @author   Martin Marrese  <mmare@mecon.gov.ar>
 * @author   Emilio Silveira <emilio.rst@gmail.com>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_es_VE extends Numbers_Words
{
    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'es_VE';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Spanish';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'Español';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'menos';

    /**
     * The sufixes for exponents (singular and plural)
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => array('',''),
        3 => array('mil','mil'),
        6 => array('millón','millones'),
       12 => array('billón','billones'),
       18 => array('trilón','trillones'),
       24 => array('cuatrillón','cuatrillones'),
       30 => array('quintillón','quintillones'),
       36 => array('sextillón','sextillones'),
       42 => array('septillón','septillones'),
       48 => array('octallón','octallones'),
       54 => array('nonallón','nonallones'),
       60 => array('decallón','decallones'),
        );
    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'cero', 'un', 'dos', 'tres', 'cuatro',
        'cinco', 'seis', 'siete', 'ocho', 'nueve'
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
     * @link http://30-03-67.dreamstation.com/currency_alfa.htm World Currency Information
     * @link http://www.jhall.demon.co.uk/currency/by_abbrev.html World currencies
     * @link http://www.shoestring.co.kr/world/p.visa/change.htm Currency names in English
     * @access private
     */
    var $_currency_names = array(
		'ALL' => array(array('lek'), array('qindarka')),
		'AUD' => array(array('dólar australiano', 'dólares australianos'), array('centavo')),
		'ARS' => array(array('peso'), array ('centavo')),
		'BAM' => array(array('convertible marka'), array('fenig')),
		'BGN' => array(array('lev'), array('stotinka')),
		'BRL' => array(array('real','reales'), array('centavo')),
		'BYR' => array(array('rublo bielorruso', 'rublos bielorrusos'), array('kopek', 'kopeks')),
		'CAD' => array(array('dólar canadiense', 'dólares canadienses'), array('centavo')),
		'CHF' => array(array('Swiss franc'), array('rapp')),
		'CYP' => array(array('Cypriot pound'), array('cent')),
		'CZK' => array(array('Czech koruna'), array('halerz')),
		'DKK' => array(array('Danish krone'), array('ore')),
		'EEK' => array(array('kroon'), array('senti')),
		'EUR' => array(array('euro'), array('centavo')),
		'GBP' => array(array('libra'), array('peñique')),
		'HKD' => array(array('dólar de hong kong', 'dólares de hong kong'), array('centavo')),
		'HRK' => array(array('Croatian kuna'), array('lipa')),
		'HUF' => array(array('forint'), array('filler')),
		'ILS' => array(array('new sheqel','new sheqels'), array('agora','agorot')),
		'ISK' => array(array('Icelandic króna'), array('aurar')),
		'JPY' => array(array('yen', 'yenes'), array('sen')),
		'LTL' => array(array('litas'), array('cent')),
		'LVL' => array(array('lat'), array('sentim')),
		'MKD' => array(array('denar macedonio', 'denares macedonios'), array('deni')),
		'MTL' => array(array('lira maltesa'), array('céntimo')),
		'MXN' => array(array('peso'), array ('centavo')),
		'NOK' => array(array('Norwegian krone'), array('oere')),
		'PLN' => array(array('zloty', 'zlotys'), array('grosz')),
		'ROL' => array(array('Romanian leu'), array('bani')),
		'RUB' => array(array('rublo ruso', 'rublos rusos'), array('kopek')),
		'SEK' => array(array('Swedish krona'), array('oere')),
		'SIT' => array(array('Tolar'), array('stotinia')),
		'SKK' => array(array('Slovak koruna'), array()),
		'TRL' => array(array('lira'), array('kuruþ')),
		'UAH' => array(array('hryvna'), array('cent')),
		'USD' => array(array('dólar', 'dólares'), array('centavo')),
		'VEB' => array(array('bolívar', 'bolívares'), array('céntimo')),
		'YUM' => array(array('dinar', 'dinares'), array('para')),
		'ZAR' => array(array('rand'), array('cent'))
		);

    /**
     * The default currency name
     * @var string
     * @access public
     */
    var $def_currency = 'VEB'; // Bolívares

    // }}}
    // {{{ _toWords()
    /**
     * Converts a number to its word representation
     * in Spanish.
     *
     * @param float   $num   An float between -infinity and infinity inclusive :)
     *                        that should be converted to a words representation
     * @param integer $power The power of ten for the rest of the number to the right.
     *                        For example toWords(12,3) should give "doce mil".
     *                        Optional, defaults to 0.
     *
     * @return string  The corresponding word representation
     *
     * @access protected
     * @author Martin Marrese
     * @since  Numbers_Words 0.16.3
     */
    function _toWords($num, $power = 0)
    {
        // The return string;
        $ret = '';

        // add a the word for the minus sign if necessary
        if (substr($num, 0, 1) == '-') {
            $ret = $this->_sep . $this->_minus;
            $num = substr($num, 1);
        }


        // strip excessive zero signs
        $num = preg_replace('/^0+/', '', $num);

        $num_tmp = explode('.', $num);

        $num = $num_tmp[0];
        $dec = (@$num_tmp[1]) ? $num_tmp[1] : '';

        if (strlen($num) > 6) {
            $current_power = 6;
            // check for highest power
            if (isset($this->_exponent[$power])) {
                // convert the number above the first 6 digits
                // with it's corresponding $power.
                $snum = substr($num, 0, -6);
                $snum = preg_replace('/^0+/', '', $snum);
                if ($snum !== '') {
                    $ret .= $this->_toWords($snum, $power + 6);
                }
            }
            $num = substr($num, -6);
            if ($num == 0) {
                return $ret;
            }
        } elseif ($num == 0 || $num == '') {
            return(' '.$this->_digits[0]);
            $current_power = strlen($num);
        } else {
            $current_power = strlen($num);
        }

        // See if we need "thousands"
        $thousands = floor($num / 1000);
        if ($thousands == 1) {
            $ret .= $this->_sep . 'mil';
        } elseif ($thousands > 1) {
            $ret .= $this->_toWords($thousands, 3);
        }

        // values for digits, tens and hundreds
        $h = floor(($num / 100) % 10);
        $t = floor(($num / 10) % 10);
        $d = floor($num % 10);

        // cientos: doscientos, trescientos, etc...
        switch ($h) {
        case 1:
            if (($d == 0) and ($t == 0)) { // is it's '100' use 'cien'
                $ret .= $this->_sep . 'cien';
            } else {
                $ret .= $this->_sep . 'ciento';
            }
            break;
        case 2:
        case 3:
        case 4:
        case 6:
        case 8:
            $ret .= $this->_sep . $this->_digits[$h] . 'cientos';
            break;
        case 5:
            $ret .= $this->_sep . 'quinientos';
            break;
        case 7:
            $ret .= $this->_sep . 'setecientos';
            break;
        case 9:
            $ret .= $this->_sep . 'novecientos';
            break;
        }

        // decenas: veinte, treinta, etc...
        switch ($t) {
        case 9:
            $ret .= $this->_sep . 'noventa';
            break;

        case 8:
            $ret .= $this->_sep . 'ochenta';
            break;

        case 7:
            $ret .= $this->_sep . 'setenta';
            break;

        case 6:
            $ret .= $this->_sep . 'sesenta';
            break;

        case 5:
            $ret .= $this->_sep . 'cincuenta';
            break;

        case 4:
            $ret .= $this->_sep . 'cuarenta';
            break;

        case 3:
            $ret .= $this->_sep . 'treinta';
            break;

        case 2:
            if ($d == 0) {
                $ret .= $this->_sep . 'veinte';
            } else {
                if (($power > 0) and ($d == 1)) {
                    $ret .= $this->_sep . 'veintiún';
                } else {
                    $ret .= $this->_sep . 'veinti' . $this->_digits[$d];
                }
            }
            break;

        case 1:
            switch ($d) {
            case 0:
                $ret .= $this->_sep . 'diez';
                break;

            case 1:
                $ret .= $this->_sep . 'once';
                break;

            case 2:
                $ret .= $this->_sep . 'doce';
                break;

            case 3:
                $ret .= $this->_sep . 'trece';
                break;

            case 4:
                $ret .= $this->_sep . 'catorce';
                break;

            case 5:
                $ret .= $this->_sep . 'quince';
                break;

            case 6:
            case 7:
            case 9:
            case 8:
                $ret .= $this->_sep . 'dieci' . $this->_digits[$d];
                break;
            }
            break;
        }

        // add digits only if it is a multiple of 10 and not 1x or 2x
        if (($t != 1) and ($t != 2) and ($d > 0)) {

            // don't add 'y' for numbers below 10
            if ($t != 0) {
                // use 'un' instead of 'uno' when there is a suffix ('mil', 'millones', etc...)
                if (($power > 0) and ($d == 1)) {
                    $ret .= $this->_sep.' y un';
                } else {
                    $ret .= $this->_sep.'y '.$this->_digits[$d];
                }
            } else {
                if (($power > 0) and ($d == 1)) {
                    $ret .= $this->_sep.'un';
                    
                } else {
                    $ret .= $this->_sep.$this->_digits[$d];
                }
            }
        }

        if ($power > 0) {
            if (isset($this->_exponent[$power])) {
                $lev = $this->_exponent[$power];
            }

            if (!isset($lev) || !is_array($lev)) {
                return null;
            }

            // if it's only one use the singular suffix
            if (($d == 1) and ($t == 0) and ($h == 0)) {
                $suffix = $lev[0];
            } else {
                $suffix = $lev[1];
            }
            if ($num != 0) {
                $ret .= $this->_sep . $suffix;
            }
        }

        if ($dec) {
            $dec  = $this->_toWords(trim($dec));
            $ret .= ' con ' . trim($dec);
        }

        return $ret;
    }
    

    /**
     * Converts a currency value to its word representation
     * (with monetary units) in Spanish language
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
     * @author Pavel Oropeza
     */
    function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
    {
        if (!isset($this->_currency_names[$int_curr])) {
            $int_curr = $this->def_currency;
        }

        $curr_names = $this->_currency_names[$int_curr];

        $lev = ($decimal == 1) ? 0 : 1;
        if ($lev > 0) {
            $curr_names = $this->_currency_names[$int_curr];
            if (count($curr_names[0]) > 1) {
                $ret = $curr_names[0][$lev];
            } else {
                $ret = $curr_names[0][0] . 's';
            }

        } else {
            $ret = $curr_names[0][0];
        }
        $ret = $this->_sep . ucfirst(trim($this->_toWords($decimal) ." " . $ret)); 

        if ($fraction !== false) {
            if ($convert_fraction) {
                $ret .= $this->_sep .'con'. $this->_sep . trim($this->_toWords($fraction));
            } else {
                $ret .= $this->_sep .'con'. $this->_sep . $fraction;
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
}
