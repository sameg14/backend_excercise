<?php

/**
 * Class Dog contains canine functionality
 */
class Dog extends Animal
{
    /**
     * Set the sound a dog makes
     * @param string $sound Sound a dog makes
     * @return void
     */
    public function setSound($sound = 'bow-wow')
    {
        $this->sound = $sound;
    }
}