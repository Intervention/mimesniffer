# A class to detect mime types of given contents

[![Build Status](https://travis-ci.org/Intervention/mimesniffer.png?branch=master)](https://travis-ci.org/Intervention/mimesniffer)

This package makes it easy to detect the mime types of a given file or content. Here's an example:

```php
use Intervention\MimeSniffer\MimeSniffer

// detect given string
$sniffer = MimeSniffer::createFromString($content);

$type = $sniffer->getType(); // returns detected type object
$type = (string) $type; // cast type to string (image/jpeg)

// or detect given file
$sniffer = MimeSniffer::createFromFilename('image.jpg');
```

**Currently only the following file types can be detected. More will be added in a next release.**

- image/jpeg
- image/gif
- image/png
- image/bmp
- image/x-icon
- image/webp
- image/svg+xml
- image/tiff
- image/vnd.adobe.photoshop

## Installation

Install the package easily via composer:

```bash
composer require intervention/mimesniffer
```

## Contributing

Contributions are welcome. Please note the following guidelines before submiting your pull request.

- Follow [PSR-2](http://www.php-fig.org/psr/psr-2/) coding standards.
- Write tests for new functions and added features

## License

Licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2019 [Oliver Vogel](https://olivervogel.com/)
