<?php
// check_around.php for life in /home/levy_a/projet/Semestre1/life/levy_a
// 
// Made by Alexandre LEVY
// Login   <levy_a@etna-alternance.net>
// 
// Started on  Mon Dec  2 14:08:46 2013 Alexandre LEVY
// Last update Tue Dec  3 11:45:24 2013 Alexandre LEVY
//

function check_around(&$grid, $i, $j)
{
  $a = $j - 1;

  while ($a <= ($j + 1))
    {
      $b = $i - 1;
      while ($b <= ($i +1))
	{
	  $result += $grid[$a][$b];
	  $b++;
	}
      $a++;
    }
  $result -= $grid[$j][$i];
  return ($result);
}
