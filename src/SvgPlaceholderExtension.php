<?php

declare(strict_types=1);

namespace Kerox\TwigImagePlaceholder;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class SvgPlaceholderExtension extends AbstractExtension
{
    private const DEFAULT_OPTIONS = [
        'fontFamily' => 'sans-serif',
        'fontWeight' => 'bold',
        'bgColor' => '#ddd',
        'textColor' => 'rgba(0,0,0,0.5)',
    ];

    public function getFunctions(): array
    {
        return [
            new TwigFunction('svg_placeholder', [$this, 'getSvgPlaceholder'], ['is_safe' => ['html']]),
            new TwigFunction('svg_placeholder_uri', [$this, 'getSvgPlaceholderUri']),
        ];
    }

    public function getSvgPlaceholder(int $width = 300, int $height = 150, array $options = []): string
    {
        $options = array_replace(self::DEFAULT_OPTIONS, $options);
        $options += [
            'fontSize' => $fontSize = floor(min($width, $height) * 0.2),
            'dy' => $fontSize * 0.35,
            'text' => sprintf('%dx%d', $width, $height),
        ];

        $doc = new \DOMDocument('1.0');

        $rectElement = $doc->createElement('rect');
        $rectElement->setAttribute('fill', $options['bgColor']);
        $rectElement->setAttribute('width', (string) $width);
        $rectElement->setAttribute('height', (string) $height);

        $textElement = $doc->createElement('text');
        $textElement->setAttribute('fill', $options['textColor']);
        $textElement->setAttribute('font-family', $options['fontFamily']);
        $textElement->setAttribute('font-size', (string) $options['fontSize']);
        $textElement->setAttribute('font-weight', (string)$options['fontWeight']);
        $textElement->setAttribute('dy', (string) $options['dy']);
        $textElement->setAttribute('x', '50%');
        $textElement->setAttribute('y', '50%');
        $textElement->setAttribute('text-anchor', 'middle');
        $textElement->appendChild($doc->createTextNode($options['text']));

        $svgElement = $doc->createElement('svg');
        $svgElement->setAttribute('xmlns', 'http://www.w3.org/2000/svg');
        $svgElement->setAttribute('width', (string) $width);
        $svgElement->setAttribute('height', (string) $height);
        $svgElement->setAttribute('viewBox', "0 0 $width $height");

        if (isset($options['class'])) {
            $svgElement->setAttribute('class', $options['class']);
        }

        $svgElement->appendChild($rectElement);
        $svgElement->appendChild($textElement);

        $doc->appendChild($svgElement);

        return trim($doc->saveHTML());
    }

    public function getSvgPlaceholderUri(int $width = 300, int $height = 150, array $options = []): string
    {
        return sprintf('data:image/svg+xml;charset=UTF-8,%s', rawurlencode($this->getSvgPlaceholder($width, $height, $options)));
    }
}
