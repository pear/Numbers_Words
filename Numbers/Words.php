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
 * Authors: Piotr Klaban <makler@man.torun.pl>
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @version  SVN: $Id$
 * @link     http://pear.php.net/package/Numbers_Words
 */

// {{{ Numbers_Words
require_once 'Numbers/Words/Exception.php';

/**
 * The Numbers_Words class provides method to convert arabic numerals to words.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 * @since    PHP 4.2.3
 * @access   public
 */
class Numbers_Words
{
    // {{{ constants

    /**
     * Masculine gender, for languages that need it
     */
    const GENDER_MASCULINE = 0;

    /**
      * Feminine gender, for languages that need it
      */
    const GENDER_FEMININE = 1;

    /**
      * Neuter gender, for languages that need it
      */
    const GENDER_NEUTER = 2;

    /**
      * This is not an actual gender; some languages
      * have different ways of numbering actual things
      * (e.g. Romanian: "un nor, doi nori" for "one cloud, two clouds")
      * and for just counting in an abstract manner
      * (e.g. Romanian: "unu, doi" for "one, two"
      */
    const GENDER_ABSTRACT = 3;

    // }}}

    // {{{ properties

    /**
     * Default Locale name
     * @var string
     * @access public
     */
    public $locale = 'en_US';

    /**
     * Default decimal mark
     * @var string
     * @access public
     */
    public $decimalPoint = '.';

    // }}}
    // {{{ toWords()

    /**
     * Converts a number to its word representation
     *
     * @param integer $num     An integer between -infinity and infinity inclusive :)
     *                         that should be converted to a words representation
     * @param string  $locale  Language name abbreviation. Optional. Defaults to
     *                         current loaded driver or en_US if any.
     * @param array   $options Specific driver options
     *
     * @access public
     * @author Piotr Klaban <makler@man.torun.pl>
     * @since  PHP 4.2.3
     * @return string  The corresponding word representation
     */
    function toWords($num, $locale = '', $options = array())
    {
        if (empty($locale) && isset($this) && $this instanceof Numbers_Words) {
            $locale = $this->locale;
        }

        if (empty($locale)) {
            $locale = 'en_US';
        }

        $classname = self::loadLocale($locale, '_toWords');


        $obj = new $classname;


        if (!is_int($num)) {
            $num = $obj->normalizeNumber($num);

            // cast (sanitize) to int without losing precision
            $num = preg_replace('/(.*?)('.preg_quote($obj->decimalPoint).'.*?)?$/', '$1', $num);
        }

        if (empty($options)) {
            return trim($obj->_toWords($num));
        }
        return trim($obj->_toWords($num, $options));
    }
    // }}}

    // {{{ toCurrency()
    /**
     * Converts a currency value to word representation (1.02 => one dollar two cents)
     * If the number has not any fraction part, the "cents" number is omitted.
     *
     * @param float  $num      A float/integer/string number representing currency value
     *
     * @param string $locale   Language name abbreviation. Optional. Defaults to en_US.
     *
     * @param string $intCurr  International currency symbol
     *                         as defined by the ISO 4217 standard (three characters).
     *                         E.g. 'EUR', 'USD', 'PLN'. Optional.
     *                         Defaults to $def_currency defined in the language class.
     *
     * @param string $decimalPoint  Decimal mark symbol
     *                         E.g. '.', ','. Optional.
     *                         Defaults to $decimalPoint defined in the language class.
     *
     * @return string  The corresponding word representation
     *
     * @access public
     * @author Piotr Klaban <makler@man.torun.pl>
     * @since  PHP 4.2.3
     * @return string
     */
    function toCurrency($num, $locale = 'en_US', $intCurr = '', $decimalPoint = null)
    {
        $ret = $num;

        $classname = self::loadLocale($locale, 'toCurrencyWords');

        $obj = new $classname;

        if (is_null($decimalPoint)) {
            $decimalPoint = $obj->decimalPoint;
        }

        // round if a float is passed, use Math_BigInteger otherwise
        if (is_float($num)) {
            $num = round($num, 2);
        }

        $num = $obj->normalizeNumber($num, $decimalPoint);

        if (strpos($num, $decimalPoint) === false) {
            return trim($obj->toCurrencyWords($intCurr, $num));
        }

        $currency = explode($decimalPoint, $num, 2);

        $len = strlen($currency[1]);

        if ($len == 1) {
            // add leading zero
            $currency[1] .= '0';
        } elseif ($len > 2) {
            // get the 3rd digit after the comma
            $round_digit = substr($currency[1], 2, 1);
            
            // cut everything after the 2nd digit
            $currency[1] = substr($currency[1], 0, 2);
            
            if ($round_digit >= 5) {
                // round up without losing precision
                include_once "Math/BigInteger.php";

                $int = new Math_BigInteger(join($currency));
                $int = $int->add(new Math_BigInteger(1));
                $int_str = $int->toString();

                $currency[0] = substr($int_str, 0, -2);
                $currency[1] = substr($int_str, -2);

                // check if the rounded decimal part became zero
                if ($currency[1] == '00') {
                    $currency[1] = false;
                }
            }
        }

        return trim($obj->toCurrencyWords($intCurr, $currency[0], $currency[1]));
    }
    // }}}

