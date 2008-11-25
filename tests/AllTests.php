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

if (!defined('PHPUNIT_MAIN_METHOD')) {
    define('PHPUNIT_MAIN_METHOD', 'Numbers_Words_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'GermanTest.php';
require_once 'PolishTest.php';
require_once 'SpanishTest.php';

class Numbers_Words_AllTests {

    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite();

        $suite->addTestSuite('Numbers_Words_German_Test');
        $suite->addTestSuite('Numbers_Words_Polish_Test');
        $suite->addTestSuite('Numbers_Words_Spanish_Test');

        return $suite;
    }
}

if (PHPUNIT_MAIN_METHOD == 'Numbers_Words_AllTests::main') {
    Numbers_Words_AllTests::main();
}
