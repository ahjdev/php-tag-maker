<?php declare(strict_types=1);

namespace AhjDev\PhpTagMaker\Node;

use AhjDev\PhpTagMaker\Node;
use AhjDev\PhpTagMaker\HtmlClass;

/**
 * @method static self abbr(Node|string ...$value) Defines an abbreviation or an acronym
 * @method static self address(Node|string ...$value) Defines contact information for the author/owner of a document
 * @method static self article(Node|string ...$value) Defines an article
 * @method static self aside(Node|string ...$value) Defines content aside from the page content
 * @method static self audio(Node|string ...$value) Defines embedded sound content
 * @method static self b(Node|string ...$value) Defines bold text
 * @method static self bdi(Node|string ...$value) Isolates a part of text that might be formatted in a different direction from other text outside it
 * @method static self bdo(Node|string ...$value) Overrides the current text direction
 * @method static self blockquote(Node|string ...$value) Defines a section that is quoted from another source
 * @method static self body(Node|string ...$value) Defines the document's body
 * @method static self button(Node|string ...$value) Defines a clickable button
 * @method static self canvas(Node|string ...$value) Used to draw graphics, on the fly, via scripting (usually JavaScript)
 * @method static self caption(Node|string ...$value) Defines a table caption
 */
final class HtmlTag extends Node
{
    use Internal\Attributes;
    use Internal\DefaultTags;

    /** @var list<Node> */
    private array $values = [];

    private HtmlClass $class;

    private \DOMElement $domElement;

    public function __construct(private string $tag, Node|string ...$value)
    {
        $this->domElement = new \DOMElement($tag);
        $this->values = array_map(static fn ($v) => is_string($v) ? new HtmlText($v) : $v, $value);
        $this->class = new HtmlClass;
        // $this->domElement->getElementsByTagName();
        // $this->domElement->insertAdjacentElement();
        // $this->domElement->insertAdjacentText();
        // $this->domElement->insertBefore();
        // $this->domElement->removeChild();
    }

    public static function make(string $tag, Node|string ...$value): self
    {
        return new self($tag, ...$value);
    }

    public function getName()
    {
        return $this->domElement->nodeName;
    }

    public function setName(string $tag): self
    {
        $element = new \DOMElement($tag);
        // Copy attributes and child nodes from old element to new element
        foreach ($this->domElement->attributes as $attribute) {
            $element->setAttribute(
                $attribute->nodeName,
                $attribute->nodeValue
            );
        }
        // while ($element->hasChildNodes()) {
        //     $newElement->appendChild($element->childNodes->item(0));
        // }
        $this->domElement = $element;
        return $this;
    }

    public function toDomNode(): \DOMElement
    {
        $element = $this->domElement->cloneNode(true);
        if ($this->class->count()) {
            $element->setAttribute('class', (string) $this->class);
        }
        array_map(
            static fn (Node $v) => $element->append($v->toDomNode()),
            $this->values
        );
        return $element;
    }
}
