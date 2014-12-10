<?php

/**
 * Class for translating numbers into Ukrainian.
 *
 * @package Numbers_Words
 */

/**
 * Include needed files
 */
require_once "Numbers/Words.php";
require_once "Numbers/Words/Locale/ru.php";

/**
 * Class for translating numbers into Russian.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @author   Andrey Demenev <demenev@gmail.com>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 */
class Numbers_Words_Locale_ua extends Numbers_Words_Locale_ru
{
    /**
     * Locale name
     * @public string
     * @access public
     */
    public $locale = 'ua';

    /**
     * Language name in English
     * @var string
     * @access public
     */
    public $lang = 'Ukrainian';

    /**
     * Native language name
     * @var string
     * @access public
     */
    public $lang_native = 'Українська';

    /**
     * The word for the minus sign
     * @var string
     * @access private
     */
    public $_minus = 'мінус'; // minus sign

    /**
     * The suffixes for exponents (singular)
     * Names partly based on:
     * http://home.earthlink.net/~mrob/pub/math/largenum.html
     * http://mathforum.org/dr.math/faq/faq.large.numbers.html
     * http://www.mazes.com/AmericanNumberingSystem.html
     * @var array
     * @access private
     */
    public $_exponent = array(
        0 => '',
        6 => 'мільйон',
        9 => 'мільярд',
        12 => 'трильйон',
        15 => 'квадрильйон',
        18 => 'квінтильйон',
        21 => 'секстильйонів',
        24 => 'септілліон',
        27 => 'октілліон',
        30 => 'нонілліон',
        33 => 'децілліон',
        36 => 'ундецілліон',
        39 => 'дуодецілліон',
        42 => 'тредецілліон',
        45 => 'кватуордецілліон',
        48 => 'квіндецілліон',
        51 => 'сексдецілліон',
        54 => 'септендецілліон',
        57 => 'октодецілліон',
        60 => 'новемдецілліон',
        63 => 'вігінтілліон',
        66 => 'унвігінтілліон',
        69 => 'дуовігінтілліон',
        72 => 'тревігінтілліон',
        75 => 'кватуорвігінтілліон',
        78 => 'квінвігінтілліон',
        81 => 'сексвігінтілліон',
        84 => 'септенвігінтілліон',
        87 => 'октовігінтілліон',
        90 => 'новемвігінтілліон',
        93 => 'трігінтілліон',
        96 => 'унтрігінтілліон',
        99 => 'дуотрігінтілліон',
        102 => 'третрігінтілліон',
        105 => 'кватортрігінтілліон',
        108 => 'квінтрігінтілліон',
        111 => 'секстрігінтілліон',
        114 => 'септентрігінтілліон',
        117 => 'октотрігінтілліон',
        120 => 'новемтрігінтілліон',
        123 => 'квадрагінтілліон',
        126 => 'унквадрагінтілліон',
        129 => 'дуоквадрагінтілліон',
        132 => 'треквадрагінтілліон',
        135 => 'кваторквадрагінтілліон',
        138 => 'квінквадрагінтілліон',
        141 => 'сексквадрагінтілліон',
        144 => 'септенквадрагінтілліон',
        147 => 'октоквадрагінтілліон',
        150 => 'новемквадрагінтілліон',
        153 => 'квінквагінтілліон',
        156 => 'унквінкагінтілліон',
        159 => 'дуоквінкагінтілліон',
        162 => 'треквінкагінтілліон',
        165 => 'кваторквінкагінтілліон',
        168 => 'квінквінкагінтілліон',
        171 => 'сексквінкагінтілліон',
        174 => 'септенквінкагінтілліон',
        177 => 'октоквінкагінтілліон',
        180 => 'новемквінкагінтілліон',
        183 => 'сексагінтілліон',
        186 => 'унсексагінтілліон',
        189 => 'дуосексагінтілліон',
        192 => 'тресексагінтілліон',
        195 => 'кваторсексагінтілліон',
        198 => 'квінсексагінтілліон',
        201 => 'секссексагінтілліон',
        204 => 'септенсексагінтілліон',
        207 => 'октосексагінтілліон',
        210 => 'новемсексагінтілліон',
        213 => 'септагінтілліон',
        216 => 'унсептагінтілліон',
        219 => 'дуосептагінтілліон',
        222 => 'тресептагінтілліон',
        225 => 'кваторсептагінтілліон',
        228 => 'квінсептагінтілліон',
        231 => 'секссептагінтілліон',
        234 => 'септенсептагінтілліон',
        237 => 'октосептагінтілліон',
        240 => 'новемсептагінтілліон',
        243 => 'октогінтілліон',
        246 => 'уноктогінтілліон',
        249 => 'дуооктогінтілліон',
        252 => 'треоктогінтілліон',
        255 => 'кватороктогінтілліон',
        258 => 'квіноктогінтілліон',
        261 => 'сексоктогінтілліон',
        264 => 'септоктогінтілліон',
        267 => 'октооктогінтілліон',
        270 => 'новемоктогінтілліон',
        273 => 'нонагінтілліон',
        276 => 'уннонагінтілліон',
        279 => 'дуононагінтілліон',
        282 => 'тренонагінтілліон',
        285 => 'кваторнонагінтілліон',
        288 => 'квіннонагінтілліон',
        291 => 'секснонагінтілліон',
        294 => 'септеннонагінтілліон',
        297 => 'октононагінтілліон',
        300 => 'новемнонагінтілліон',
        303 => 'центілліон',
    );

