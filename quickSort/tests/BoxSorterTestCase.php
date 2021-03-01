<?php declare(strict_types = 1);

namespace Logistics\Test;

use Logistics\BoxSorter;
use PHPUnit\Framework\TestCase;

abstract class BoxSorterTestCase extends TestCase
{
    protected const BOX_ID_KEY = 0;
    protected $boxSorter;

    protected function setUp() : void
    {
        $this->boxSorter = new BoxSorter();
    }

    protected function tearDown() : void
    {
        $this->boxSorter = null;
    }

    protected function assertBoxSort(array $boxes) : void
    {
        $this->assertEquals(
            $this->sortForTest($boxes),
            $this->boxSorter->sortItQuickly($boxes)
        );
    }

    protected function sortForTest(array $boxes) : array
    {
        // Separation
        $old = array();
        $new = array();
        foreach ($boxes as $index => $box) {
            $boxInfo = explode(' ', $box);
            if (is_numeric($boxInfo[self::BOX_ID_KEY])) {
                $new[$index] = $boxInfo;
            }
            else {
                $old[$index] = $boxInfo;
            }
        }

        // Sorting with built-in functions
        uasort($old, function ($oldBox1, $oldBox2) {
            return ($oldBox1[self::BOX_ID_KEY] <=> $oldBox2[self::BOX_ID_KEY]);
        });
        uasort($new, function ($newBox1, $newBox2) {
            return ($newBox1[self::BOX_ID_KEY] <=> $newBox2[self::BOX_ID_KEY]);
        });

        // Merge
        $sorted = array_merge($old, $new);
        foreach ($sorted as $index => &$box) {
            $box = implode(' ', $box);
        }

        return $sorted;
    }

    protected function getTestBoxes(string $type) : array
    {
        return json_decode(file_get_contents((dirname(__FILE__) . "/assets/{$type}_boxes.json")));
    }

    protected function getMethodDefinition(string $class, string $method) : string
    {
        $method    = new \ReflectionMethod($class, $method);
        $startLine = ($method->getStartLine() - 1);
        $length    = ($method->getEndLine() - $startLine);

        return implode('', array_slice(
            file($method->getFileName()),
            $startLine,
            $length
        ));
    }

    protected function isMethodUsesSpecificFunction(string $class, string $method, string $function) : bool
    {
        return (bool)preg_match(
            "/$function\(.*?\)/",
            $this->getMethodDefinition($class, $method)
        );
    }

    protected function isMethodUsesBuiltInSortFunctions(string $class, string $method) : bool
    {
        $sortFunctions = array(
            'array_multisort',
            'asort',
            'arsort',
            'krsort',
            'ksort',
            'natcasesort',
            'natsort',
            'rsort',
            'sort',
            'uasort',
            'uksort',
            'usort',
        );

        foreach ($sortFunctions as $sortFunction) {
            if ($this->isMethodUsesSpecificFunction($class, $method, $sortFunction)) {
                return true;
            }
        }

        return false;
    }
}
