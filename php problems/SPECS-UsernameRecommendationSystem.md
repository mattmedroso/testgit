Username Recommendation System

Introduction

For very big websites, choosing a username can be a problem on registration as users occasionally signup for unavailable or previously used usernames. This can be source of frustration when a user simply wishes to signup but is unable to find an available username.

Your task is to write the fastest username recommendation program to quickly help a user find an available username.

Problem

You will be given an initial set of usernames. Write a CLI program that takes a username as input and outputs a recommendation. For example:

    $ php recommend.php clyde
    Input: clyde
    Recommendation: clyde2

The program should recommend the first available username. For example, there is already a registered username `clyde`. Then, the recommendation should be `clyde1`. If both `clyde` and `clyde1` are already registered, then the recommendation should be `clyde2`.

Alternatively, if `clyde` and `clyde2` are registered then the recommendation should be `clyde1`.

Scenarios

The following are key sample scenarios that demonstrate how the program should behave.

Scenario1

There is only one existing username and it has no number appended → recommended username has the first available number appended

Registered: clyde
Input: clyde
Output: clyde1

Scenario2

There are several existing usernames with numbers appended but the base username does not exist → the base username is recommended

Registered: clyde1, clyde2
Input: clyde
Output: clyde

Scenario3

The base name exists and along with several usernames with numbers appended → the next available free number is recommended

Registered: clyde, clyde2
Input: clyde
Output: clyde1

Scenario4

The provided username has a number appended but the base username does not exist → recommend the base username

Registered: clyde1, clyde2
Input: clyde2
Output: clyde

Scenario5

The provided username has a number appended and the base username exists → recommend the username with the next free number

Registered: clyde, clyde1, clyde2, clyde4
Input: clyde1
Output: clyde3

Submission

Your submission should include the following:

The entire source code including any compiled classes or built executables
A README file which should detail how to run your program and how it works

We should be able to run your submission. You may use any programming language, datastore, technology, or 3rd party code provided it does not directly solve this or a similar problem and said technologies are freely and publicly usable. 

Note: We say any programming language but using the following will expedite the evaluation process: PHP, Java, or JavaScript.

Evaluation

Submissions will be evaluated on a set of pre-determined test cases to determine correctness and performance.

Dataset

The list of initial usernames is available at http://goo.gl/XHm0aF.

