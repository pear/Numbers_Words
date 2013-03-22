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
     * @expectedExceptionMessage Unable to include the Numbers/Words/lang.doesnotexist.php file
     */
    function testToWordsInvalidLocale()
    {
        $nw = new Numbers_Words();
        $nw->toWords(1, 'doesnotexist');
    }

    /**
     * @expectedException Numbers_Words_Exception
     * @expectedExceptionMessage Unable to include the Numbers/Words/lang.doesnotexist.php file
     */
    function testToCurrencyInvalidLocale()
    {
        $nw = new Numbers_Words();
        $nw->toCurrency(1, 'doesnotexist');
    }
}

?>
