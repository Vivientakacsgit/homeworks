<?php

namespace DataStructure;

class Trie {
    public $root;

    public function __construct() {
        $this->root = new TrieNode('');
    }



    public function insert(string $word) {
        $currentNode = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            $char = $word[$i];
            if ($currentNode->isChild($char)) {
                $childNode = $currentNode->getChild($char);
            } else {
                $childNode = new TrieNode($char);
                $currentNode->addChild($childNode);
            }
            $currentNode = $childNode;
        }

        $currentNode->setIsWord(true);
    }

    public function remove(string $word) {
        // OPTIONAL! Your code goes here
    }
}