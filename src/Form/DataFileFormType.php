<?php

namespace App\Form;

use App\Entity\Course;
use App\Repository\CourseRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DataFileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
        ->add('course', EntityType::class,[
            'class' => Course::class, 
            'query_builder' => function(CourseRepository $er){
                return $er->createQueryBuilder('generic')->orderBy('generic.namecourse');
            },
            'choice_label' => function ($x)
            {
                return strtoupper($x->getNamecourse());
            }
        ]) 
        ->add('name', TextType::class)
        ->add('description', TextType::class)
        ->add('link', FileType::class, array ('label'=>"Upload DataFile as PDF"));
    }
}
