<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Step;
use App\DataFixtures\GuideFixtures;

class StepFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $steps = json_decode(file_get_contents(implode(
            DIRECTORY_SEPARATOR,
            [
                __DIR__,
                'Data',
                'Steps.json'
            ]
        )), true);

        foreach ($steps as $step) {
            $newStep = new Step();
            $newStep->setCount($step['count']);
            $newStep->setStart($step['start']);
            $newStep->setEnd($step['end']);
            $newStep->setRecipeId($step['recipeId']);
            
            $newStep->setGuide($this->getReference(GuideFixtures::DEFAULTGUIDE));

            $manager->persist($newStep);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            GuideFixtures::class
        ];
    }
}
