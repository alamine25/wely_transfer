<?php

namespace App\DataFixtures;

use App\Entity\Role;
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


        $role_admin_system = new Role();
        $role_admin_system->setLibelle("ROLE_SUPER_ADMIN");
        $manager->persist($role_admin_system);

        $role_admin = new Role();
        $role_admin->setLibelle("ROLE_ADMIN");
        $manager->persist($role_admin);

        $role_caissier = new Role();
        $role_caissier->setLibelle("ROLE_CAISSIER");
        $manager->persist($role_caissier);

        $this->addReference('role_admin_system',$role_admin_system);
        $this->addReference('role_admin',$role_admin);
        $this->addReference('role_caissier',$role_caissier);
        
        $roleAdmdinSystem = $this->getReference('role_admin_system');
        $roleAdmin = $this->getReference('role_admin');
        $roleAaissier = $this->getReference('role_caissier');

       $user = new User();
       $user->setPrenom("mohamadou lamine");
       $user->setNom("dia");
       $user->setEmail("laminedia25@hotmail.com");
       $user->setUsername("alamine");
       $user->setPassword($this->passwordEncoder->encodePassword($user, "alamine1994"));
       $user->setEtat("active");
       $user->setRoles(json_encode(array("ROLE_SUPER_ADMIN","ROLE_ADMIN","ROLE_CAISSIER")));
       $user->setRole($roleAdmdinSystem);

       $manager->persist($user);
       
        $manager->flush();
    }
}
