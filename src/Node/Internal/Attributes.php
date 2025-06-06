<?php declare(strict_types=1);

namespace AhjDev\PhpTagMaker\Node\Internal;

use AhjDev\PhpTagMaker\HtmlClass;

/**
 * @internal
 * @property \DOMElement $domElement
 */
trait Attributes
{
    public function setClass(string ...$classes): self
    {
        return $this->setAttribute('class', (string)(new HtmlClass(...$classes)));
    }

    public function getClass(): null|string|array
    {
        if ($attribute = $this->getAttribute('class')) {
            $attribute = explode(' ', $attribute);
            return count($attribute) === 1  ? $attribute[0] : $attribute;
        }
        return null;
    }

    public function setId(string $id): self
    {
        return $this->setAttribute('id', $id);
    }

    public function getId(): ?string
    {
        return $this->getAttribute('id');
    }

    public function setAttribute(string $qualifiedName, string $value): self
    {
        $this->domElement->setAttribute($qualifiedName, $value);
        return $this;
    }

    public function removeAttribute(string $qualifiedName): self
    {
        $this->domElement->removeAttribute($qualifiedName);
        return $this;
    }
    public function hasAttribute(string $qualifiedName): bool
    {
        return $this->domElement->hasAttribute($qualifiedName);
    }

    public function getAttribute(string $qualifiedName): ?string
    {
        $attribute = $this->domElement->getAttribute($qualifiedName);
        return empty($attribute) ? null : $attribute;
    }

    /**
     * @return \ArrayIterator<\DOMAttr>
     */
    public function iterAttributes(): \Iterator
    {
        return new \ArrayIterator(
            array_map(
                fn (string $name) => $this->domElement->getAttributeNode($name),
                $this->domElement->getAttributeNames()
            )
        );
    }
}
