<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = json_decode(file_get_contents(implode(
            DIRECTORY_SEPARATOR,
            [
                __DIR__,
                'Data',
                'Users.json'
            ]
        )), true);

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->setEmail($user['email']);

            $password = $this->encoder->encodePassword($newUser, $user['password']);
            $newUser->setPassword($password);

            if ($user['email'] === 'random@yahoo.fr') {
                $newUser->setRoles(['ROLE_ADMIN']);
            }

            $manager->persist($newUser);
        }

        $manager->flush();
    }
}
