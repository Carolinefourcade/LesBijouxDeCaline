<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Jewelry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Url;

class JewelryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('picture', UrlType::class, ['label' => 'photo'])
            ->add('description', TextType::class, ['label' => 'description'])
            ->add('price', TextType::class, ['label' => 'prix'])
            ->add('identifier', TextType::class, ['label' => 'identifier'])
            ->add('category', EntityType::class, [
                'class'=> Category::class,
                'choice_label'=> 'name',
                'label'=> 'Catégorie'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jewelry::class,
        ]);
    }
}
