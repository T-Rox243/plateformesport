<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Form\AdresseType;
 

class EvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('startDate', DateType::class, array(
                     'widget' => 'single_text',
                )
            )
            ->add('endDate', DateType::class, array(
                     'widget' => 'single_text',
                )
            )
            ->add('typeEvent', ChoiceType::class, array(
                                                        'choices'  => array(
                                                            'Competition' => 'Competition',
                                                            'Stage Découverte' => 'Stage Découverte',
                                                            'Stage Pratique' => 'Stage Pratique',
                                                            'Forum' => 'Forum',
                                                            'Autre' => 'Other',
                                                        )
                                                    )
            )
            ->add('nbMinVolunteer', TextType::class)
            ->add('nbMaxVolunteer', TextType::class)
            ->add('adresse', AdresseType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Evenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_evenement';
    }


}
