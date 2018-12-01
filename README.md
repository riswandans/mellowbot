### MellowBot
Simple library for Natural Language Processing

### Requirement
* php 5.6 / 7.0 / higher
* php-curl
* say (for library speech)

### Usage API

```php
<?php
require 'loader.php';
$main = new Main(); // Main library
$speech = new Speech(); // Using library speech (say)
$translate = new Google_Translate(); // Using library google translate

$ask = "translate english to french Hello World";
$translate->from = $translate->country_name($main->split_text($ask, 1)); // english
$translate->to = $translate->country_name($main->split_text($ask, 3)); // french
$translate->word = $main->get_text_translate($ask); // Hello World
$main->reply($translate->translate()); // Show result
$speech->say($main->split_text($ask, 3),$translate->translate()); // Make program say Hello World
?>
```

### Result
```console
Bonjour le monde
```

