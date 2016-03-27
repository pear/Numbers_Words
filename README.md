# Numbers_Words

## Introduction

With `PEAR::Numbers_Words` class you can change an integer number
to simple words. This can be usefull when you need to spell a currency
value e.g. on an invoice.

You can choose between several languages (language files are located
in `Numbers/Words/` directory).

BTW: if you need to change number to currency, use `money_format()`
PHP function (available since 4.3 (not yet released)). But you must
know that locale `LC_MONETARY` rules are sometimes unclear.

## Getting started

First you need to install Numbers_Words PEAR package.
You can do it (as root) with:

```
pear install Numbers_Words
```

In your php script you need to load `Numbers/Words.php` header file:

```php
require_once('Numbers/Words.php');
```

Then you can call `Numbers_Words::toWords()` function with two
arguments: integer number (can be a string with digits) and
optional locale name (default is `en_US`):

```php
$ret = Numbers_Words::toWords($num, "en_GB");
if (PEAR::isError($ret)) {
    echo "Error: " . $ret->message . "\n";
  } else {
    echo "Num $num in British English is '<b>$ret</b>'<p>\n";
}
```

For  this would display:

`Num 12340000000 in British English is '<b>twelve thousand million three hundred forty million</b>'<p>`

## Current State

The current release can be found at the PEAR webpage:
  http://pear.php.net/package-info.php?package=Numbers_Words

For the time of writting this Readme file, Numbers_spell package has the
status beta, which means there can be samo bugs, and it is under development.
This is not mature code.

## Development

This package needs help from people, who can write language modules other
than Polish and English.

## Package Content

- `README.md` - this file
- `ChangeLog` - change log
- `test-numbers-words.php` - test file showing Numbers_Words example usage
- `Words.php` - main class file, that loads language modules on demand
- `Words/lang.{LOCALE_NAME}.php` - language modules

There are available the following modules (called by locale name,
in alphabetical order):

-  `az`     - Azerbaijani language.  
              Author: Shahriyar Imanov

-  `bg`     - Bulgarian language (in WIN-1251 charset).  
              Author: Kouber Saparev

-  `cs`     - Czech language.  
              Author: Petr 'PePa' Pavel

-  `de`     - German language.  
              Author: Piotr Klaban

-  `dk`     - Danish language.  
              Author: Jesper Veggerby

-  `en_100` - Donald Knuth number naming system, in English language.  
              Author: Piotr Klaban

-  `en_GB`  - British English notation of numbers, where
              one billion is 1000000 times one million.
              1000 times million is just 'thousand million' here.
              I do not use a word billiard here, because
              English people do not use it often, and even could not know it.  
              Author: Piotr Klaban

-  `en_US`  - American English notation of numbers, where
              one billion is 1000 times one million  
              Author: Piotr Klaban

-  `es`     - Spanish (Castellano) language.  
              Author: Xavier Noguer

-  `es_AR`  - Argentinian Spanish language.  
              Author: Martin Marrese

-  `et`     - Estonian language.  
              Author: Erkki Saarniit

-  `fr`     - French language.  
              Author: Kouber Saparev

-  `fr_BE`  - French (Belgium) language.  
              Author: Kouber Saparev, Philippe Bajoit

-  `he`     - Hebrew language.  
              Author: Hadar Porat

-  `hu_HU`  - Hungarian language.  
              Author: Nils Homp

-  `id`     - Indonesia language.  
              Authors: Ernas M. Jamil, Arif Rifai Dwiyanto

-  `it_IT`  - Italian language.  
              Authors: Filippo Beltramini, Davide Caironi

-  `lt`     - Lithuanian language.  
              Author: Laurynas Butkus

-  `nl`     - Dutch language.  
              Author: WHAM van Dinter

-  `pl`     - Polish language (in an internet standard charset ISO-8859-2)  
              Author: Piotr Klaban

-  `pt_BR`  - Brazilian Portuguese language.  
              Authors: Marcelo Subtil Marcal, Mario H.C.T., Igor Feghali

-  `ro_RO`  - Romanian language.  
              Author: Bogdan Stancescu	

-  `ru`     - Russian language.  
              Author: Andrey Demenev

-  `sv`     - Swedish language.  
              Author: Robin Ericsson

-  `tr_TR`  - Turkish language.  
              Author: Shahriyar Imanov

## What if numbers have fraction part?

You can split the number by the coma or dot. The example
function was provided by Ernas M. Jamil (see below).
I do not know if the splitting and concatenating numbers
should be supported by Numbers_Words.. Does each language
spell numbers with a 'coma'/'koma'? What do you think?

```php
function num2word($num, $fract = 0) {
        require_once('Numbers/Words.php');

        $num = sprintf("%." . $fract . "f", $num);
        $fnum = explode('.', $num);

        $ret =  Numbers_Words::toWords($fnum[0], "id");
        if (!$fract) return $ret;

        $ret .=  ' koma '; // point in english
        $ret .= Numbers_Words::toWords($fnum[1], "id");

        return $ret;
}
```

## How to convert decimal part and not fraction part of the currency value?

Rob King send me a patch that would allow to leave fraction part in digits.
I.e. you can convert 31.01 into 'thirty-one pounds 01 pence':

```php
  require_once('Numbers/Words.php');
  require_once('Numbers/Words/lang.en_GB.php');

  $obj = new Numbers_Words_en_GB;
  $convert_fraction = false;
  print $obj->toCurrencyWords('GBP', '31', '01', $convert_fraction) . "\n";
```

## How to write new Language Files

Just copy existing `en_US` or `en_GB` etc. file into `lang.{your_country/locale code}.php`
and translate digits, numbers, tousands to your language. Then please send it
to the author to the address makler@man.torun.pl.

## Credits

All changes from other people are desrcribed with details in ChangeLog.
There are also names of the people who send me patches etc.
Authors of the language files are mentioned in the language files directly
as the author.
