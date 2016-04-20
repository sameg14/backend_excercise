<?php

class AnimalTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Dog
     */
    protected $dog;

    public function setUp()
    {
        $this->dog = new Dog('Rover', 12);
    }

    public function testAnimalAgeIncrementsCorrectlyAfterSpeakingForADeterminedNumberOfTimes()
    {
        $this->dog->speak();
        $this->dog->speak();
        $this->dog->speak();
        $this->dog->speak();
        $this->dog->speak();

        $this->assertEquals(14, $this->dog->getAge(), 'Age calculation business logic is incorrect');
    }

    public function testAnimalAverageNameLengthIsAccurateAfterSettingADeterminedSetOfNames()
    {
        $this->dog->setName('Clifford');

        $this->assertEquals(6.5, $this->dog->getAverageNameLength(),
            'Average name length calculation is not as expected'
        );
    }
}
