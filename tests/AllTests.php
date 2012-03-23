<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words test suite
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Numbers
 * @package    Numbers_Words
 * @author     Xavier Noguer <xnoguer.php@gmail.com>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/Numbers_Words
 */

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Numbers_Words_AllTests::main');
}

require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'BulgarianTest.php';
require_once 'English100Test.php';
require_once 'EnglishGbTest.php';
require_once 'EnglishUsTest.php';
require_once 'FrenchBeTest.php';
require_once 'FrenchTest.php';
require_once 'GermanTest.php';
require_once 'ItalianTest.php';
require_once 'PolishTest.php';
require_once 'PortugueseBrazilianTest.php';
require_once 'SpanishTest.php';
require_once 'HungarianTest.php';
require_once 'LithuanianTest.php';

class Numbers_Words_AllTests {

    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite();

        $suite->addTestSuite('Numbers_Words_BulgarianTest');
        $suite->addTestSuite('Numbers_Words_English100Test');
        $suite->addTestSuite('Numbers_Words_EnglishGbTest');
        $suite->addTestSuite('Numbers_Words_EnglishUsTest');
        $suite->addTestSuite('Numbers_Words_FrenchTest');
        $suite->addTestSuite('Numbers_Words_FrenchBeTest');
        $suite->addTestSuite('Numbers_Words_GermanTest');
        $suite->addTestSuite('Numbers_Words_ItalianTest');
        $suite->addTestSuite('Numbers_Words_PolishTest');
        $suite->addTestSuite('Numbers_Words_PortugueseBrazilianTest');
        $suite->addTestSuite('Numbers_Words_SpanishTest');
        $suite->addTestSuite('Numbers_Words_HungarianTest');
        $suite->addTestSuite('Numbers_Words_LithuanianTest');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Numbers_Words_AllTests::main') {
    Numbers_Words_AllTests::main();
}
