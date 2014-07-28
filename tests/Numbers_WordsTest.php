<?php
require_once 'Numbers/Words.php';

class Numbers_WordsTest extends PHPUnit_Framework_TestCase
{
    function testToWordsStatic()
    {
        error_reporting(error_reporting() & ~E_STRICT);
        $this->assertEquals('one', Numbers_Words::toWords(1));
    }

    function testToWordsObjectLocale()
    {
        $nw = new Numbers_Words();
        $nw->locale = 'de';
        $this->assertEquals('eins', $nw->toWords(1));
    }

    /**
     * @expectedException Numbers_Words_Exception
     * @expectedExceptionMessage Unable to load locale class Numbers_Words_Locale_doesnotexist
     */
    function testToWordsInvalidLocale()
    {
        $nw = new Numbers_Words();
        $nw->toWords(1, 'doesnotexist');
    }

    /**
     * @expectedException Numbers_Words_Exception
     * @expectedExceptionMessage Unable to load locale class Numbers_Words_Locale_doesnotexist
     */
    function testToCurrencyInvalidLocale()
    {
        $nw = new Numbers_Words();
        $nw->toCurrency(1, 'doesnotexist');
    }

    function testGetLocales()
    {
        $locales = Numbers_Words::getLocales();
        $this->assertInternalType('array', $locales);
        $this->assertGreaterThan(27, count($locales));
        foreach ($locales as $locale) {
            $this->assertEquals(
                1, preg_match('#^[a-z]{2}(_[A-Z]{2})?$#', $locale)
            );
        }
    }

    function testGetLocalesString()
    {
        $locales = Numbers_Words::getLocales('de');
        $this->assertInternalType('array', $locales);
        $this->assertEquals(1, count($locales));
        $this->assertContains('de', $locales);
    }

    function testGetLocalesArray()
    {
        $locales = Numbers_Words::getLocales(array('de', 'en_US'));
        $this->assertInternalType('array', $locales);
        $this->assertEquals(2, count($locales));
        $this->assertContains('de', $locales);
        $this->assertContains('en_US', $locales);
    }

    function testAllLocales()
    {
        $locales = Numbers_Words::getLocales();
        foreach ($locales as $locale) {
            $nw = new Numbers_Words();
            $word = $nw->toWords(101, $locale);
            $this->assertNotEmpty(
                $word,
                'Word for "101" is empty in locale ' . $locale
            );
        }
    }

    /**
     * @expectedException Numbers_Words_Exception
     * @expectedExceptionMessage Unable to find method 'doesnotexist' in class 'Numbers_Words_Locale_de'
     */
    function testLoadLocaleMethodMissing()
    {
        Numbers_Words::loadLocale('de', 'doesnotexist');
    }
}

?>
