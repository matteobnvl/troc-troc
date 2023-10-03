<?php

namespace App\Form;

use App\DBAL\Types\SexeType;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', TextType::class)
            ->add('password')
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Homme' => SexeType::MEN,
                    'Femme' => SexeType::WOMEN,
                    'Non précisé' => SexeType::NOT_PRECISE
                ]
            ])
            ->add('birthday', DateType::class)
            ->add('streetNumber', NumberType::class)
            ->add('streetName', TextType::class)
            ->add('postalCode', TextType::class)
            ->add('city', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => false
        ]);
    }
}