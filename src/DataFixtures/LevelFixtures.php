<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Level;



class LevelFixtures extends Fixture
{



    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i<10; $i++)
        {
            $level = new Level;
            $level->setLevel("Level".$i);
            $level->setDescription("Description".$i);
            $manager->persist($level);

        }
        $manager->flush();




    }
   /*  public function load(ObjectManager $manager)
    {
        foreach ($this->getLevelData() as [$level, $description])
        {
            $level = new Level();
            $level->setLevel($level);
            $level->setDescription($description);
         
            $manager->persist($level);
        }

        $manager->flush();
    }

    private function getLevelData(): array
    {
        return [

            ['Beginner','Elementary'],
            ['Intermediate','Intermediate'],
            ['Advanced','Advanced']
          
        ];
    }  */
    
}










