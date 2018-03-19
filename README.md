# XML STRING CREATOR #

Xml string creator for PHP, fastest way to build your xml.
Much faster than using SimpleXMLElement, KISS.

## Usage:
```php
$stringXml = new XmlStringCreator('ROOT');
$stringXml->openNode('ITEM');
$stringXml->addValue('value', 1, ['some' => 'attribute'])
    ->addValue('value2', 'some value');
$stringXml->closeNode('ITEM');
echo $stringXml->finish();
```

Output:

```xml
<?xml version="1.0" encoding="utf-8"?>
<ROOT>
    <ITEM>
        <value some="attribute">1</value>
        <value2>some value</value2>
    </ITEM>
</ROOT>
```

## Requirements:
PHP 7+