<?php

namespace AppBundle\Form;

use FOS\UserBundle\Form\Type\ProfileFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends ProfileFormType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', 'text')
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('plainPassword', 'repeated', array(
                'required' => false,
                'translation_domain' => 'forms'
            ))
        ;
    }

    public function setDefaultOption(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('Default', 'Account')
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getfirstName()
    {
        return $this->getBlockPrefix();
    }
} 