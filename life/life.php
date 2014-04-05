#!/usr/bin/env php
<?php
// life.php for life in /home/levy_a/projet/Semestre1/life/levy_a
// 
// Made by Alexandre LEVY
// Login   <levy_a@etna-alternance.net>
// 
// Started on  Mon Dec  2 13:36:03 2013 Alexandre LEVY
// Last update Wed Dec  4 10:55:35 2013 Alexandre LEVY
//

require "check_around.php";

define("X", 20);
define("Y", 20);

system("clear");
run();

// Fonction principale du programme, c'est une boucle infinie.
function run() {
  $grid = init_grid(); // On remplit un tableau à deux dimensions de valeurs aléatoires comprises entre 0 et 1

  while (true) {
    evolve($grid); // On fait évoluer les cellules.
    draw_grid($grid); // On dessine l'état des cellules
    usleep(200000); // On coupe le programme pendant 0,2 secondes pour ne pas saturer le processeur
    system("clear"); // On efface le terminal
  }
}

function init_grid() {
  $grid = array();

  for ($j = 0; $j < Y; ++$j) {
    $grid[$j] = array();
    for ($i = 0; $i < X; ++$i) {
      $grid[$j][$i] = rand(0, 1);
    }
  }
  return $grid;
}

function draw_grid($grid) {
  for ($j = 0; $j < Y; ++$j) {
    for ($i = 0; $i < X; ++$i) {
      if ($grid[$j][$i] == 0)
	echo " ";
      else
	echo "\033[34;40m*\033[0m";
    }
    echo "\n";
  }
}

function evolve(&$grid)
{
  for ($j = 0; $j < Y; ++$j) {
    for ($i = 0; $i < X; ++$i) {
      if ($grid[$j][$i] == 0)
	{
	  if (check_around($grid, $i, $j) == 3)
	    $grid2[$j][$i] = 1;
	  else
	    $grid2[$j][$i] = 0;
	}
      else
	{
	  if (check_around($grid, $i, $j) < 2 || check_around($grid, $i, $j) > 3)
	    $grid2[$j][$i] = 0;
	  else
	    $grid2[$j][$i] = $grid[$j][$i];
	}
    }
  }
  $grid = $grid2;
}