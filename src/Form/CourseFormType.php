<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Level;
use App\Entity\Approach;
use App\Entity\Language;
use App\Repository\UserRepository;
use App\Repository\LevelRepository;
use App\Repository\ApproachRepository;
use App\Repository\LanguageRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CourseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
        ->add('namecourse', TextType::class)
        ->add('shortDesc', TextareaType::class,[
            'data' => 'Description short ',
        ])
        ->add('description', TextareaType::class,[
            'data' => 'Description long ',
        ])
        ->add('priceActualHour', MoneyType::class)
        ->add('priceActualHourSansTVA', MoneyType::class)

        ->add('approach', EntityType::class,[
            'class' => Approach::class, 
            'query_builder' => function(ApproachRepository $er){
                return $er->createQueryBuilder('generic')->orderBy('generic.type');
            },
            'choice_label' => function ($x)
            {
                return strtoupper($x->getType());
            }
        ])

        ->add('language', EntityType::class,[
            'class' => Language::class, 
            'query_builder' => function(LanguageRepository $er){
                return $er->createQueryBuilder('generic')->orderBy('generic.language');
            },
            'choice_label' => function ($x)
            {
                return strtoupper($x->getLanguage());
            }
        ])

        ->add('level', EntityType::class,[
            'class' => Level::class, 
            'query_builder' => function(LevelRepository $er){
                return $er->createQueryBuilder('generic')->orderBy('generic.level');
            },
            'choice_label' => function ($x)
            {
                return strtoupper($x->getLevel());
            }
        ])

        ->add('user', EntityType::class,[
            'class' => User::class, 
            'query_builder' => function(UserRepository $er){
                return $er->createQueryBuilder('generic')->orderBy('generic.lastname');
            },
            'choice_label' => function ($x)
            {
                return strtoupper($x->getLastname());
            }
        ])
        ->add('coursePhoto', FileType::class, array ('label'=>"Upload photo course"));
      
        }
}
