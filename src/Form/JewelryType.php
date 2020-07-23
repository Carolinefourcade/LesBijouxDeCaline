<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Jewelry;
use App\Repository\CategoryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Url;

class JewelryType extends AbstractType
{
    private $categoryRepository;
    /**
     * JewelryType constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('picture', UrlType::class, ['label' => 'photo'])
            ->add('description', TextType::class, ['label' => 'description'])
            ->add('price', TextType::class, ['label' => 'prix'])
            ->add('identifier', TextType::class, ['label' => 'identifier'])
            ->add('category', ChoiceType::class, [
                'choices' => $this->getCategories()
            ])
        ;
    }
public function getCategories() {
        $categories = $this->categoryRepository->findAll();
        $choices = [];
    foreach ($categories as $category) {
        $choices[$category->getName()] = $category;
    }
    return $choices;
}
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jewelry::class,
        ]);
    }
}
