<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
       $user = new User();
       
       $user->setUsername("alamine");
       $user->setPassword($this->passwordEncoder->encodePassword($user, "alamine1994"));

       $user->setRoles(json_encode(array("SUPER_ADMIN")));

       $manager->persist($user);
       
        $manager->flush();
    }
}