    // {{{ getLocales()
    /**
     * Lists available locales for Numbers_Words
     *
     * @param mixed $locale string/array of strings $locale
     *                 Optional searched language name abbreviation.
     *                 Default: all available locales.
     *
     * @return array   The available locales (optionaly only the requested ones)
     * @author Piotr Klaban <makler@man.torun.pl>
     * @author Bertrand Gugger, bertrand at toggg dot com
     *
     * @access public
     * @static
     * @return mixed[]
     */
    function getLocales($locale = null)
    {
        $ret = array();
        if (isset($locale) && is_string($locale)) {
            $locale = array($locale);
        }

        $dname = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Words' . DIRECTORY_SEPARATOR;

        $dh = opendir($dname);

        if ($dh) {
            while ($fname = readdir($dh)) {
                if (preg_match('#^lang\.([a-z_]+)\.php$#i', $fname, $matches)) {
                    if (is_file($dname . $fname) && is_readable($dname . $fname) &&
                        (!isset($locale) || in_array($matches[1], $locale))) {
                        $ret[] = $matches[1];
                    }
                }
            }
            closedir($dh);
            sort($ret);
        }

        return $ret;
    }
    // }}}

    /**
     * Load the given locale and return class name
     *
     * @param string $locale         Locale key, e.g. "de" or "en_US"
     * @param string $requiredMethod Method that this class needs to have
     *
     * @return string Locale class name
     *
     * @throws Numbers_Words_Exception When the class cannot be loaded
     */
    function loadLocale($locale, $requiredMethod)
    {
        $classname = "Numbers_Words_${locale}";
        if (!class_exists($classname)) {
            @include_once "Numbers/Words/${locale}.php";
        }

        if (!class_exists($classname)) {
            throw new Numbers_Words_Exception(
                "Unable to include the Numbers/Words/${locale}.php file"
            );
        }

        $methods = get_class_methods($classname);

        if (!in_array($requiredMethod, $methods)
            && !in_array($requiredMethod, $methods)
        ) {
            throw new Numbers_Words_Exception(
                "Unable to find method '$requiredMethod' in class '$classname'"
            );
        }

        return $classname;
    }

    /**
     * Removes redundant spaces, thousands separators, etc.
     *
     * @param string $num            Some number
     * @param string $decimalPoint   The decimal mark, e.g. "." or ","
     *
     * @return string Number
     */
    function normalizeNumber($num, $decimalPoint = null)
    {
        if (is_null($decimalPoint)) {
            $decimalPoint = $this->decimalPoint;
        }

        return preg_replace('/[^-'.preg_quote($decimalPoint).'0-9]/', '', $num);
    }
}

// }}}
