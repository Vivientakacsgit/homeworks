<?php

namespace Autocomplete;

use DataStructure\Trie;

class Autocomplete extends Trie {
    private $result = [];

    public function getMatches(string $prefix): array {
        $current = $this->root;
        $tempWord = "";

        foreach (str_split($prefix) as $char){
            if (!$current->isChild($char)) {
                return $this->result;
            } else {
                $tempWord .= $char;
                $current = $current->getChild($char);
            }
        }

        if ($current->getIsWord() && empty($current->getChildren())) {
            array_push($this->result, $tempWord);
            return $this->result;
        }

        self::prefixSearch($current, $tempWord);

        return $this->result;
    }

    public function prefixSearch($node, $word) {
        if ($node->getIsWord()) {
            array_push($this->result, $word);
        }
        foreach ($node->getChildren() as $child) {
            $this->prefixSearch($child, $word . $child->getValue());
        }
    }
}