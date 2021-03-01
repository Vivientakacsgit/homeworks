<?php declare(strict_types = 1);

namespace Logistics\Test;

use Logistics\BoxSorter;

final class TestBoxSorter extends BoxSorterTestCase
{
    public function testNewBoxSorterInstance_Create() : void
    {
        $this->assertInstanceOf(BoxSorter::class, $this->boxSorter);
    }

    public function testBoxSorter_WithEmptyArray() : void
    {
        $this->assertEquals(array(), $this->boxSorter->sortItQuickly(array()));
    }

    public function testBoxSorter_WithOneBox() : void
    {
        $this->assertEquals(array('123 small'), $this->boxSorter->sortItQuickly(array('123 small')));
    }

    public function testBoxSorter_WithMultipleMixedBoxes() : void
    {
        $this->assertBoxSort($this->getTestBoxes('mixed'));
    }

    public function testBoxSorter_WithMultipleOldBoxes() : void
    {
        $this->assertBoxSort($this->getTestBoxes('old'));
    }

    public function testBoxSorter_WithMultipleNewBoxes() : void
    {
        $this->assertBoxSort($this->getTestBoxes('new'));
    }

    public function testIfBoxSorter_UsesBuiltInSortFunctions() : void
    {
        $this->assertFalse(
            $this->isMethodUsesBuiltInSortFunctions(BoxSorter::class, 'sortItQuickly')
        );
    }
}
