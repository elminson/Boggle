# Brief: Boggle Game
The board game Boggle consists of a grid of 4 x 4 letters, randomly arranged. Players attempt to find
words on the board by traversing from a start tile, in any direction.
Your task is to search the board to find the existence of a specific word, and return true or false. You can
model the board using any solution of your choosing.
You cannot reuse an already used tile. You may not traverse diagonally; only up, down, left and right
traversals are allowed.
* Example
````
A R T Y
E A O N
Y S T D
E C I C
````    
````
- arty => true
- tony => true
- notice => true
- year => true
- stand => false
- party => false
- stick => false
````

* Advisory

Your solution should consist of a multiple functions and/or objects. Feel free to use OOP principles to
design your solution.

The size of the grid should not be limited to 4 x 4. Your solution should cater to a grid of any size, however
you must validate that the grid is a square.

You can use the sample grid from above as a test case if you like.

The program should be able to be run via, e.g., php boggle.php “word” from the command line and
output the correct result ( true or false ).


* Files 

1)  `index.php`,`boggle.php` (Implementation) 
 
2) `class/Boggle.php` and `class/TrackTime.php` (Classes)

3) `tests/BoogleTest.php` (Tests Cases)

By default the method `show_track_time` becuase is not require but add it 
on order to test the solution performace      
        
a) run ``composer install``    


    #php boggle.php "tony"
    true
 ````
    I'm using the grid letter from the pdf
    A R T Y
    E A O N
    Y S T D
    E C I C
````
`php index.php` 
    
    Return all tests cases from the pdf
    
    arty => true
    tony => true
    notice => true
    year => true
    stand => false
    party => false
    stick => false 

In order to run the tests cases (first run `composer install`)
        
    #php /usr/bin/phpunit --no-configuration "BoggleGame/tests" --teamcity

Total Test cases 6

Total assertions 6

