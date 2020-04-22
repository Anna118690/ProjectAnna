<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Approach;


class ApproachFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i<2; $i++)
        {
            $approach = new Approach;
            $approach->setType("Approach".$i);
            $approach->setDescription("Description".$i);
            $manager->persist($approach);

        }
        $manager->flush();



    }
}

