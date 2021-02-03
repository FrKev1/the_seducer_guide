<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('picture')

            ->add('title', TextType::class, [
                'label' => 'Titre de l\'article : ',
            ])

            ->add('content', TextType::class, [
                'label' => 'Description : ',
            ])

            ->add('publicationDate')
            ->add('lastUpdateDate')

            ->add('isPublished')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
