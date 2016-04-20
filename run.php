<?php
require('vendor/autoload.php');

$dog = new Dog('Santa\'s Little Helper', rand(1, 5));
$cat = new Cat('Snowball II', rand(1, 5));

echo $dog->getCurrentName() . ' is currently ' . $dog->getAge() . ' years old' . PHP_EOL;

$dog->setSound('meow');

echo $dog->getCurrentName() . ' says ' . $dog->getSound() . '? ';
$dog->setSound();
echo 'Nah, ' . $dog->getCurrentName() . ' says ' . $dog->getSound() . '! Now ' . $dog->getCurrentName() . ' is ' . $dog->getAge() . '.' . PHP_EOL;


echo 'The cat\'s name is ' . $cat->getCurrentName() . '.';
$cat->setName('Garfield');

echo 'The cat\'s name has been changed to ' . $cat->getCurrentName() . '. The average length of the cat\'s name is ' . $cat->getAverageNameLength() . '.' . PHP_EOL;

echo PHP_EOL . PHP_EOL;