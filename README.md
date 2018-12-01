## MellowBot
PHP Library Natural Language Processing (NLP) with Artificial intelligence (AI)

## Requirement
* php 5.6 / 7.0 / higher
* php-curl
* say (for library speech)

## Example

### Usage Translate (api based on google translate)

```php
<?php
require 'app.php';

$MellowBot = new MellowBot();
$MellowBot->text('translate english to french Hello World');
$MellowBot->reply();
```
#### Result
```console
Bonjour le monde
```

### Usage Artificial intelligence (api based on wikipedia)

```php
<?php
require 'app.php';

$MellowBot = new MellowBot();
$MellowBot->text('what is google?');
$MellowBot->reply();
```
#### Result
```console
Google LLC is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, search engine, cloud computing, software, and hardware.
```

### Result to JSON

```php
<?php
require 'app.php';

$MellowBot = new MellowBot();
$MellowBot->text('where is london?');
$MellowBot->json();
```
#### Result
```javascript
{"status":"200","result":"Mark Elliot Zuckerberg (; born May 14, 1984) is an American technology entrepreneur and philanthropist."}
```

