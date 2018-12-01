### MellowBot
PHP Library Natural Language Processing (NLP) with Artificial intelligence (AI)

### Requirement
* php 5.6 / 7.0 / higher
* php-curl
* say (for library speech)

### Usage Google Translate

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

### Usage Artificial intelligence

```php
<?php
require 'app.php';
require 'loader.php';

$MellowBot = new MellowBot();
$MellowBot->text('what is google?');
$MellowBot->response();
```

### Result
```console
Google LLC is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, search engine, cloud computing, software, and hardware.
```

