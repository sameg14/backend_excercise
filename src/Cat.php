<?php

class Cat extends Animal
{
    /**
     * Set the sound a cat makes
     * @param string $sound Sound a cat names
     * @return void
     */
    public function setSound($sound = 'meow')
    {
        $this->sound = $sound;
    }
}