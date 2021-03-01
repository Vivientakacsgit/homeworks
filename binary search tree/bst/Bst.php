<?php

require 'Node.php';

class Bst
{

    private $rootNode;


    public function buildTree(array $values){

        $start = 0;
        $end = count($values)-1;
        $nodeValue = $values[floor(($start + $end)/2)];
        $node = new Node($nodeValue);
        if($this->rootNode == null){
            $this->rootNode = $node;
        }
        $leftTree = $this->getLeftTree($values);

        $rightTree = $this->getRightTree($values);
        $this->printList($leftTree);
        $this->printList($rightTree);
        if(count($leftTree) <= 1){
            if(count($leftTree) != 0){
                $node->setLeft(new Node($leftTree[0]));


            }


        }else{
            $node->setLeft($this->buildTree($leftTree));


        }
        if(count($rightTree) <= 1){
            if(count($rightTree) != 0){
                $node->setRight(new Node($rightTree[0]));


            }

        }else{
            $node->setRight($this->buildTree($rightTree));


        }
        return $node;

    }



    private function getLeftTree($values)
    {
        $leftTree = array();
        $start= 0;
        $end = count($values)-1;
        $mid = floor(($start + $end)/2);
        for($i=0; $i < $mid;$i++ ){
            array_push($leftTree,$values[$i]);
        }

        return $leftTree;

    }

    private function getRightTree($values)
    {
        $rightTree = array();

        $end = count($values)-1;
        $start = 0;
        $mid= floor(($start + $end)/2);
        for($i=$mid+1; $i < count($values);$i++ ){
            array_push($rightTree,$values[$i]);
        }

        return $rightTree;
    }

    private function printList($list){
        foreach ($list as $element){
            echo $element." ";
        }
        echo "\n";
    }

    public function search($value){


        $actualNode = $this->rootNode;

        while(true) {


            if ($actualNode->getValue() == $value) {
                echo "found";
                return  false;
            }
            elseif
            ($actualNode->getValue() > $value) {
                $actualNode = $actualNode->getLeft();
                if($actualNode == null){

                    echo " not found";
                    return  false;
                }


            } else {

                $actualNode = $actualNode->getRight();
                if($actualNode == null){

                    echo " not found";
                    return  false;
                }
            }

        }


            return $actualNode;



    }

}




