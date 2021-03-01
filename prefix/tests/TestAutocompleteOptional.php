<?php declare(strict_types = 1);

namespace Autocomplete\Test;

final class TestAutocompleteOptional extends TestAutocomplete
{
    public function testAfterInsertAutoThenAutocomplete_RemoveAutocompleteReturnsTrue() : void
    {
        $this->autocomplete->insert('auto');
        $this->autocomplete->insert('autocomplete');
        $this->assertTrue($this->autocomplete->remove('autocomplete'));
    }

    public function testAfterInsertAutoThenAutocomplete_AndRemoveAutocomplete_GetMatchesCantFindAnyMatchesForAutocomplete() : void
    {
        $this->autocomplete->insert('auto');
        $this->autocomplete->insert('autocomplete');
        $this->autocomplete->remove('autocomplete');
        $this->assertEmpty($this->autocomplete->getMatches('autocomplete'));
    }

    public function testAfterInsertAutoThenAutocomplete_RemoveTrieReturnsFalse() : void
    {
        $this->autocomplete->insert('auto');
        $this->autocomplete->insert('autocomplete');
        $this->assertFalse($this->autocomplete->remove('trie'));
    }

    public function testAfterInsertAutoThenAutocomplete_AndRemoveTrie_GetMatchesCanFindAutoAndAutocomplete_BySearchForAuto() : void
    {
        $this->autocomplete->insert('auto');
        $this->autocomplete->insert('autocomplete');
        $this->autocomplete->remove('trie');
        $this->assertEmpty(
            array_diff(array('auto', 'autocomplete'), $this->autocomplete->getMatches('auto'))
        );
    }
}
