<?php

declare(strict_types=1);

namespace Kerox\TwigImagePlaceholder\Tests;

use Kerox\TwigImagePlaceholder\SvgPlaceholderExtension;
use PHPUnit\Framework\TestCase;

class SvgExtensionTest extends TestCase
{
    protected $extension;

    protected function setUp(): void
    {
        $this->extension = new SvgPlaceholderExtension();
    }

    public function testSvgPlaceholder(): void
    {
        $this->assertSame('<svg xmlns="http://www.w3.org/2000/svg" width="300" height="150" viewBox="0 0 300 150"><rect fill="#ddd" width="300" height="150"></rect><text fill="rgba(0,0,0,0.5)" font-family="sans-serif" font-size="30" font-weight="bold" dy="10.5" x="50%" y="50%" text-anchor="middle">300x150</text></svg>', $this->extension->getSvgPlaceholder());
    }

    public function testSvgPlaceholderWithOptions(): void
    {
        $options = [
            'bgColor' => '#0F1C3F',
            'textColor' => '#7FDBFF',
            'text' => 'foo bar',
        ];

        $this->assertSame('<svg xmlns="http://www.w3.org/2000/svg" width="500" height="250" viewBox="0 0 500 250"><rect fill="#0F1C3F" width="500" height="250"></rect><text fill="#7FDBFF" font-family="sans-serif" font-size="50" font-weight="bold" dy="17.5" x="50%" y="50%" text-anchor="middle">foo bar</text></svg>', $this->extension->getSvgPlaceholder(500, 250, $options));
    }

    public function testSvgPlaceholderUri(): void
    {
        $this->assertSame('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22300%22%20height%3D%22150%22%20viewBox%3D%220%200%20300%20150%22%3E%3Crect%20fill%3D%22%23ddd%22%20width%3D%22300%22%20height%3D%22150%22%3E%3C%2Frect%3E%3Ctext%20fill%3D%22rgba%280%2C0%2C0%2C0.5%29%22%20font-family%3D%22sans-serif%22%20font-size%3D%2230%22%20font-weight%3D%22bold%22%20dy%3D%2210.5%22%20x%3D%2250%25%22%20y%3D%2250%25%22%20text-anchor%3D%22middle%22%3E300x150%3C%2Ftext%3E%3C%2Fsvg%3E', $this->extension->getSvgPlaceholderUri());
    }
}
