<?php

namespace DataStructure;

class TrieNode {
    public $value;
    private $children;
    private $isWord;

    public function __construct(string $value) {
        $this->value = $value;
        $this->children = [];
        $this->isWord = false;
    }

    public function addChild(TrieNode $node) {
        array_push($this->children, $node);
    }

    public function isChild($char): bool {
        foreach ($this->children as $child) {
            if ($child->getValue() == $char) {
                return true;
            }
        }
        return false;
    }

    public function getChild($char) {
        foreach ($this->children as $child) {
            if ($child->getValue() == $char) {
                return $child;
            }
        }
        return null;
    }

    public function getIsWord(): bool {
        return $this->isWord;
    }

    public function setIsWord(bool $isWord): void {
        $this->isWord = $isWord;
    }

    public function getChildren(): array {
        return $this->children;
    }

    public function getValue(): string {
        return $this->value;
    }
}