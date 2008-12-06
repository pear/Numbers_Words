<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
//
// +----------------------------------------------------------------------+
// | PHP version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2003 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Xavier Noguer                                               |
// +----------------------------------------------------------------------+
//

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Numbers_Words_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';

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

class Numbers_Words_AllTests {

    public static function main()
    {
        require_once 'PHPUnit/TextUI/TestRunner.php';
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

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Numbers_Words_AllTests::main') {
    Numbers_Words_AllTests::main();
}
?>
