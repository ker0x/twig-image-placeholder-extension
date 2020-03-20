<div align="center">
    <a href="https://travis-ci.org/ker0x/twig-image-placeholder-extension" title="Build">
        <img src="https://img.shields.io/travis/ker0x/twig-image-placeholder-extension.svg?style=for-the-badge" alt="Build">
    </a>
    <a href="https://scrutinizer-ci.com/g/ker0x/twig-image-placeholder-extension/" title="Coverage">
        <img src="https://img.shields.io/scrutinizer/coverage/g/ker0x/twig-image-placeholder-extension.svg?style=for-the-badge" alt="Coverage">
    </a>
    <a href="https://scrutinizer-ci.com/g/ker0x/twig-image-placeholder-extension/" title="Code Quality">
        <img src="https://img.shields.io/scrutinizer/g/ker0x/twig-image-placeholder-extension.svg?style=for-the-badge" alt="Code Quality">
    </a>
    <a href="https://php.net" title="PHP Version">
        <img src="https://img.shields.io/badge/php-%3E%3D%207.2-8892BF.svg?style=for-the-badge" alt="PHP Version">
    </a>
    <a href="https://packagist.org/packages/kerox/twig-image-placeholder-extension" title="Downloads">
        <img src="https://img.shields.io/packagist/dt/kerox/twig-image-placeholder-extension.svg?style=for-the-badge" alt="Downloads">
    </a>
    <a href="https://packagist.org/packages/kerox/twig-image-placeholder-extension" title="Latest Stable Version">
        <img src="https://img.shields.io/packagist/v/kerox/twig-image-placeholder-extension.svg?style=for-the-badge" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/kerox/twig-image-placeholder-extension" title="License">
        <img src="https://img.shields.io/packagist/l/kerox/twig-image-placeholder-extension.svg?style=for-the-badge" alt="License">
    </a>
</div>

# Twig Image Placeholder Extension

A Twig extension to generate images placeholder

## Installation

You can install the extension using Composer:

```
composer require kerox/twig-image-placeholder-extension
```

```php
$extension = new \Kerox\TwigImagePlaceholder\SvgPlaceholderExtension();

$twig = new \Twig\Environment($loader);
$twig->addExtension($extension);
```

## Usage

The following functions are available

* svg_placeholder()
* svg_placeholder_uri()

## Examples

#### Default

![](./examples/default.svg?sanitize=true)

```twig
{{ svg_placeholder() }}
```

#### Size

![](./examples/size.svg?sanitize=true)

```twig
{{ svg_placeholder(150, 150) }}
```

#### Color

![](./examples/color.svg?sanitize=true)

```twig
{{ svg_placeholder(300, 150, {
    bgColor: '#0F1C3F' , 
    textColor: '#7FDBFF'
}) }}
```

#### Text

![](./examples/text.svg?sanitize=true)

```twig
{{ svg_placeholder(300, 150, {
   text: 'Foo Bar'
}) }}
```

## Options

* fontFamily
* fontWeight
* fontSize
* bgColor
* text
* textColor
* dy

Inspired by [simple-svg-extension](https://github.com/cloudfour/simple-svg-placeholder)
