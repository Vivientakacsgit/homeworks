<?php


class Node
{
    private $value;
    private $left = null;
    private $right = null;


    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }


    public function setValue($value)
    {
        $this->value = $value;
    }


    public function getLeft()
    {
        return $this->left;
    }


    public function setLeft($left)
    {
        $this->left = $left;
    }


    public function getRight()
    {
        return $this->right;
    }


    public function setRight($right)
    {
        $this->right = $right;
    }




}