    /**
     * The array containing the teens' :) names
     * @var array
     * @access private
     */
    public $_teens = array(
        11 => 'одинадцять',
        12 => 'дванадцять',
        13 => 'тринадцять',
        14 => 'чотирнадцять',
        15 => 'п’ятнадцять',
        16 => 'шістнадцять',
        17 => 'сімнадцять',
        18 => 'вісімнадцять',
        19 => 'дев’ятнадцять',
    );

    /**
     * The array containing the tens' names
     * @var array
     * @access private
     */
    public $_tens = array(
        2 => 'двадцять',
        3 => 'тридцять',
        4 => 'сорок',
        5 => 'п’ятдесят',
        6 => 'шістдесят',
        7 => 'сімдесят',
        8 => 'вісімдесят',
        9 => 'дев’яносто',
    );

    /**
     * The array containing the hundreds' names
     * @var array
     * @access private
     */
    public $_hundreds = array(
        1 => 'сто',
        2 => 'двісті',
        3 => 'триста',
        4 => 'чотириста',
        5 => 'п’ятсот',
        6 => 'шістсот',
        7 => 'сімсот',
        8 => 'вісімсот',
        9 => 'дев’ятсот'
    );

    /**
     * The array containing the digits
     * for neutral, male and female
     * @var array
     * @access private
     */
    public $_digits = array(
        array('нуль', 'один', 'два', 'три', 'чотири', 'п’ять', 'шість', 'сім', 'вісім', 'дев’ять'),
        array('нуль', 'один', 'два', 'три', 'чотири', 'п’ять', 'шість', 'сім', 'вісім', 'дев’ять'),
        array('нуль', 'одна', 'дві', 'три', 'чотири', 'п’ять', 'шість', 'сім', 'вісім', 'дев’ять'),
    );

