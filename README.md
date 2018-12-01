## MellowBot
PHP Library Natural Language Processing (NLP) with Artificial intelligence (AI)

## Requirement
* php 5.6 / 7.0 / higher
* php-curl
* say (for library speech)

## Example

### Webhook for Telegram BOT

```php
<?php
require 'app.php';
require 'telegram.php';

$telegram = new TelegramBot();
$telegram->token = "BOT:TOKEN";
$telegram->start_webhook();

$MellowBot = new MellowBot();
$MellowBot->text($telegram->last_message);
$telegram->message = $MellowBot->response();
$telegram->send();
```


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
$MellowBot->text('who is mark zuckerberg?');
$MellowBot->json();
```
#### Result
```javascript
{"status":"200","result":"Mark Elliot Zuckerberg (; born May 14, 1984) is an American technology entrepreneur and philanthropist."}
```

