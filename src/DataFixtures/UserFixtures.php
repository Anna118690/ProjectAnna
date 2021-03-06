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

    $this-> passwordEncoder = $passwordEncoder;
    }
        
    
    public function load(ObjectManager $manager)
    {

        foreach ($this->getUserData() as [$firstname, $lastname, $email, $password, $skype, $telephone, $roles, $photo])
        {
            $user = new User();
            $user->setFirstname($firstname);
            $user->setLastName($lastname);
            $user->setEmail($email);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setSkype($skype);
            $user->setTelephone($telephone);
            $user->setRoles($roles);
            $user->setPhoto($photo);
            

            $manager->persist($user);
        }
        $manager->flush();
    }

    private function getUserData(): array
    {
        return [

            ['John', 'Wayne', 'jw@symf4.loc', 'passw', 'John5', '789456123', ['ROLE_ADMIN'], "user.jpg"],
            ['John', 'Wayne2', 'jw2@symf4.loc', 'passw', 'John6', '789486423', ['ROLE_ADMIN'], "user2.jpg"],
            ['John', 'Doe', 'jd@symf4.loc', 'passw', null, null, ['ROLE_USER'], "user3.jpg"]

        ];
    }
      

    
}