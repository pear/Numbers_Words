<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words test script
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Numbers
 * @package    Numbers_Words
 * @author     Piotr Klaban <makler@man.torun.pl>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/Numbers_Words
 */
/* vim: set expandtab tabstop=4 shiftwidth=4: */
require_once 'Numbers/Words.php';

$num = "1121771141";

if (isset($argv) && is_array($argv) && isset($argv[1])) {
  $num = $argv[1];
}

$shownum = $num;

while (strlen($shownum) % 3 != 0) {
  $shownum = " " . $shownum;
}

$shownum = preg_replace("/(...)/", "\\1 ", $shownum);
$shownum = preg_replace("/ $/", "", $shownum);

echo sprintf("%42s", 'Test number: ') . $shownum . "\n\n";

$lang = Numbers_Words::getLocales();
$langs = array();

foreach ($lang as $loc_symbol) {
  $classname = "Numbers_Words_" . $loc_symbol;
  @include_once('Numbers/Words/Locale/'.str_replace('_', '/', $loc_symbol).'.php');
}

foreach ($lang as $loc_symbol) {
  $classname = "Numbers_Words_Locale_" . $loc_symbol;
  $obj = new $classname;

  try {
    $ret = $obj->toWords($num);
    $loc_name = $obj->lang;
    $langs[$loc_symbol] = $loc_name;
    echo sprintf("%30s: '", $loc_name . ' (' . $loc_symbol . ')') . $ret . "'\n";
  } catch (Numbers_Words_Exception $nwe) {
    echo (string)$nwe . "\n";
  }
}

reset($langs);

$num .= '.34';
$handle = new Numbers_Words();

while (list ($loc_symbol, $loc_name) = each ($langs)) {
  try {
    $ret = $handle->toCurrency($num, $loc_symbol);
    echo sprintf("%30s: ", $loc_name . ' (' . $loc_symbol . ')') . $ret . "\n";
  } catch (Numbers_Words_Exception $nwe) {
    echo (string)$nwe . "\n";
  }
}

