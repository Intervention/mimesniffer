# A class to detect mime types of given contents

[![Build Status](https://travis-ci.org/Intervention/mimesniffer.png?branch=master)](https://travis-ci.org/Intervention/mimesniffer)

Detecting MIME Content-type in PHP is easy with [mime_content_type](https://www.php.net/manual/en/function.mime-content-type.php) or [Fileinfo](https://www.php.net/manual/en/book.fileinfo.php). But Fileinfo as an extension is sometimes not available on the server. The function `mime_content_type` wants a path to the filesystem as argument and doesn't process if we only have a string value. This package makes it easy to detect the mime types of the content of a given file or string, without any extension dependencies. Here's an example:

```php
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageJpeg;

// detect given string
$sniffer = MimeSniffer::createFromString($content);

// or detect given file
$sniffer = MimeSniffer::createFromFilename('image.jpg');

// returns object of detected type 
$type = $sniffer->getType(); 

$bool = $type->isImage(); // check if we detected an image
$bool = $type->isBinary(); // check if we have binary data
$type = (string) $type; // cast type to string (e.g. "image/jpeg")

// you can also check, if the content matches a specific type
$bool = $sniffer->matches(new ImageJpeg);
```

**Currently only the following file types can be detected. More will be added in a next release.**

### Images

- Image encoded as JPEG raw or in the JFIF or Exif file format
- Image file encoded in the Graphics Interchange Format (GIF)
- Image encoded in the Portable Network Graphics format (PNG)
- Image encoded as BMP file, a bitmap format
- Icon encoded in ICO file format
- Image in Google WebP image format
- Scalable Vector Graphics (SVG)
- Tagged Image File Format (TIFF)
- Image encoded Photoshop Document file format (PSD)

### Archives

- GZIP compressed
- ZIP file
- RAR archive
- TAR file

### Other

- PDF document
- application/octet-stream (default binary)
- text/plain (default)

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
