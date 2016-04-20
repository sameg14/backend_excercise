<?php

/**
 * Class Animal is the supertype which children will inherit from and implement specific functionality as required
 */
abstract class Animal
{
    /**
     * What is this animal's name, with historical record
     * @var array
     */
    protected $names = [];

    /**
     * How old is this creature
     * @var int
     */
    protected $age;

    /**
     * The sound this animal makes
     * @var string
     */
    protected $sound;

    /**
     * How many times has this creature spoken?
     * @var int
     */
    protected $numTimesSpoken = 0;

    public function __construct($name, $age, $sound = null)
    {
        array_push($this->names, $name);
        $this->age = $age;

        if (!empty($sound)) {
            $this->sound = $sound;
        }
    }

    /**
     * Set the sound an animal makes
     * @param string $sound This particular animal's sound
     * @return void
     */
    abstract public function setSound($sound);

    /**
     * Make a particular animal noise
     * @return string
     */
    public function speak()
    {
        // Count the number of times they speak
        $this->numTimesSpoken++;

        return $this->getSound();
    }

    /**
     * Set a new name for this animal
     * @param string $name Name of the animal
     * @return $this
     */
    public function setName($name)
    {
        array_push($this->names, $name);
    }

    /**
     * Get the current name of the animal
     * @return string
     */
    public function getCurrentName()
    {
        return $this->names[sizeof($this->names) - 1];
    }

    /**
     * Ensure that 'age' increments by 1 every 2 times they speak
     * @return int
     */
    public function getAge()
    {
        if ($this->numTimesSpoken > 0) {
            $this->age += floor($this->numTimesSpoken / 2);
        }

        return $this->age;
    }

    /**
     * @return string
     */
    public function getSound()
    {
        return $this->sound;
    }

    /**
     * @return int
     */
    public function getNumTimesSpoken()
    {
        return $this->numTimesSpoken;
    }

    /**
     * Get the average length of the names ever given to any of your respective pets
     * @throws Exception
     * @return float
     */
    public function getAverageNameLength()
    {
        if (empty($this->names)) {
            throw new Exception('Names are required prior to computing average length');
        }

        $totalNumCharacters = 0;
        $numNames = count($this->names);

        foreach ($this->names as $name) {
            $totalNumCharacters += strlen($name);
        }

        return $totalNumCharacters / $numNames;
    }
}
