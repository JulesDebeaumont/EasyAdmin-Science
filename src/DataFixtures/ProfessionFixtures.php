<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Profession;

class ProfessionFixtures extends Fixture
{

    public const LEATHERWORKING = 'profession-leathworking';

    public function load(ObjectManager $manager)
    {
        $professions = json_decode(file_get_contents(implode(
            DIRECTORY_SEPARATOR,
            [
                __DIR__,
                'Data',
                'Professions.json'
            ]
        )), true);

        foreach ($professions as $profession) {
            $newProfession = new Profession();
            $newProfession->setName($profession['name']);

            if ($profession['name'] === "Leatherworking") {
                $this->addReference(self::LEATHERWORKING, $newProfession);
            }

            $manager->persist($newProfession);
        }

        $manager->flush();
    }
}
