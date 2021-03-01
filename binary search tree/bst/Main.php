<?php

require_once  'Bst.php';
require_once  'Node.php';


class Main
{
    public static function start(){
        $bst = new  Bst();
        $values = [1,2,3,4,5,6,7,8,9, 10, 11, 12, 13, 14];

        $bst->buildTree($values);

        $bst->search(13);
        $bst->search(2);
        $bst->search(7);
        $bst->search(70);

    }

}

Main::start();