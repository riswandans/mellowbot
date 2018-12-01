### MellowBot
Simple library for Natural Language Processing

### Requirement
* php 5.6 / 7.0 / higher
* php-curl
* say (for library speech)

### Usage API

```php
<?php
require 'app.php';
require 'loader.php';

$MellowBot = new MellowBot();
$MellowBot->text('translate english to french Hello World');
$MellowBot->response();
```

### Result
```console
Bonjour le monde
```

