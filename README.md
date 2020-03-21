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

> Inspired by [simple-svg-placeholder](https://github.com/cloudfour/simple-svg-placeholder)

## Installation

You can install the extension using Composer:

```
composer require kerox/twig-image-placeholder-extension
```

#### Flex

*TODO*

#### Symfony

If you don't use **Symfony Flex**, add the following lines to your `services.yaml`

```yaml
services:
  _defaults:
    public: false
    autowire: true
    autoconfigure: true

  Kerox\TwigImagePlaceholder\SvgExtension: null
```

#### Standalone

If you use Twig as standalone, then you need to add the extension manually

```php
$extension = new \Kerox\TwigImagePlaceholder\SvgPlaceholderExtension();

$twig = new \Twig\Environment($loader);
$twig->addExtension($extension);
```

## Usage

The following functions are available

* [SvgExtension](./src/SvgPlaceholderExtension.php)
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

#### Colors

![](./examples/colors.svg?sanitize=true)

```twig
{{ svg_placeholder(300, 150, {
    bgColor: '#0f1c3f' , 
    textColor: '#7fdbff'
}) }}
```

#### Text

![](./examples/text.svg?sanitize=true)

```twig
{{ svg_placeholder(300, 150, {
   text: 'Foo Bar'
}) }}
```

## Options Reference

| Option     | Type   | Default                                            | Description |
| ---------- | ------ | -------------------------------------------------- | ----------- |
| text       | string | Image dimensions                                   | The text to display. |
| fontFamily | string | `sans-serif`                                       | The font to use for the text. For data URIs, this needs to be a system-installed font. |
| fontWeight | string | `bold`                                             | |
| fontSize   | float  | 20% of the shortest image dimension, rounded down. | |
| dy         | float  | 35% of the `fontSize`                              | Adjustment applied to the [dy attribute](https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/dy) of the text element so it will appear vertically centered. |
| bgColor    | string | `#ddd`                                             | The background color of the image. Defaults to `#ddd`. |
| textColor  | string | `rgba(0,0,0,0.5)`                                  | The color of the text. For transparency, use an `rgba` or `hsla` color value. |
