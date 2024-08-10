# PHP Media type (MIME) detector

[![Latest Version](https://img.shields.io/packagist/v/intervention/mimesniffer.svg)](https://packagist.org/packages/intervention/mimesniffer)
[![Tests](https://github.com/Intervention/mimesniffer/actions/workflows/build.yml/badge.svg)](https://github.com/Intervention/mimesniffer/actions/workflows/build.yml)
[![Monthly Downloads](https://img.shields.io/packagist/dm/intervention/mimesniffer.svg)](https://packagist.org/packages/intervention/mimesniffer/stats)
[![Support me on Ko-fi](https://raw.githubusercontent.com/Intervention/mimesniffer/main/.github/images/support.svg)](https://ko-fi.com/interventionphp)

Detecting MIME Content-type in PHP is easy with
[mime_content_type](https://www.php.net/manual/en/function.mime-content-type.php)
or [Fileinfo](https://www.php.net/manual/en/book.fileinfo.php). But Fileinfo as
an extension is sometimes not available on the server. The function
`mime_content_type` wants a path to the filesystem as argument and doesn't
process if we only have a string value. This package makes it easy to detect
the mime types of the content of a given file or string, without any extension
dependencies. 

## Installation

Install the package easily via composer:

```bash
composer require intervention/mimesniffer
```
## Usage

Here are some code samples, to show how the library is handled.

```php
use Intervention\MimeSniffer\MimeSniffer;
use Intervention\MimeSniffer\Types\ImageJpeg;

// universal factory method
$sniffer = MimeSniffer::create($content);

// or detect given string
$sniffer = MimeSniffer::createFromString($content);

// or detect given file
$sniffer = MimeSniffer::createFromFilename('image.jpg');

// or detect from file pointer
$sniffer = MimeSniffer::createFromFilename(fopen('test.jpg', 'r'));

// returns object of detected type 
$type = $sniffer->getType(); 

$bool = $type->isBinary(); // check if we have binary data
$bool = $type->isImage(); // check if we are dealing with an image
$bool = $type->isVideo(); // check video data was detected
$bool = $type->isAudio(); // check if we have detected audio data
$bool = $type->isArchive(); // check if an archive was detected
$type = (string) $type; // cast type to string (e.g. "image/jpeg")

// you can also check, if the content matches a specific type
$bool = $sniffer->matches(new ImageJpeg);

// or check, if the content matches an array of types
$bool = $sniffer->matches([ImageJpeg::class, ImageGif::class]);

// or check, if the content matches an array of type objects
$bool = $sniffer->matches([new ImageJpeg, $type]);
```

If your prefer non-static initialization:

```php
use Intervention\MimeSniffer\MimeSniffer;

// create instance with constructor
$sniffer = new MimeSniffer($content);

// with setter for given content
$type = $sniffer->setFromString($other_content)->getType();

// or with setter for filename
$type = $sniffer->setFromFilename('images/image.jpg')->getType();

// or with setter for file pointer
$type = $sniffer->setFromPointer(fopen('images/image.jpg', 'r'))->getType();
```

**Currently only the following file types can be detected. More will be added in a next release.**

### Images

- Image encoded as JPEG raw or in the JFIF or Exif file format
- Image file encoded in the Graphics Interchange Format (GIF)
- Image encoded in the Portable Network Graphics format (PNG)
- Image encoded as BMP file, a bitmap format
- Image encoded in High Efficiency Image File Format (HEIC/HEIF)
- Icon encoded in ICO file format
- Image in Google WebP image format
- Scalable Vector Graphics (SVG)
- Tagged Image File Format (TIFF)
- Image encoded Photoshop Document file format (PSD)
- AV1 Image File Format (AVIF)

### Archives

- GZIP compressed
- ZIP file
- RAR archive
- TAR file

### Videos

- AVI
- MPEG-1 and MPEG-2 video 
- MKV media container

### Audio

- MP3 file
- FLAC file

### Other

- PDF document
- OGG media container
- SQLite Database
- application/octet-stream (default binary)
- text/plain (default)

## Contributing

Contributions are welcome. Please note the following guidelines before submiting your pull request.

- Follow [PSR-2](http://www.php-fig.org/psr/psr-2/) coding standards.
- Write tests for new functions and added features

## Development & Testing

With this package comes a Docker image to build a test suite and analysis
container. To build this container you have to have Docker installed on your
system. You can run all tests with this command.

```bash
docker-compose run --rm --build tests
```

Run the static analyzer on the code base.

```bash
docker-compose run --rm --build analysis
```

## Authors

This library is developed and maintained by [Oliver Vogel](https://intervention.io)

## License

Intervention MimeSniffer is licensed under the [MIT License](LICENSE).