    /**
     * The word separator
     * @var string
     * @access private
     */
    public $_sep = ' ';

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
    public $_currency_names = array(
        'ALL' => array(
            array(1, 'лек', 'леки', 'леків'),
            array(2, 'кіндарка', 'кіндарки', 'кіндарок'),
        ),
        'AUD' => array(
            array(1, 'австралійский долар', 'австралійскіх долари', 'австралійських доларів'),
            array(1, 'цент', 'центи', 'центів'),
        ),
        'BGN' => array(
            array(1, 'лев', 'лева', 'левів'),
            array(2, 'стотинка', 'стотинки', 'стотинок'),
        ),
        'BRL' => array(
            array(1, 'бразильський реал', 'бразильські реали', 'бразильських реалів'),
            array(1, 'сентаво', 'сентаво', 'сентаво'),
        ),
        'BYR' => array(
            array(1, 'білоруський рубль', 'білоруських рублі', 'білоруських рублів'),
            array(2, 'копійка', 'копійки', 'копійок'),
        ),
        'CAD' => array(
            array(1, 'канадський долар', 'канадські долари', 'канадських долари'),
            array(1, 'цент', 'центи', 'центів'),
        ),
        'CHF' => array(
            array(1, 'швейцарський франк', 'швейцарські франки', 'швейцарських франків'),
            array(1, 'сантим', 'сантими', 'сантимів'),
        ),
        'CYP' => array(
            array(1, 'кіпрський фунт', 'кіпрські фунти', 'кіпрських фунтів'),
            array(1, 'цент', 'центи', 'центів'),
        ),
        'CZK' => array(
            array(2, 'чеська крона', 'чеські крони', 'чеських крон'),
            array(1, 'галеж', 'галежи', 'галежів'),
        ),
        'DKK' => array(
            array(2, 'датська крона', 'датські крони', 'датських крон'),
            array(1, 'ере', 'ере', 'ере'),
        ),
        'EEK' => array(
            array(2, 'естонська крона', 'естонські крони', 'естонських крон'),
            array(1, 'сенти', 'сенти', 'сенти'),
        ),
        'EUR' => array(
            array(1, 'євро', 'євро', 'євро'),
            array(1, 'євроцент', 'євроценти', 'євроцентів'),
        ),
        'GBP' => array(
            array(1, 'фунт стерлінгів', 'фунти стерлінгів', 'фунтів стерлінгів'),
            array(1, 'пенс', 'пенси', 'пенсів'),
        ),
        'HKD' => array(
            array(1, 'гонконзький долар', 'гонконзькі долари', 'гонконзьких доларів'),
            array(1, 'цент', 'центи', 'центів'),
        ),
        'HRK' => array(
            array(2, 'хорватська куна', 'хорватські куни', 'хорватських кун'),
            array(2, 'ліпа', 'ліпи', 'ліп'),
        ),
        'HUF' => array(
            array(1, 'угорський форинт', 'угорські форинти', 'угорських форинтів'),
            array(1, 'філлер', 'філлери', 'філлерів'),
        ),
        'ISK' => array(
            array(2, 'ісландська крона', 'ісландські крони', 'ісландських крон'),
            array(1, 'эре', 'эре', 'эре'),
        ),
        'JPY' => array(
            array(2, 'єна', 'єни', 'єн'),
            array(2, 'сен', 'сени', 'сенів'),
        ),
        'LTL' => array(
            array(1, 'лит', 'лити', 'литів'),
            array(1, 'цент', 'центи', 'центів'),
        ),
        'LVL' => array(
            array(1, 'лат', 'лати', 'латів'),
            array(1, 'сентим', 'сентими', 'сентимів'),
        ),
        'MKD' => array(
            array(1, 'македонський динар', 'македонські динари', 'македонських динарів'),
            array(1, 'дени', 'дени', 'дени'),
        ),
        'MTL' => array(
            array(2, 'мальтійска ліра', 'мальтійські ліри', 'мальтійських лір'),
            array(1, 'сентим', 'сентими', 'сентимів'),
        ),
        'NOK' => array(
            array(2, 'норвезька крона', 'норвезькі крони', 'норвезьких крон'),
            array(0, 'ере', 'ере', 'ере'),
        ),
        'PLN' => array(
            array(1, 'злотий', 'злотих', 'злотих'),
            array(1, 'грош', 'гроша', 'грошей'),
        ),
        'ROL' => array(
            array(1, 'румунський лей', 'румунські леї', 'румунських леїв'),
            array(1, 'бани', 'бани', 'бани'),
        ),
        // both RUR and RUR are used, Some users use RUB for shorter form
        'RUB' => array(
            array(1, 'рубль', 'рублі', 'рублів'),
            array(2, 'копейка', 'копійки', 'копійок'),
        ),
        'RUR' => array(
            array(1, 'російський рубль', 'російські рублі', 'російських рублів'),
            array(2, 'копійка', 'копійки', 'копійок'),
        ),
        'SEK' => array(
            array(2, 'шведська крона', 'шведські крони', 'шведських крон'),
            array(1, 'ере', 'ере', 'ере'),
        ),
        'SIT' => array(
            array(1, 'словенський толар', 'словенські толари', 'словенських толарів'),
            array(2, 'стотина', 'стотини', 'стотин'),
        ),
        'SKK' => array(
            array(2, 'словацька крона', 'словацькі крони', 'словацьких крон'),
            array(0, '', '', ''),
        ),
        'TRL' => array(
            array(2, 'турецька ліра', 'турецькі ліри', 'турецьких лір'),
            array(1, 'куруш', 'куруши', 'курушів'),
        ),
        'UAH' => array(
            array(2, 'гривня', 'гривні', 'гривень'),
            array(1, 'копійка', 'копійки', 'копійок'),
        ),
        'USD' => array(
            array(1, 'долар США', 'долари США', 'долларів США'),
            array(1, 'цент', 'центи', 'центів'),
        ),
        'YUM' => array(
            array(1, 'югославський динар', 'югославських динари', 'югославських динарів'),
            array(1, 'пара', 'пара', 'пара'),
        ),
        'ZAR' => array(
            array(1, 'ранд', 'ранди', 'рандів'),
            array(1, 'цент', 'центи', 'центів'),
        )
    );

