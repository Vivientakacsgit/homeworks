# Autocomplete

## Story

Autocomplete can be a huge help or a major setback, depending on your personal opinion.
Nonetheless, when it comes to software, it's considered one of the most requested features.

Your task is to create an `Autocomplete app` using the `Trie` data structure.

## What are you going to learn?

- implement `Trie` data structure
- build an `autocomplete` system using `Trie`

## Tasks

1. Install the dependencies required by the project.
    - The `composer install` terminal command creates a `vendor` folder, which contains at least a `phpunit` directory and an `autoload.php` file.

2. Implement the `insert()` method of the `Trie` class, which inserts the given word into the trie.
    - The `insert()` method of the `Trie` class inserts the given word into the trie
    - The method returns void
    - Every character of the given word is inserted as an instance of the `TrieNode` class

3. Implement the `getMatches()` method of the `Autocomplete` class, which returns the possible complete words starting with the given prefix.
    - The method returns an array of strings
    - Every item in the returned array is a valid word
    - Every item in the returned array is starting with the given prefix
    - The method searches with case sensitivity

4. [OPTIONAL] Implement the `remove()` method of the `Trie` class, which deletes the given word from the trie.
    - The `remove()` method of the `Trie` class deletes the given word from the trie
    - The method returns a boolean value; `true` if deletion happened, `false` otherwise

## General requirements

None

## Hints

- To verify your solution, you can run the `unit tests` in `tests/TestAutocomplete.php` (for the optional tasks, in `tests/TestAutocompleteOptional.php`).


## Background materials

- <i class="far fa-exclamation"></i> [Trees](project/curriculum/materials/competencies/data-structures-graphs/trees.md.html)
- <i class="far fa-video"></i> [Applied CS Skills - Trees](https://youtu.be/rP6wjhNqwMc)
- <i class="far fa-exclamation"></i> [Trie](https://en.wikipedia.org/wiki/Trie)
- <i class="far fa-video"></i> [Applied CS Skills - Tries](https://youtu.be/kMt9Y5fv4Ug)
