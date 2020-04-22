<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Language;



class LanguageFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i<3; $i++)
        {
            $language = new Language;
            $language->setLanguage("Language".$i);
            $language->setDescription("Description".$i);
            $manager->persist($language);

        }
        $manager->flush();




    }
}







   /*  public function load(ObjectManager $manager)
    {
        foreach($this->LanguageData() as [$language, $description])
        {
            $language = new Language();
            $language->setLanguage($language);
            $language->setDescription($description);
         
            $manager->persist($language);
        }

        $manager->flush();
    }

    private function LanguageData() 
    {
        return [

            ['English','English modern'],
            ['French','French Modern'],
            ['Dutch','Dutch Modern']
          
        ];
    } */


