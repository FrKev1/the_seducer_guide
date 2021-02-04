<?php

namespace App\Form;

use App\Entity\EBook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class EBookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('title',TextType::class, [
                'label' => 'Titre de l\'e-book : ',
            ])

            ->add('description', TextareaType::class, [
                'required' => false,
                'label' => 'Description : ',
            ])

            ->add('content',  TextareaType::class, [
                'label' => 'Contenu : ',
            ])

            ->add('e_bookPhoto', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'download_uri' => false,
                'label' => 'Image'
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
