<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Guide;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\ExpansionFixtures;
use App\DataFixtures\ProfessionFixtures;

class GuideFixtures extends Fixture implements DependentFixtureInterface
{

    public const DEFAULTGUIDE = "guide-wow";

    public function load(ObjectManager $manager)
    {
        $guides = json_decode(file_get_contents(implode(
            DIRECTORY_SEPARATOR,
            [
                __DIR__,
                'Data',
                'Guides.json'
            ]
        )), true);

        foreach ($guides as $guide) {
            $newGuide = new Guide();
            $newGuide->setName($guide['name']);
            $newGuide->setDescription($guide['description']);
            $newGuide->setUrl($guide['url']);
            
            if ($guide['name'] === "Wow Profession Guide") {
                $this->addReference(self::DEFAULTGUIDE, $newGuide);
            }

            $newGuide->setExpansion($this->getReference(ExpansionFixtures::SHADOWLANDS));
            $newGuide->setProfession($this->getReference(ProfessionFixtures::LEATHERWORKING));

            $manager->persist($newGuide);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ExpansionFixtures::class,
            ProfessionFixtures::class
        ];
    }
}
