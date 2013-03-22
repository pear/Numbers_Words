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
}

?>
