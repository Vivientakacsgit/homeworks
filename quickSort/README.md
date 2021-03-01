# Can a match box?

## Story

You are a proud employee of a highly respected logistics company. The boxes you're using need to be verified every 3 months in order to be sure they are safe to use.

Every box has a unique identifier and size information displayed on your list, split by a single space. The old boxes have letters in their identifiers, and the newer ones use only digits.

Your job is to `sort` them for the verification process in a FIFO (First-In, First-Out) order and to do it `quickly`.

## What are you going to learn?

- how to use the `Quicksort` algorithm
- what is the `Divide and Conquer` approach

## Tasks

1. Install the dependencies required by the project.
    - The `composer install` terminal command creates a `vendor` folder, which contains at least a `phpunit` directory and an `autoload.php` file.

2. Implement the `sortItQuickly()` method of the `BoxSorter` class, which sorts the boxes in the given array.
    - During the sorting, the `Quicksort` algorithm is in use
    - The method sorts the boxes by their `id`
    - The method sorts the older boxes first
    - The method returns an array of strings
    - The returned array has the same structure as the input does
    - The returned array has the same elements as the input

## General requirements

- The use of the built-in sort functions is not allowed

## Hints

- To verify your solution, you can run the `unit tests` in `tests/TestBoxSorter.php`.
- Examples:
  - Old box: "1w9 medium"
  - New box: "1671 large"

## Background materials

- <i class="far fa-video"></i> [Sorting Secret](https://youtu.be/pcJHkWwjNl4)
- <i class="far fa-video"></i> [Sorting Algorithms and Big O Notation](https://youtu.be/RGuJga2Gl_k)
- <i class="far fa-exclamation"></i> [Quicksort Algorithm](https://en.wikipedia.org/wiki/Quicksort)
- <i class="far fa-video"></i> [Quicksort Demonstration](https://youtu.be/SLauY6PpjW4)
