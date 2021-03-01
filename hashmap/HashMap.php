<?php

require 'Item.php';


class HashMap
{
    private $hashMap = array();
    private $size  = 2;


    public function __construct()
    {
        for ($i = 0; $i < $this->size; $i++) {
            array_push($this->hashMap, array());
        }
    }

    public function extendHashMap(){
        $this->addItemToHashTable(1,1);
        $this->addItemToHashTable(2,2);
        $this->addItemToHashTable(3,3);
        $this->addItemToHashTable(4,4);
        $this->addItemToHashTable(5,5);
        $this->addItemToHashTable(6,6);
        $this->restructureHashMapIfNeeded();
        $this->isFound(3);
        $this->isFound(33);
        $this->isFound(1);
        $this->isFound(6);
        $this->isUpdated(4,44);
        $this->isUpdated(33, 303);
        $this->deleteItemFromHashMapByKey(1);
    }

    private function addItemToHashTable($key, $value){
        $newItem = new Item($key,$value);
        $hashedIndex = crc32($newItem->getKey());
        $indexOfhTable = $hashedIndex % count($this->hashMap);
        array_push($this->hashMap[$indexOfhTable],$newItem);
    }

    public function getItemByKey($key){
        $hashedKey = crc32($key);
        $indexOfhTable = $hashedKey % count($this->hashMap);
        for ($i = 0; $i < count($this->hashMap[$indexOfhTable]); $i++) {
            if ($key == $this->hashMap[$indexOfhTable][$i]->getKey()) {
                return true;
            }
        }
        return false;
    }

    private function updateValueSearchedByKey($key, $value){
        $hashedKey = crc32($key);
        $indexOfhTable = $hashedKey % count($this->hashMap);
        for ($i = 0; $i < count($this->hashMap[$indexOfhTable]); $i++){
            if($key == $this->hashMap[$indexOfhTable][$i]->getKey()){
                $this->hashMap[$indexOfhTable][$i]->setValue($value);
                return true;
            }
            }
        return false;

    }

    private function deleteItemFromHashMapByKey($key){
        $hashedKey = crc32($key);
        $indexOfhTable = $hashedKey % count($this->hashMap);
        for ($i = 0; $i < count($this->hashMap[$indexOfhTable]); $i++){
                if($key == $this->hashMap[$indexOfhTable][$i]->getKey()){
                    unset($this->hashMap[$indexOfhTable][$i]);
                    echo "the element deleted";
                }
            }
    }

    private function checkIfDoubleSizeNeeded(){
        for($i = 0;$i <count($this->hashMap); $i++){
            if(count($this->hashMap[$i]) >= $this->size){
                $this->size = $this->size * 2;
                return true;
            }
        }
        return false;
    }

    private function isFound($key)
    {
        if ($this->getItemByKey($key)) {
            echo "FOUND";
        } else {
            echo "NOT FOUND";
        }
    }

    private function isUpdated($key, $value)
    {
        if ($this->updateValueSearchedByKey($key,$value)) {
            echo "updated";
        } else {
            echo "no success";
        }
    }


    private function restructureHashMapIfNeeded()
    {
        if ($this->checkIfDoubleSizeNeeded()) {
            $newHashMap = array();
            for ($i = 0; $i < $this->size; $i++) {
                array_push($newHashMap, array());
            }
            foreach ($this->hashMap as $array) {
                foreach ($array as $item) {
                    $hashedIndex = crc32($item->getKey());
                    $indexOfhTable = $hashedIndex % count($newHashMap);
                    array_push($newHashMap[$indexOfhTable], $item);
                }
            }
            $this->hashMap = $newHashMap;
        }
        return $newHashMap;
    }

}
$hm = new HashMap();
$hm->extendHashMap();