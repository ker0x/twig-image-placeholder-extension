<div align="center">
    <img src="https://img.shields.io/github/workflow/status/ker0x/twig-image-placeholder-extension/ci?style=for-the-badge" alt="GitHub Workflow Status">
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

#### Symfony

If you are using [Symfony Flex](https://flex.symfony.com/) you're done.

Otherwise, add the following lines to your `services.yaml`

```yaml
services:
  ...

  Kerox\TwigImagePlaceholder\SvgExtension: ~
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

Or Without:

![](./examples/notext.svg?sanitize=true)

```twig
{{ svg_placeholder(300, 150, {
   text: false
}) }}
```

#### Data URI

```twig
<img src="{{ svg_placeholder_uri() }}">
```

will output

```html
<img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22300%22%20height%3D%22150%22%20viewBox%3D%220%200%20300%20150%22%3E%3Crect%20fill%3D%22%23ddd%22%20width%3D%22300%22%20height%3D%22150%22%3E%3C%2Frect%3E%3Ctext%20fill%3D%22rgba%280%2C0%2C0%2C0.5%29%22%20font-family%3D%22sans-serif%22%20font-size%3D%2230%22%20font-weight%3D%22bold%22%20dy%3D%2210.5%22%20x%3D%2250%25%22%20y%3D%2250%25%22%20text-anchor%3D%22middle%22%3E300x150%3C%2Ftext%3E%3C%2Fsvg%3E">
```

## Options Reference

| Option     | Type                    | Default                                            | Description |
| ---------- | ----------------------- | -------------------------------------------------- | ----------- |
| text       | `string`,`null`,`false` | Placeholder dimensions                             | The text to display. If set to `false`, element `text` will not be added to the svg.  |
| fontFamily | `string`                | `sans-serif`                                       | The font to use for the text. For data URIs, this needs to be a system-installed font. |
| fontWeight | `string`                | `bold`                                             | |
| fontSize   | `float`                 | 20% of the shortest image dimension, rounded down. | |
| dy         | `float`                 | 35% of the `fontSize`                              | Adjustment applied to the [dy attribute](https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/dy) of the text element so it will appear vertically centered. |
| bgColor    | `string`                | `#ddd`                                             | The background color of the image. Defaults to `#ddd`. |
| textColor  | `string`                | `rgba(0,0,0,0.5)`                                  | The color of the text. For transparency, use an `rgba` or `hsla` color value. |
| class      | `string`                |                                                    | If provide, add a `class` attribute to the `svg` element.
