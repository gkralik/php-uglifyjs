php-uglifyjs
============

Installation
------------

Add `"gkralik/php-uglifyjs": "0.5"` to your `composer.json` file and run `php composer.phar update`.

Usage
-----

```php
$myPacker = new GK\JavascriptPacker($script, 62, true, false);
$packed = $myPacker->pack();
```

or

```php
$myPacker = new GK\JavascriptPacker($script, 'Normal', true, false);
$packed = $myPacker->pack();
```

or (default values)

```php
$myPacker = new JavaScriptPacker($script);
$packed = $myPacker->pack();
```

Constructor parameters:
`$script`:       the JavaScript to pack, string.
`$encoding`:     level of encoding, int or string :
                 0,10,62,95 or 'None', 'Numeric', 'Normal', 'High ASCII'.
                 default: 62.
`$fastDecode`:   include the fast decoder in the packed result, boolean.
                 default : true.
`$specialChars`: if you are flagged your private and local variables
                 in the script, boolean.
                 default: false.

The `pack()` method return the compressed JavasScript, as a string.

See http://dean.edwards.name/packer/usage/ for more information.

Acknowledgments
---------------

Based on JavaScriptPacker by Nicolas Martin (http://joliclic.free.fr/php/javascript-packer/en/).