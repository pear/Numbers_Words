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
 * Class for translating numbers into Serbian.
 *
 * @author Piotr Klaban
 * @author (of Serbian translation) Andrej Mićić
 * @package Numbers_Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into American English.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_Locale_sr extends Numbers_Words
{

    // {{{ properties

    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'sr';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Serbian';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'srpski';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'minus'; // minus sign

    /**
     * The sufixes for exponents (singular and plural)
     * Names partly based on:
     * http://home.earthlink.net/~mrob/pub/math/largenum.html
     * http://mathforum.org/dr.math/faq/faq.large.numbers.html
     * http://www.mazes.com/AmericanNumberingSystem.html
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => array('','',''),
        3 => array('hiljada','hiljade','hiljada'),
        6 => array('milion','miliona'),
        9 => array('milijarda','milijarde','milijardi'),
        12 => array('bilion','biliona'),
        15 => array('bilijarda','bilijarde','bilijardi'),
        18 => array('trilion','triliona'),
        21 => array('trilijarda','trilijarde','trilijardi'),
        24 => array('kvadrilion','kvadriliona'),
        27 => array('kvadrilijarda','kwadrylijarde','kvadrilijardi'),
        30 => array('kwintilion','kwintiliona'),
        33 => array('kvintilijarda','kvintilijarde','kvintilijardi'),
        36 => array('sekstilion','sekstiliona'),
        39 => array('sekstilijarda','sekstilijarde','sekstilijardi'),
        42 => array('septilion','septiliona'),
        45 => array('septilijarda','septilijarde','septilijardi'),
        48 => array('oktilion','oktiliona'),
        51 => array('oktilijarda','oktilijarde','oktilijardi'),
        54 => array('nonilion','noniliona'),
        57 => array('nonilijarda','nonilijarde','nonilijardi'),
       60 => array('novemdecilion'),
       63 => array('vigintilion'),
       66 => array('unvigintilion'),
       69 => array('duovigintilion'),
       72 => array('trevigintilion'),
       75 => array('kvatrovigintilion'),
       78 => array('quinvigintilion'),
       81 => array('seksvigintilion'),
       84 => array('septenvigintilion'),
       87 => array('oktovigintilion'),
       90 => array('novemvigintilion'),
       93 => array('trigintilion'),
       96 => array('untrigintilion'),
       99 => array('duotrigintilion'),
       // 100 => array('googol') - not latin name
       // 10^googol = 1 googolplex
      102 => array('trestrigintilion'),
      105 => array('kvatrotrigintilion'),
      108 => array('quintrigintilion'),
      111 => array('sekstrigintilion'),
      114 => array('septentrigintilion'),
      117 => array('oktotrigintilion'),
      120 => array('novemtrigintilion'),
      123 => array('quadragintilion'),
      126 => array('unquadragintilion'),
      129 => array('duoquadragintilion'),
      132 => array('trequadragintilion'),
      135 => array('kvatroquadragintilion'),
      138 => array('kvinkvadragintilion'),
      141 => array('seksquadragintilion'),
      144 => array('septenquadragintilion'),
      147 => array('oktoquadragintilion'),
      150 => array('novemquadragintilion'),
      153 => array('kvinkvagintilion'),
      156 => array('unkvinkvagintilion'),
      159 => array('duokvinkvagintilion'),
      162 => array('trekvinkvagintilion'),
      165 => array('kvatrokvinkvagintilion'),
      168 => array('quinkvinkvagintilion'),
      171 => array('sekskvinkvagintilion'),
      174 => array('septenkvinkvagintilion'),
      177 => array('oktokvinkvagintilion'),
      180 => array('novemkvinkvagintilion'),
      183 => array('seksagintilion'),
      186 => array('unseksagintilion'),
      189 => array('duoseksagintilion'),
      192 => array('treseksagintilion'),
      195 => array('kvatroseksagintilion'),
      198 => array('quinseksagintilion'),
      201 => array('seksseksagintilion'),
      204 => array('septenseksagintilion'),
      207 => array('oktoseksagintilion'),
      210 => array('novemseksagintilion'),
      213 => array('septuagintilion'),
      216 => array('unseptuagintilion'),
      219 => array('duoseptuagintilion'),
      222 => array('treseptuagintilion'),
      225 => array('kvatroseptuagintilion'),
      228 => array('quinseptuagintilion'),
      231 => array('seksseptuagintilion'),
      234 => array('septenseptuagintilion'),
      237 => array('oktoseptuagintilion'),
      240 => array('novemseptuagintilion'),
      243 => array('oktogintilion'),
      246 => array('unoktogintilion'),
      249 => array('duooktogintilion'),
      252 => array('treoktogintilion'),
      255 => array('kvatrooktogintilion'),
      258 => array('quinoktogintilion'),
      261 => array('seksoktogintilion'),
      264 => array('septoktogintilion'),
      267 => array('oktooktogintilion'),
      270 => array('novemoktogintilion'),
      273 => array('nonagintilion'),
      276 => array('unnonagintilion'),
      279 => array('duononagintilion'),
      282 => array('trenonagintilion'),
      285 => array('kvatrononagintilion'),
      288 => array('quinnonagintilion'),
      291 => array('seksnonagintilion'),
      294 => array('septennonagintilion'),
      297 => array('oktononagintilion'),
      300 => array('novemnonagintilion'),
      303 => array('centilion'),
      309 => array('duocentilion'),
      312 => array('trecentilion'),
      366 => array('primo-vigesimo-centilion'),
      402 => array('trestrigintacentilion'),
      603 => array('ducentilion'),
      624 => array('septenducentilion'),
     // bug on a earthlink page: 903 => array('trecentilion'),
     2421 => array('seksoctingentilion'),
     3003 => array('mililion'),
     3000003 => array('mili-mililion')
        );

    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'nula', 'jedan', 'dva', 'tri', 'četiri',
        'pet', 'šest', 'sedam', 'osam', 'devet'
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
    var $_currency_names = array(
      'ALL' => array(array('leka'), array('qindarka')),
      'AUD' => array(array('australijskih dolara'), array('centa')),
      'BAM' => array(array('konvertibilnih maraka'), array('fenig')),
      'BGN' => array(array('leva'), array('stotinki')),
      'BRL' => array(array('reala'), array('stotinki')),
      'BYR' => array(array('beloruskih rubalja'), array('kopiejka')),
      'CAD' => array(array('kanadskih dolara'), array('centa')),
      'CHF' => array(array('švajcarskih franaka'), array('rapp')),
      'CYP' => array(array('kiparskih funti'), array('centa')),
      'CZK' => array(array('čeških kruna'), array('halerz')),
      'DKK' => array(array('danskih kruna'), array('ore')),
      'EEK' => array(array('kruna'), array('centa')),
      'EUR' => array(array('evra'), array('evro-centa')),
      'GBP' => array(array('funta', 'funti'), array('pence', 'pence')),
      'HKD' => array(array('hongkongških dolara'), array('centa')),
      'HRK' => array(array('hrvatskih kuna'), array('lipa')),
      'HUF' => array(array('forint'), array('filler')),
      'ILS' => array(array('new sheqel','new sheqels'), array('agora','agorot')),
      'ISK' => array(array('islandskih kruna'), array('aurar')),
      'JPY' => array(array('jena'), array('sen')),
      'LTL' => array(array('litas'), array('centa')),
      'LVL' => array(array('lat'), array('sentim')),
      'MKD' => array(array('makedonskih dinara'), array('deni')),
      'MTL' => array(array('malteških lira'), array('centym')),
      'NOK' => array(array('norveških kruna'), array('oere')),
      'PLN' => array(array('zlota', 'zlotys'), array('grosz')),
      'ROL' => array(array('leja'), array('bani')),
      'RSD' => array(array('srpskih dinara'), array('para')),
      'RUB' => array(array('rubalja'), array('kopiejka')),
      'SEK' => array(array('švedskih kruna'), array('oere')),
      'SIT' => array(array('tolara'), array('stotinki')),
      'SKK' => array(array('slovačkih kruna'), array()),
      'TRL' => array(array('lira'), array('kuru�')),
      'UAH' => array(array('hryvna'), array('centa')),
      'USD' => array(array('dolara'), array('centa')),
      'YUM' => array(array('dinara'), array('para')),
      'ZAR' => array(array('randa'), array('centa'))
    );

    /**
     * The default currency name
     * @var string
     * @access public
     */
    var $def_currency = 'RSD'; // Serbian Dinar

    // }}}
    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in American English language
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
    function _toWords($num, $power = 0, $powsuffix = 'dinara')
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
            if (in_array($this->_digits[$h], [2,3,4])) {
                $hundredsString = 'stotine';
            } else {
                $hundredsString = 'stotina';
            }
            $ret .= $this->_sep . $this->_digits[$h] . $this->_sep . $hundredsString;

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
        case 8:
        case 7:
        case 3:
        case 2:
            $ret .= $this->_sep . $this->_digits[$t] . 'deset';
            break;

        case 6:
            $ret .= $this->_sep . 'šezdeset';
            break;

        case 5:
            $ret .= $this->_sep . 'pedeset';
            break;

        case 4:
            $ret .= $this->_sep . 'četrdeset';
            break;

        case 1:
            switch ($d) {
            case 0:
                $ret .= $this->_sep . 'deset';
                break;

            case 1:
                $ret .= $this->_sep . 'jedanaest';
                break;

                case 4:
                $ret .= $this->_sep . 'četrnaest';
                break;

            case 2:
            case 3:
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
                $ret .= $this->_sep . $this->_digits[$d] . 'naest';
                break;
            }
            break;
        }

        if ($t != 1 && $d > 0) { // add digits only in <0>,<1,9> and <21,inf>
            // add minus sign between [2-9] and digit
            if ($t > 1) {
                $ret .= $this->_sep . 'i' . $this->_sep . $this->_digits[$d];
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

            switch ($d) {
                case 1:
                    $suf = $lev[0];
                    break;
                case 2:
                case 3:
                case 4:
                    $suf = $lev[1];
                    break;
                case 0:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                    $suf = $lev[2];
                    break;
            }

            $ret .= $this->_sep . $suf;
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
     * (with monetary units) in Serbian language
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
     * @author Piotr Klaban <makler@man.torun.pl>
     * @since  Numbers_Words 0.4
     */
    function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
    {
        $int_curr = strtoupper($int_curr);
        if (!isset($this->_currency_names[$int_curr])) {
            $int_curr = $this->def_currency;
        }

        $curr_names = $this->_currency_names[$int_curr];

        $ret  = trim($this->_toWords($decimal));
        $lev  = $this->_get_numlevel($decimal);
        $ret .= $this->_sep . $curr_names[0][$lev];

        if ($fraction !== false) {
            if ($convert_fraction) {
                $ret .= $this->_sep . trim($this->_toWords($fraction));
            } else {
                $ret .= $this->_sep . $fraction;
            }
            $lev  = $this->_get_numlevel($fraction);
            $ret .= $this->_sep . $curr_names[1][$lev];
        }

        return $ret;
    }
    // }}}

    // {{{ _get_numlevel()

    /**
     * Returns grammatical "level" of the number - this is necessary
     * for choosing the right suffix for exponents and currency names.
     *
     * @param integer $num An integer between -infinity and infinity inclusive
     *                     that need to be converted to words
     *
     * @return integer  The grammatical "level" of the number.
     *
     * @access private
     * @author Piotr Klaban <makler@man.torun.pl>
     * @since  Numbers_Words 0.4
     */
    function _get_numlevel($num)
    {
        if (strlen($num) > 3) {
            $num = substr($num, -3);
        }
        $num = (int) $num;

        $h = $t = $d = $lev = 0;

        switch (strlen($num)) {
            case 3:
                $h = (int)substr($num, -3, 1);

            case 2:
                $t = (int)substr($num, -2, 1);

            case 1:
                $d = (int)substr($num, -1, 1);
                break;

            case 0:
                return $lev;
                break;
        }

        if ($t == 1) {
            $d = 0;
        }

        if (( $h + $t ) > 0 && $d == 1) {
            $d = 0;
        }

        switch ($d) {
            case 1:
                $lev = 0;
                break;
            case 2:
            case 3:
            case 4:
                $lev = 1;
                break;
            default:
                $lev = 2;
        }
        return $lev;
    }
    // }}}

}
