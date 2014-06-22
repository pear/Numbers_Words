<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words class extension to spell numbers in Lithuanian.
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
 * @author     Igor Feghali <ifeghali@php.net>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/Numbers_Words
 */

require_once 'Numbers/Words.php';

class Numbers_Words_LithuanianTest extends PHPUnit_Framework_TestCase
{
    protected $handle;

    public function setUp() {
        $this->handle = new Numbers_Words();
    }

    /**
     * Testing utf-8
     */
    function testBug18248()
    {
        $number = $this->handle->toWords(726, 'lt');
        $this->assertEquals('septyni šimtai dvidešimt šeši', $number);
    }
}
