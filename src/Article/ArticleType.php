<?php

namespace App\Article;

use App\Article\EventListener\ArticleTypeSlugFieldSubscriber;
use App\Entity\Categorie;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            # Champ TITRE
            ->add('titre', TextType::class, [
                'required' => true,
                'label' => "Titre de l'article",
                'attr' => [
                    'placeholder' => "Titre de l'Article"
                ]
            ])
            # Champ CATEGORIE
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'expanded' => false,
                'multiple' => false,
                'label' => false
            ])
            # Champ CONTENU
            ->add('contenu', CKEditorType::class, [
                'required' => true,
                'label' => false,
                'config' => [
                    'toolbar' => 'standard'
                ]
            ])
            # Champ FEATUREDIMAGE
            ->add('featuredimage', FileType::class, [
                'required' => true,
                'label' => false,
                'attr' => [
                    'class' => 'dropify',
                    'data-default-file' => $options['image_url']
                ]
            ])
            # Champs SPECIAL & SPOTLIGHT
            ->add('special', CheckboxType::class, [
                'required' => false,
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'Oui',
                    'data-off' => 'Non'
                ]
            ])
            ->add('spotlight', CheckboxType::class, [
                'required' => false,
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'Oui',
                    'data-off' => 'Non'
                ]
            ])
            # Bouton Submit
            ->add('submit', SubmitType::class, [
                'label' => 'Publier mon Article'
            ])

            ->addEventSubscriber(new ArticleTypeSlugFieldSubscriber())
        ;

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            #'data_class' => Article::class
            'data_class' => ArticleRequest::class,
            'image_url' => null
        ]);
    }

}