<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 autoindent: */
/**
 * Numbers_Words test script
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
 * @author     Piotr Klaban <makler@man.torun.pl>
 * @copyright  1997-2008 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/Numbers_Words
 */
/* vim: set expandtab tabstop=4 shiftwidth=4: */

error_reporting(E_ALL);

require_once('PEAR.php');
require_once('Numbers/Words.php');

$num = "1121771141";

$html_on = 0;
if (isset($_REQUEST)) {
  $html_on = 1;
}
if (isset($_REQUEST) && is_array($_REQUEST) && isset($_REQUEST['num'])) {
  $num = $_REQUEST['num'];
} elseif (isset($argv) && is_array($argv) && isset($argv[1])) {
  $num = $argv[1];
}
$html_on = 0;

$shownum = $num;

while (strlen($shownum) % 3 != 0) {
  $shownum = " " . $shownum;
}

$shownum = preg_replace("/(...)/", "\\1 ", $shownum);
$shownum = preg_replace("/ $/", "", $shownum);

if ($html_on)
    echo "<center>Test number: <b><u>$shownum</u></b></center><p>\n";
else
    echo sprintf("%42s", 'Test number: ') . $shownum . "\n\n";

$lang = Numbers_Words::getLocales();
$langs = array();

if ($html_on) {
?>
<center>
<table width="100%" border="1" cellspacing="0">
<tr>
  <th width="50">Symbol</th>
  <th width="100">Number system</th>
  <th width="100%">String</th>
</tr>
<?
}

foreach ($lang as $loc_symbol) {
  $classname = "Numbers_Words_" . $loc_symbol;
  @include_once("Numbers/Words/lang.${loc_symbol}.php");
}

reset($lang);

foreach ($lang as $loc_symbol) {
  $classname = "Numbers_Words_" . $loc_symbol;
  $obj =& new $classname;
  $ret = $obj->toWords($num);
  if (PEAR::isError($ret)) {
    if ($html_on) {
    }
    echo "Error ($loc_symbol): " . $ret->message . "\n";
    if ($html_on) {
    }
  } else {
    $loc_name = $obj->lang;
    $langs[$loc_symbol] = $loc_name;
    if ($html_on) {
      ?>
      <tr>
        <td align="center"><?php echo $loc_symbol; ?></td>
        <td><nobr><i><?php echo $loc_name; ?></i></nobr></td>
        <td><b><?php echo $ret; ?></b></td>
      </tr><?
    } else {
      echo sprintf("%30s: '", $loc_name . ' (' . $loc_symbol . ')') . $ret . "'\n";
    }
  }
}

reset($langs);

$num .= '.34';
$handle = new Numbers_Words();

while (list ($loc_symbol, $loc_name) = each ($langs)) {
  $ret = $handle->toCurrency($num, $loc_symbol);
  if (PEAR::isError($ret)) {
    if ($html_on) {
    }
    echo "Error ($loc_symbol): " . $ret->message . "\n";
    if ($html_on) {
    }
  } else {
    if ($html_on) {
      ?>
      <tr>
        <td align="center"><?php echo $loc_symbol; ?></td>
        <td><nobr><i><?php echo $loc_name; ?></i></nobr></td>
        <td><b><?php echo $ret; ?></b></td>
      </tr><?
    } else {
      echo sprintf("%30s: ", $loc_name . ' (' . $loc_symbol . ')') . $ret . "\n";
    }
  }
}

if ($html_on) {
?>
</table>
</center>
<?php
}

?>
