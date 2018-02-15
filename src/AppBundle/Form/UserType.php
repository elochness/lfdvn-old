<?php

namespace AppBundle\Form;


use AppBundle\Form\PurchaseItemType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('lastname',     TextType::class,	array('required'   => true, 'label' => 'Lastname'))
        ->add('firstname',      TextType::class, array('required'   => true, 'label' => 'Firstname'))
        ->add('email',     EmailType::class,	array('required'   => true, 'label' => 'Email'))
        ->add('cellphone',     NumberType::class,	array('required'   => true, 'label' => 'Telephone'))
        ->add('username',     TextType::class,	array('required'   => true, 'label' => 'label.username'))
        ->add('password',     PasswordType::class,	array('required'   => true, 'label' => 'label.password'))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
