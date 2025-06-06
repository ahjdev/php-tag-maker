<?php declare(strict_types=1);

namespace AhjDev\PhpTagMaker\Node;

use AhjDev\PhpTagMaker\Node;

final class HtmlText extends Node
{
    private \DOMText $domText;

    public function __construct(string $text)
    {
        $this->domText = new \DOMText($text);
    }

    public static function make($text): self
    {
        return new self($text);
    }

    public function toDomNode(): \DOMText
    {
        return $this->domText;
    }
}
