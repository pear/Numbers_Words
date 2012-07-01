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
 * @link     http://pear.php.net/package/Numbers_Words
 */

/**
 * Class for translating numbers into Donald Knuth system, in English language.
 *
 * @author Piotr Klaban
 * @package Numbers_Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into Donald Knuth system, in English language.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_en_100 extends Numbers_Words
{

    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'en_100';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'English (Donald Knuth system)';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'English (Donald Knuth system)';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'minus'; // minus sign

    /**
     * The sufixes for exponents (singular and plural)
     * Names based on:
     * http://home.earthlink.net/~mrob/pub/math/largenum.html
     * Donald Knuth system (power of 2)
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => array(''),
        2 => array('hundred'),
        4 => array('myriad'),
        8 => array('myllion'),
       16 => array('byllion'),
       32 => array('tryllion'),
       64 => array('quadryllion'),
      128 => array('quintyllion'),
      256 => array('sextyllion'),
      512 => array('septyllion'),
     1024 => array('octyllion'),
     2048 => array('nonyllion'),
     4096 => array('decyllion'),
     8192 => array('undecyllion'),
    16384 => array('duodecyllion'),
    32768 => array('tredecyllion'),
    65536 => array('quattuordecyllion'),
   131072 => array('quindecyllion'),
   262144 => array('sexdecyllion'),
   524288 => array('septendecyllion'),
  1048576 => array('octodecyllion'),
  2097152 => array('novemdecyllion'),
  4194304 => array('vigintyllion')
        );

    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'zero', 'one', 'two', 'three', 'four',
        'five', 'six', 'seven', 'eight', 'nine'
    );

    /**
     * The word separator
     * @var string
     * @access private
     */
    var $_sep = ' ';
    // }}}
    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in Donald Knuth system, in English language.
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

        if ($h) {
            $ret .= $this->_sep . $this->_digits[$h] . $this->_sep . 'hundred';

            // in English only - add ' and' for [1-9]01..[1-9]99
            // (also for 1001..1099, 10001..10099 but it is harder)
            // for now it is switched off, maybe some language purists
            // can force me to enable it, or to remove it completely
            // if (($t + $d) > 0)
            //   $ret .= $this->_sep . 'and';
        }

        // ten, twenty etc.
        switch ($t) {
        case 9:
        case 7:
        case 6:
            $ret .= $this->_sep . $this->_digits[$t] . 'ty';
            break;

        case 8:
            $ret .= $this->_sep . 'eighty';
            break;

        case 5:
            $ret .= $this->_sep . 'fifty';
            break;

        case 4:
            $ret .= $this->_sep . 'forty';
            break;

        case 3:
            $ret .= $this->_sep . 'thirty';
            break;

        case 2:
            $ret .= $this->_sep . 'twenty';
            break;

        case 1:
            switch ($d) {
            case 0:
                $ret .= $this->_sep . 'ten';
                break;

            case 1:
                $ret .= $this->_sep . 'eleven';
                break;

            case 2:
                $ret .= $this->_sep . 'twelve';
                break;

            case 3:
                $ret .= $this->_sep . 'thirteen';
                break;

            case 4:
            case 6:
            case 7:
            case 9:
                $ret .= $this->_sep . $this->_digits[$d] . 'teen';
                break;

            case 5:
                $ret .= $this->_sep . 'fifteen';
                break;

            case 8:
                $ret .= $this->_sep . 'eighteen';
                break;
            }
            break;
        }

        if ($t != 1 && $d > 0) { // add digits only in <0>,<1,9> and <21,inf>
            // add minus sign between [2-9] and digit
            if ($t > 1) {
                $ret .= '-' . $this->_digits[$d];
            } else {
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

            $ret .= $this->_sep . $lev[0];
        }

        if ($powsuffix != '') {
            $ret .= $this->_sep . $powsuffix;
        }

        return $ret;
    }
    // }}}
}
