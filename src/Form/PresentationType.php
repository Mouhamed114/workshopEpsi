<?php

namespace App\Form;

use App\Entity\Presentation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PresentationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre : ',
                'label_attr' => ['class' => "block mt-2 font-contentfont font-medium"],
                'attr' => ['class' => "bg-gray-100 border-gray-50 text-sm rounded-lg block w-full p-2.5"],
            ])

            ->add('subtitle', TextType::class, [
                'label' => 'Sous-titre / accroche : ',
                'label_attr' => ['class' => "block mt-2 font-contentfont font-medium"],
                'attr' => ['class' => "bg-gray-100 border-gray-50 text-sm rounded-lg block w-full p-2.5"],
            ])

            ->add('image', TextType::class, [
                'label' => 'Lien image : ',
                'label_attr' => ['class' => "block mt-2 font-contentfont font-medium"],
                'attr' => ['class' => "bg-gray-100 border-gray-50 text-sm rounded-lg block w-full p-2.5"],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Presentation::class,
        ]);
    }
}
