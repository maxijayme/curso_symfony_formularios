<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Category;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('category', ChoiceType::class, [
            //     'label' => 'Categorías',
            //     'placeholder' => 'Selecciona una ...',
            //     'choices' =>[                
            //         'Lenguage' => ['PHP' => 'php'],
            //         'Framework' => [
            //             'Laravel' => 'laravel',
            //             'Symfony' => 'symfony'
            //         ]
            //     ]
            //     ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'placeholder' => 'Seleccione una...',
                'label' => 'Categorías'
            ])

            ->add('email', TextType::class, [
            'label' => 'Email',
            'help' => 'Debe contener mínimo 8 caracteres'
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Mensaje',
                'attr' => ['rows' => 5, 'class' => 'bg-light']
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enviar',
                'attr' => ['class' => 'btn btn-primary']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
