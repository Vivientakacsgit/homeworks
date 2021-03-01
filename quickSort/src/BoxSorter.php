<?php

namespace Logistics;

class BoxSorter
{
    public function sortItQuickly(array $boxes): array {
        if (empty($boxes)) {
            return $boxes;
        }
        $result = [];
        $new = [];
        $old = [];
        foreach($boxes as $box) {
            $raw_id = explode(" ", $box);
            if (is_numeric($raw_id[0])) {
                $new[$raw_id[0]] = $box;
            } else {
                $old[$raw_id[0]] = $box;
            }
        }

        $resOldKeys = $this->simpleQuickSort(array_keys($old));
        $resNewKeys = $this->simpleQuickSort(array_keys($new));

        foreach($resOldKeys as $key){
            $result[] = $old[$key];
        }
        foreach($resNewKeys as $key){
            $result[] = $new[$key];
        }

        return $result;
    }

    function simpleQuickSort(array $arr): array {
        if(count($arr) <= 1){
            return $arr;
        }
        else{
            $pivot = $arr[0];
            $left = array();
            $right = array();
            for($i = 1; $i < count($arr); $i++)
            {
                if(($arr[$i] <=> $pivot) === -1){
                    $left[] = $arr[$i];
                }
                else{
                    $right[] = $arr[$i];
                }
            }
            return array_merge($this->simpleQuickSort($left), array($pivot), $this->simpleQuickSort($right));
        }
    }
}
