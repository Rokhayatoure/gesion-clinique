<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // for ($i=0; $i <10 ; $i++) {
        //     $user= new User();
        //   $user->setnom('nom '.$i);
        //     $user->setPrenom('Prenom '.$i);
        //     $user->setEmail('user'.$i.'@example.com');
        //     $user->setRoles(["Role_user"]);
        //    $user->setPlainPassword('password');
        //     $manager->persist($user);

        // }

        $manager->flush();
    }
}
