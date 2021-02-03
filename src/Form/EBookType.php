<?php

namespace App\Form;

use App\Entity\EBook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EBookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('picture')
            
            ->add('title',TextType::class, [
                'label' => 'Titre de l\'e-book : ',
            ])

            ->add('content', TextType::class, [
                'label' => 'Description : ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EBook::class,
        ]);
    }
}
