### MellowBot
Simple library for Natural Language Processing

### Requirement
* php 5.6 / 7.0 / higher
* php-curl
* say (for library speech)

### Usage API

```php
<?php
require 'main.php';
require 'loader.php';

$MellowBot = new MellowBot();
$MellowBot->translate('translate english to french Hello World');
?>
```

### Result
```console
Bonjour le monde
```

