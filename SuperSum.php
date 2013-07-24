<?php
namespace NilPortugues\CodeChallenges;

/**
 * =================================================================================================    
 * Problem
 * =================================================================================================    
 * SuperSum is a function defined as: 
 * SuperSum(0 , n) = n, for all positive n.
 * SuperSum(k , n) = SuperSum(k-1 , 1) + SuperSum(k-1 , 2) + ... + SuperSum(k-1 , n), for all positive k, n.
 *
 * Given k and n, return the value for SuperSum(k , n).
 *
 * =================================================================================================    
 * Examples
 * =================================================================================================    
 * SuperSum(1,3) = 6
 * SuperSum(2,3) = 10
 **************************************************************************************************/

function SuperSum($k, $n, &$calculated = array(), &$cases = array()) 
{
  assert( is_numeric($k) && $k>=0 );
	assert( is_numeric($n) && $n>=0 );

	if(empty($cases))
	{
		for($i=1; $i<$k; ++$i)
		{
			for($j=1; $j<$n; ++$j)
			{
				$cases["$i,$j"] = 0;
			}
		}	
	}
	return SuperSumHelper($k,$n,$cases,$calculated);
}

function SuperSumHelper($k, $n,&$cases,&$calculated)
{	
	if ($k==0)
	{
		return $n;
	}
	else
	{
		$tmp = 0;
		for($i=1; $i<=$n; ++$i)
		{
			if (empty($cases[($k-1).",".$i]))
			{
        //Check if cached
				if(!empty($calculated[($k-1).",".$i]))
				{
					$tmp += $calculated[($k-1).",".$i];
				}
        //Not cached. Calculate and cache.
				else{
					$cases[($k-1).",".$i] = SuperSum($k-1,$i,$calculated);

					$tmp += $cases[($k-1).",".$i];
          
          //Add to cache. Important to notice it's $k and not $k-1 we're saving.
					$calculated[($k).",".$i] = $tmp;
				}
			}
		}
		return $tmp;
	}
}




echo PHP_EOL;
echo 'SuperSum(2,3) = '; 
echo SuperSum(2,3);
echo PHP_EOL;
echo 'SuperSum(10,10) = ';
echo SuperSum(10,10);
echo PHP_EOL;
echo 'SuperSum(40,40) = ';
echo SuperSum(40,40);
echo PHP_EOL;
