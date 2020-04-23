<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Level;
use App\Entity\Course;
use App\Entity\Approach;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class CourseFixtures extends Fixture
{
  
    
    public function load(ObjectManager $manager)
    {

        foreach ($this->getCourseData() as [$namecourse, $shortDesc, $description,  $priceActualHour, $priceActualHourSansTVA, $coursePhoto ,  $language, $level, $type, $user])
        {
            $language = $manager->getRepository(Language::class)->find($language);
            $level = $manager->getRepository(Level::class)->find($level);
            $approach = $manager->getRepository(Approach::class)->find($type);
        
            $user = $manager->getRepository(User::class)->find($user);
            $course = new Course();
            $course->setNamecourse($namecourse);
            $course->setShortDesc($shortDesc);
            $course->setDescription($description);
            $course->setPriceActualHour($priceActualHour);
            $course->setPriceActualHourSansTVA($priceActualHourSansTVA);
            $course->setCoursePhoto($coursePhoto);
            $course->setApproach($approach);
          
            $course->setLevel($level);
            $course->setLanguage($language);
            $course->setUser($user);
            

            $manager->persist($course);
        }
        $manager->flush();
    }

    private function getCourseData()
    {
        return [

            ['English', 'English desc', 'English desc', 15, 12, 'photo1.jpg',4,11,3,18]
        ];
    }
      

    
}