<?php declare(strict_types=1);

namespace AhjDev\PhpTagMaker\Node;

use AhjDev\PhpTagMaker\Node;

/**
 * @implements \IteratorAggregate<HtmlTag>
 */
final class HtmlTagMulti extends Node implements \IteratorAggregate
{
    /** @var list<Node> */
    private array $values = [];

    public function __construct(private array $tags, Node|string ...$value)
    {
        $this->values = array_map(static fn ($v) => is_string($v) ? new HtmlText($v) : $v, $value);
    }

    public static function make(array $tags, Node|string ...$value): self
    {
        return new self($tags, ...$value);
    }

    public function getIterator(): \Generator
    {
        return yield from $this->tags;
    }

    public function toDomNode(): \DomNode
    {
        $before = $this->values;
        foreach (array_reverse($this->tags) as $tag) {
            $tag    = new HtmlTag($tag, ...$before);
            $before = [$tag];
            // foreach ($attributes as $name => $value)
            //     $tag->setAttribute($name, $value);
        }
        // Return DomElement
        return $tag->toDomNode();
    }
}
