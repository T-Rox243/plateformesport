<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\AdresseType;
use AppBundle\Form\SportType;

class ClubType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('openingTime', TextType::class)
            ->add('closingTime', TextType::class)
            ->add('emailContact', TextType::class)
            ->add('phoneContact', TextType::class)
            ->add('sportComplex', TextType::class)
            ->add('sportComplexCity', TextType::class)
            ->add('adresse', AdresseType::class)
            ->add('sport', EntityType::class, array(
                'class' => 'AppBundle:Sport',
                'choice_label' => 'name',
                'multiple' => false
            ))
            ->add('send', SubmitType::class);
            // ->add('linkWebsite')
            // ->add('linkFede')
            // ->add('user')
            // ->add('sport')
            // ->add('adresse')
            // ->add('medias')
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Club'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_club';
    }


}
