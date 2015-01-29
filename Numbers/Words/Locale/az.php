<?php
/**
 * Numbers_Words
 *
 * PHP version 4 and 5
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
 * @author   Shahriyar Imanov <shehi@imanov.me>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */

/**
 * Class for translating numbers into Azerbaijani.
 *
 * @author Piotr Klaban
 * @package Numbers_Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";

/**
 * Class for translating numbers into Azerbaijani.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Shahriyar Imanov <shehi@imanov.me>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_Locale_az extends Numbers_Words
{
    /**
     * Locale name
     * @var string
     * @access public
     */
    var $locale = 'az';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    var $lang = 'Azerbaijani';

    /**
     * Native language name
     * @var string
     * @access public
     */
    var $lang_native = 'Azərbaycan dili';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    var $_minus = 'mənfi'; // minus sign

    /**
     * The sufixes for exponents (singular and plural)
     * Names partly based on:
     * http://www.users.dircon.co.uk/~shaunf/shaun/numbers/millions.htm
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => array(''),
        3 => array('min'),
        6 => array('milyon'),
        9 => array('milyard'),
        12 => array('trilyon'),
        15 => array('kvadrilyon'),
        18 => array('kvintilyon'),
        21 => array('sekstilyon'),
        24 => array('septilyon'),
        27 => array('oktilyon'),
        30 => array('nonilyon'),
        33 => array('desilyon'),
        36 => array('undesilyon'),
        39 => array('dodesilyon'),
        42 => array('tredesilyon'),
        45 => array('kvattuordesilyon'),
        48 => array('kvindesilyon'),
        51 => array('sedesilyon'),
        54 => array('septdesilyon'),
        57 => array('oktodesilyon'),
        60 => array('novemdesilyon'),
        63 => array('vigintilyon'),
        66 => array('unvigintilyon'),
        69 => array('duovigintilyon'),
        72 => array('trevigintilyon'),
        75 => array('kvattuorvigintilyon')
    );

    /**
     * The array containing the digits (indexed by the digits themselves).
     * @var array
     * @access private
     */
    var $_digits = array(
        0 => 'sıfır', 'bir', 'iki', 'üç', 'dörd',
        'beş', 'altı', 'yeddi', 'səkkiz', 'doqquz'
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
     * @link http://en.wikipedia.org/wiki/ISO_4217
     * @access private
     */
    var $_currency_names = array(
        'AFN' => array(array('Əfqanıstan əfqanisi'), array('pul')),
        'ALL' => array(array('Albaniya ləki'), array('gindarka')),
        'AMD' => array(array('Ermənistan dramı'), array('luma')),
        'AOA' => array(array('Anqola yeni kuanzası'), array('lvey')),
        'ARS' => array(array('Argentina pesosu'), array('sentavo')),
        'AUD' => array(array('Avstraliya dolları'), array('sent')),
        'AWG' => array(array('Aruba florini'), array('sent')),
        'AZN' => array(array('Azərbaycan manatı'), array('qəpik')),
        'BAM' => array(array('Bosniya-Herseqovina markası'), array('feniq')),
        'BBD' => array(array('Barbados dolları'), array('sent')),
        'BDT' => array(array('Banqladeş təkəsi'), array('paysa')),
        'BGN' => array(array('Bolqarıstan levi'), array('stotinka')),
        'BHD' => array(array('Bəhreyn dinarı'), array('fils')),
        'BIF' => array(array('Burundi frankı'), array('sentim')),
        'BMD' => array(array('Bermuda dolları'), array('sent')),
        'BND' => array(array('Bruney singiti'), array('sen')),
        'BOB' => array(array('Boliviya bolivianosu'), array('sentavo')),
        'BRL' => array(array('Braziliya realı'), array('sentavos')),
        'BSD' => array(array('Baham dolları'), array('sent')),
        'BTN' => array(array('Butan nqultrumu'), array('çetrum')),
        'BWP' => array(array('Botsvana pulası'), array('feb')),
        'BYR' => array(array('Belarusiya rublu'), array('qəpik')),
        'BZD' => array(array('Beliz dolları'), array('sent')),
        'CAD' => array(array('Kanada dolları'), array('sent')),
        'CDF' => array(array('Konqo frankı'), array('sentim')),
        'CHF' => array(array('İsveçrə frankı'), array('rapp')),
        'CLP' => array(array('Çili pesosu'), array('sentavo')),
        'CNY' => array(array('Çin yuanı'), array('fen')),
        'COP' => array(array('Kolumbiya pesosu'), array('sentavo')),
        'CRC' => array(array('Kosta-Rika kolonu'), array('sentimos')),
        'CUP' => array(array('Kuba pesosu'), array('sentavo')),
        'CVE' => array(array('Keyp-Verde eskudosu'), array('sentavo')),
        'CYP' => array(array('Kipr funtu'), array('sent')),
        'CZK' => array(array('Çex korunası'), array('haler')),
        'DJF' => array(array('Cibuti frankı'), array('sentim')),
        'DKK' => array(array('Danimarka kronu'), array('ore')),
        'DOP' => array(array('Dominikan pesosu'), array('sentavo')),
        'DZD' => array(array('Əlcəzair dinarı'), array('sentim')),
        'EEK' => array(array('Estoniya kronu'), array('senti')),
        'EGP' => array(array('Misir məsrisi'), array('ərş')),
        'ERN' => array(array('Eritrea nəkfası'), array('sent')),
        'ETB' => array(array('Efiopiya birri'), array('santim')),
        'EUR' => array(array('avro'), array('avro-sent')),
        'FJD' => array(array('Fici dolları'), array('sent')),
        'FKP' => array(array('Folklend adaları funtu'), array('penni')),
        'GBP' => array(array('funt sterlinq'), array('penni')),
        'GEL' => array(array('Gürcüstan larisi'), array('tetri')),
        'GSH' => array(array('Qana sedisi'), array('peseva')),
        'GIP' => array(array('Gibraltar funtu'), array('penni')),
        'GMD' => array(array('Qambiya dalasisi'), array('butut')),
        'GNF' => array(array('Qvineya frankı'), array('sentim')),
        'GTQ' => array(array('Qvatemala kvetzalı'), array('sent')),
        'HKD' => array(array('Honq Konq dolları'), array('sent')),
        'HNL' => array(array('Honduras lempirası'), array('sentavo')),
        'HRK' => array(array('Xorvat kunası'), array('lipa')),
        'HUF' => array(array('Macar forinti'), array('filler')),
        'IDR' => array(array('İndoneziya rupiası'), array('sen')),
        'ILS' => array(array('İsrail yeni şeqeli'), array('aqorot')),
        'INR' => array(array('Hindistan rupisi'), array('paysa')),
        'IQD' => array(array('İraq dinarı'), array('fils')),
        'IRR' => array(array('İran rialı'), array('')),
        'ISK' => array(array('İslandiya kronu'), array('aurar')),
        'JOD' => array(array('İordaniya dinarı'), array('qirş')),
        'JPY' => array(array('Yapon yeni'), array('sen')),
        'KGS' => array(array('Qırğızıstan somu'), array('tyiyn')),
        'KPW' => array(array('Şimali Koreya vonu'), array('çon')),
        'KRW' => array(array('Cənubi Koreya vonu'), array('jeon')),
        'KWD' => array(array('Küveyt dinarı'), array('fils')),
        'KYD' => array(array('Keymən adaları dolları'), array('sent')),
        'KZT' => array(array('Qazaxıstan təngəsi'), array('tiın')),
        'LBP' => array(array('Livan funtu'), array('piastr')),
        'LTL' => array(array('Litva liti'), array('sent')),
        'LVL' => array(array('Latviya latı'), array('sentim')),
        'MDL' => array(array('Moldova leyi'), array('ban')),
        'MKD' => array(array('Makedoniya dinarı'), array('deni')),
        'MTL' => array(array('Malta lirəsi'), array('sentim')),
        'NOK' => array(array('Norveç kronu'), array('ore')),
        'PLN' => array(array('Polşa zlotu'), array('qroş')),
        'ROL' => array(array('Rumıniya leyi'), array('bani')),
        'RUB' => array(array('Rus rublu'), array('qəpik')),
        'SEK' => array(array('İsveç kronu'), array('oere')),
        'SIT' => array(array('Sloveniya Toları'), array('stotinia')),
        'SKK' => array(array('Slovak kronu'), array()),
        'TRL' => array(array('Türk lirəsi'), array('quruş')),
        'UAH' => array(array('Ukrayna hrivnası'), array('sent')),
        'USD' => array(array('Amerikan dolları'), array('sent')),
        'ZAR' => array(array('Cənubi Afrika randı'), array('sent'))
    );

    /**
     * The default currency name
     * @var string
     * @access public
     */
    var $def_currency = 'AZN'; // Azerbaijani manat

    // }}}
    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in British English language
     *
     * @param integer $num An integer between -infinity and infinity inclusive :)
     *                           that need to be converted to words
     * @param integer $power The power of ten for the rest of the number to the right.
     *                           Optional, defaults to 0.
     * @param string $powsuffix The power name to be added to the end of the return string.
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
        if (substr($num, 0, 1) == ' ') {
            $ret = $this->_sep . $this->_minus;
            $num = substr($num, 1);
        }

        // strip excessive zero signs and spaces
        $num = trim($num);
        $num = preg_replace('/^0+/', '', $num);

        if (strlen($num) > 3) {
            $maxp = strlen($num) - 1;
            $curp = $maxp;
            for ($p = $maxp; $p > 0; --$p) { // power

                // check for highest power
                if (isset($this->_exponent[$p])) {
                    // send substr from $curp to $p
                    $snum = substr($num, $maxp - $curp, $curp - $p + 1);
                    $snum = preg_replace('/^0+/', '', $snum);
                    if ($snum !== '') {
                        $cursuffix = $this->_exponent[$power][count($this->_exponent[$power]) - 1];
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

        switch (strlen($num)) {
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

        // hundreds
        if ($h) {
            $ret .= $h == 1 ? $this->_sep . 'yüz' : $this->_sep . $this->_digits[$h] . $this->_sep . 'yüz';
        }

        // tens
        switch ($t) {
            case 9:
                $ret .= $this->_sep . 'doxsan';
                break;
            case 7:
                $ret .= $this->_sep . 'yetmiş';
                break;
            case 6:
                $ret .= $this->_sep . 'altmış';
                break;
            case 8:
                $ret .= $this->_sep . 'səksən';
                break;
            case 5:
                $ret .= $this->_sep . 'əlli';
                break;
            case 4:
                $ret .= $this->_sep . 'qırx';
                break;
            case 3:
                $ret .= $this->_sep . 'otuz';
                break;
            case 2:
                $ret .= $this->_sep . 'iyirmi';
                break;
            case 1:
                $ret .= $this->_sep . 'on';
                break;
        }

        if ($d > 0) {
            $ret .= ($d == 1 and $power == 3) ? $this->_sep : $this->_sep . $this->_digits[$d]; // "bir min" deyil, "min" olacaq
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

    /**
     * Converts a currency value to its word representation
     * (with monetary units) in English language
     *
     * @param integer       $int_curr   An international currency symbol as defined by the ISO 4217 standard (three characters)
     * @param integer       $decimal A money total amount without fraction part (e.g. amount of dollars)
     * @param integer|bool  $fraction   Fractional part of the money amount (e.g. amount of cents)
     *                                  Optional. Defaults to false.
     * @param integer|bool  $convert_fraction   Convert fraction to words (left as numeric if set to false).
     *                                          Optional. Defaults to true.
     * @return string  The corresponding word representation for the currency
     *
     * @access public
     * @author Piotr Klaban <makler@man.torun.pl>
     * @since  Numbers_Words 0.13.1
     */
    function toCurrencyWords($int_curr, $decimal, $fraction = false, $convert_fraction = true)
    {
        $int_curr = strtoupper($int_curr);
        if (!isset($this->_currency_names[$int_curr])) {
            $int_curr = $this->def_currency;
        }
        $curr_names = $this->_currency_names[$int_curr];

        $ret = trim($this->_toWords($decimal));
        $lev = ($decimal == 1) ? 0 : 1;
        if ($lev > 0) {
            if (count($curr_names[0]) > 1) {
                $ret .= $this->_sep . $curr_names[0][$lev];
            } else {
                $ret .= $this->_sep . $curr_names[0][0] . 's';
            }
        } else {
            $ret .= $this->_sep . $curr_names[0][0];
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
                    $ret .= $this->_sep . $curr_names[1][0] . 's';
                }
            } else {
                $ret .= $this->_sep . $curr_names[1][0];
            }
        }
        return $ret;
    }
}
