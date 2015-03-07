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
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @version  SVN: $Id$
 * @link	 http://pear.php.net/package/Numbers_Words
 */

/**
 * Class for translating numbers into British English.
 *
 * @author Piotr Klaban
 * @package Numbers_Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into British English.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link	 http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_Locale_zh_HKFN extends Numbers_Words
{

	// {{{ properties

	/**
	 * Locale name
	 * @var string
	 * @access public
	 */
	var $locale = 'zh_HKFN';

	/**
	 * Language name in English
	 * @var string
	 * @access public
	 */
	var $lang = 'Traditional Chinese';

	/**
	 * Native language name
	 * @var string
	 * @access public
	 */
	var $lang_native = 'Traditional Chinese';

	/**
	 * The word for the minus sign
	 * @var string
	 * @access private
	 */
	var $_minus = '負'; // minus sign

	/**
	 * The sufixes for exponents (singular and plural)
	 * Names partly based on:
	 * http://www.users.dircon.co.uk/~shaunf/shaun/numbers/millions.htm
	 * @var array
	 * @access private
	 */
	var $_exponent = array(
		0 => array(''),
		4 => array('萬'),
		8 => array('億'),
	   12 => array('兆'),
	//	16 => array('京'),
	//	20 => array('垓'),
	//	24 => array('秭'),
	//	28 => array('穰'),
	//	32 => array('溝'),
	//	36 => array('澗'),
	//	40 => array('正'),
	//	44 => array('載'),
	//	48 => array('極')
		);

	/**
	 * The array containing the digits (indexed by the digits themselves).
	 * @var array
	 * @access private
	 */
	var $_digits = array(
		0 => '零', '壹', '貳', '參', '肆',
		'伍', '陸', '柒', '捌', '玖'
	);

	/**
	 * The word separator
	 * @var string
	 * @access private
	 */
	var $_sep = '';

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
	// var $_currency_names = array(
    //   'ALL' => array(array('lek'), array('qindarka')),
    //   'AUD' => array(array('Australian dollar'), array('cent')),
    //   'BAM' => array(array('convertible marka'), array('fenig')),
    //   'BGN' => array(array('lev'), array('stotinka')),
    //   'BRL' => array(array('real'), array('centavos')),
    //   'BYR' => array(array('Belarussian rouble'), array('kopiejka')),
    //   'CAD' => array(array('Canadian dollar'), array('cent')),
    //   'CHF' => array(array('Swiss franc'), array('rapp')),
    //   'CYP' => array(array('Cypriot pound'), array('cent')),
    //   'CZK' => array(array('Czech koruna'), array('halerz')),
    //   'DKK' => array(array('Danish krone'), array('ore')),
    //   'EEK' => array(array('kroon'), array('senti')),
    //   'EUR' => array(array('euro'), array('euro-cent')),
    //   'GBP' => array(array('pound', 'pounds'), array('pence', 'pence')),
    //   'HKD' => array(array('Hong Kong dollar'), array('cent')),
    //   'HRK' => array(array('Croatian kuna'), array('lipa')),
    //   'HUF' => array(array('forint'), array('filler')),
    //   'ILS' => array(array('new sheqel','new sheqels'), array('agora','agorot')),
    //   'ISK' => array(array('Icelandic kr�na'), array('aurar')),
    //   'JPY' => array(array('yen'), array('sen')),
    //   'LTL' => array(array('litas'), array('cent')),
    //   'LVL' => array(array('lat'), array('sentim')),
    //   'MKD' => array(array('Macedonian dinar'), array('deni')),
    //   'MTL' => array(array('Maltese lira'), array('centym')),
    //   'NOK' => array(array('Norwegian krone'), array('oere')),
    //   'PLN' => array(array('zloty', 'zlotys'), array('grosz')),
    //   'ROL' => array(array('Romanian leu'), array('bani')),
    //   'RUB' => array(array('Russian Federation rouble'), array('kopiejka')),
    //   'SEK' => array(array('Swedish krona'), array('oere')),
    //   'SIT' => array(array('Tolar'), array('stotinia')),
    //   'SKK' => array(array('Slovak koruna'), array()),
    //   'TRL' => array(array('lira'), array('kuru�')),
    //   'UAH' => array(array('hryvna'), array('cent')),
    //   'USD' => array(array('dollar'), array('cent')),
    //   'YUM' => array(array('dinars'), array('para')),
    //   'ZAR' => array(array('rand'), array('cent'))
    // );

	/**
	 * The default currency name
	 * @var string
	 * @access public
	 */
	var $def_currency = '元'; // English pound

	// }}}
	// {{{ _toWords()

	/**
	 * Converts a number to its word representation
	 * in British English language
	 *
	 * @param integer $num	   An integer between -infinity and infinity inclusive :)
	 *						   that need to be converted to words
	 * @param integer $power	 The power of ten for the rest of the number to the right.
	 *						   Optional, defaults to 0.
	 * @param integer $powsuffix The power name to be added to the end of the return string.
	 *							Used internally. Optional, defaults to ''.
	 *
	 * @return string  The corresponding word representation
	 *
	 * @access protected
	 * @author Piotr Klaban <makler@man.torun.pl>
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

		// in chinese, number are chunks of four digits
		if (strlen($num) > 4) {
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

		$th = $h = $t = $d = 0;

		switch(strlen($num)) {
        case 4:
            $th = (int)substr($num, -4, 1);
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

		// the 'zero' will be added if th and d are non-zero and h or t are zero
        if ($th) {
            $ret .= $this->_digits[$th] . '仟';
            if ($h == 0 && ($t > 0 || $d > 0)) {
                $ret .= $this->_digits[0];
            }
        }

		// the 'zero' will be added if h and d are non-zero but t is zero
        if ($h) {
            $ret .= $this->_digits[$h] . '佰';
            if ($t == 0 && ($d > 0)) {
                $ret .= $this->_digits[0];
            }
        }

		// ten to ninty-nine
        if ($t > 1) {
			$ret .= $this->_digits[$t] . '拾';
		}
		else if ($t == 1) {
			if ($h) {
                $ret .= $this->_digits[1];
			}

			if ($d > 0) {
				$ret .= '拾' . $this->_digits[$d];
			}
			else {
				$ret .= '拾';
			}
		}

        if ($t != 1 && $d > 0) { // add digits only in <0>,<1,9> and <21,inf>
			$ret .= $this->_digits[$d];
		}

		if ($power > 0) {
			if (isset($this->_exponent[$power])) {
				$lev = $this->_exponent[$power];
			}

			if (!isset($lev) || !is_array($lev)) {
				return null;
			}

			$ret .= $this->_sep . $lev[0];
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
	 * (with monetary units) in English language
	 *
	 * @param integer $int_curr		 An international currency symbol
	 *								  as defined by the ISO 4217 standard (three characters)
	 * @param integer $decimal		  A money total amount without fraction part (e.g. amount of dollars)
	 * @param integer $fraction		 Fractional part of the money amount (e.g. amount of cents)
	 *								  Optional. Defaults to false.
	 * @param integer $convert_fraction Convert fraction to words (left as numeric if set to false).
	 *								  Optional. Defaults to true.
	 *
	 * @return string  The corresponding word representation for the currency
	 *
	 * @access public
	 * @author Piotr Klaban <makler@man.torun.pl>
	 * @since  Numbers_Words 0.13.1
	 */
	// function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
	// {
	// 	$int_curr = strtoupper($int_curr);
	// 	if (!isset($this->_currency_names[$int_curr])) {
	// 		$int_curr = $this->def_currency;
	// 	}
	// 	$curr_names = $this->_currency_names[$int_curr];
	//
	// 	$ret = trim($this->_toWords($decimal));
	// 	$lev = ($decimal == 1) ? 0 : 1;
	// 	if ($lev > 0) {
	// 		if (count($curr_names[0]) > 1) {
	// 			$ret .= $this->_sep . $curr_names[0][$lev];
	// 		} else {
	// 			$ret .= $this->_sep . $curr_names[0][0] . 's';
	// 		}
	// 	} else {
	// 		$ret .= $this->_sep . $curr_names[0][0];
	// 	}
	//
	// 	if ($fraction !== false) {
	// 		if ($convert_fraction) {
	// 			$ret .= $this->_sep . trim($this->_toWords($fraction));
	// 		} else {
	// 			$ret .= $this->_sep . $fraction;
	// 		}
	// 		$lev = ($fraction == 1) ? 0 : 1;
	// 		if ($lev > 0) {
	// 			if (count($curr_names[1]) > 1) {
	// 				$ret .= $this->_sep . $curr_names[1][$lev];
	// 			} else {
	// 				$ret .= $this->_sep . $curr_names[1][0] . 's';
	// 			}
	// 		} else {
	// 			$ret .= $this->_sep . $curr_names[1][0];
	// 		}
	// 	}
	// 	return $ret;
	// }
	// }}}


}
