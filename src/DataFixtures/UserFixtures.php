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
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i<5; $i++){
            $user = new User();
            $user->setEmail("user".$i."@gmail.com");
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user, 
                'lePassword' .$i
            ));


            $user->setFirstname("Anna" .$i);
            $user->setLastname("Laskowska" . $i);
            $user->setTelephone("371448899" .$i);
            $user->setSkype("Anna1234" . $i);
            $manager->persist($user);
        }
        $manager->flush();

    }
}