    /**
     * The default currency name
     * @var string
     * @access public
     */
    public $def_currency = 'UAH';  // Ukrainian money


    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in Russian language and determines the case of string.
     *
     * @param integer $num    An integer between -infinity and infinity inclusive :)
     *                        that need to be converted to words
     * @param integer &$case  A variable passed by reference which is set to case
     *                        of the word associated with the number
     * @param integer $gender Gender of string, 0=neutral, 1=male, 2=female.
     *                        Optional, defaults to 1.
     *
     * @return string  The corresponding word representation
     *
     * @access private
     * @author Andrey Demenev <demenev@on-line.jar.ru>
     */
    public function _toWordsWithCase($num, &$case, $gender = 1)
    {
        $ret  = '';
        $case = 3;

        $num = trim($num);

        $sign = "";
        if (substr($num, 0, 1) == '-') {
            $sign = $this->_minus . $this->_sep;
            $num = substr($num, 1);
        }

        while (strlen($num) % 3) {
            $num = '0' . $num;
        }

        if ($num == 0 || $num == '') {
            $ret .= $this->_digits[$gender][0];
        } else {
            $power = 0;

            while ($power < strlen($num)) {
                if (!$power) {
                    $groupgender = $gender;
                } elseif ($power == 3) {
                    $groupgender = 2;
                } else {
                    $groupgender = 1;
                }

                $group = $this->_groupToWords(substr($num, -$power - 3, 3), $groupgender, $_case);
                if (!$power) {
                    $case = $_case;
                }

                if ($power == 3) {
                    if ($_case == 1) {
                        $group .= $this->_sep . 'тисяча';
                    } elseif ($_case == 2) {
                        $group .= $this->_sep . 'тисячі';
                    } else {
                        $group .= $this->_sep . 'тисяч';
                    }
                } elseif ($group && $power > 3 && isset($this->_exponent[$power])) {
                    $group .= $this->_sep . $this->_exponent[$power];
                    if ($_case == 2) {
                        $group .= 'и';
                    } elseif ($_case == 3) {
                        $group .= 'ів';
                    }
                }

                if ($group) {
                    $ret = $group . $this->_sep . $ret;
                }

                $power += 3;
            }
        }

        return $sign . $ret;
    }

    // }}}
    // {{{ _groupToWords()
}
