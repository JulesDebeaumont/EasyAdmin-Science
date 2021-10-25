<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Expansion;

class ExpansionFixtures extends Fixture
{

    public const SHADOWLANDS = 'expansion-shadowlands';

    public function load(ObjectManager $manager)
    {
        $expansions = json_decode(file_get_contents(implode(
            DIRECTORY_SEPARATOR,
            [
                __DIR__,
                'Data',
                'Expansions.json'
            ]
        )), true);

        foreach ($expansions as $expansion) {
            $newExpansion = new Expansion();
            $newExpansion->setName($expansion['name']);

            if ($expansion['name'] === "Shadowlands") {
                $this->addReference(self::SHADOWLANDS, $newExpansion);
            }

            $manager->persist($newExpansion);
        }

        $manager->flush();
    }
}
