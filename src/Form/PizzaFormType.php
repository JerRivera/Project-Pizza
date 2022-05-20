<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PizzaFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fname')
            ->add('sname')
            ->add('address')
            ->add('city')
            ->add('zipcode')
            ->add('status')
            ->add('pizza')
            ->add('size')
        ;
    }

}