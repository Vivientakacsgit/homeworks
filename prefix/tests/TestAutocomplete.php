<?php declare(strict_types = 1);

namespace Autocomplete\Test;

use PHPUnit\Framework\TestCase;
use Autocomplete\Autocomplete;

class TestAutocomplete extends TestCase
{
    protected $autocomplete;

    protected function setUp() : void
    {
        $this->autocomplete = new Autocomplete();
    }

    protected function tearDown() : void
    {
        $this->autocomplete = null;
    }

    public function testNewAutocompleteInstance_Create() : void
    {
        $this->assertInstanceOf(Autocomplete::class, $this->autocomplete);
    }

    public function testInsertReturnsVoid() : void
    {
        $this->assertNull($this->autocomplete->insert('autocomplete'));
    }

    public function testAfterOneInsert_GetMatchesCanReturnTheInsertedWord() : void
    {
        $this->autocomplete->insert('autocomplete');
        $this->assertNotEmpty($this->autocomplete->getMatches('autocomplete'));
    }

    public function testAfterInsertAuto_GetMatchesCantFindAutocomplete() : void
    {
        $this->autocomplete->insert('auto');
        $this->assertEmpty($this->autocomplete->getMatches('autocomplete'));
    }

    public function testAfterInsertAutoThenAutocomplete_GetMatchesCanFindTwoMatchesForAuto() : void
    {
        $this->autocomplete->insert('auto');
        $this->autocomplete->insert('autocomplete');
        $this->assertEmpty(
            array_diff(array('auto', 'autocomplete'), $this->autocomplete->getMatches('auto'))
        );
    }

    public function testAfterInsertAutocomplete_GetMatchesCanFindItByAutocomp() : void
    {
        $this->autocomplete->insert('autocomplete');
        $this->assertEmpty(
            array_diff(array('autocomplete'), $this->autocomplete->getMatches('autocomp'))
        );
    }

    public function testAfterInsertCaseSensitiveAutocomplete_GetMatchesCantFindIt_ByCaseInsensitiveAuto() : void
    {
        $this->autocomplete->insert('Autocomplete');
        $this->assertEmpty($this->autocomplete->getMatches('auto'));
    }

    public function testAfterInsertFromWordlist_GetMatchesFindEverythingFromSearchList() : void
    {
        $wordList = file((dirname(__FILE__) . '/assets/wordlist.txt'), FILE_IGNORE_NEW_LINES);
        foreach ($wordList as $word) {
            $this->autocomplete->insert($word);
        }

        $searchList = json_decode(file_get_contents(dirname(__FILE__) . '/assets/searchlist.json'));
        foreach ($searchList as $item) {
            $this->assertEmpty(
                array_diff($item->expect, $this->autocomplete->getMatches($item->term))
            );
        }
    }
}
