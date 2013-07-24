Code Challenges Resolved using PHP
===================================
This repository holds the following challenging algorithms coded in PHP:

## What do these algorithms teaches us?

#### [**SuperSum**](https://github.com/nilopc/NilPortugues_Code_Challenges_in_PHP/blob/master/SuperSum.php) 
  - Generation of all the possible cases before hand.  
  - All previous calculations must be stored in case they need to be reused later on.
  - Caching operations is **critical** to avoid useless loop cycles.
  - Calculatations are resolved by a bidirectional interaction between a Helper function and the main function. 
      - Helpder does the main operation (Sum) and handles caching.
      - Main function is used to call the Helper function again, with a reduced case.


