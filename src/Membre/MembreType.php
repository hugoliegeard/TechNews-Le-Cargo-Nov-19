<?php
namespace App\Membre;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('prenom', TextType::class, [
                'label' => 'form.register.firstname',
                'attr'  => [
                    'placeholder' => 'form.placeholder.firstname'
                ]
            ])
            ->add('nom', TextType::class, [
                'label' => 'form.register.lastname',
                'attr'  => [
                    'placeholder' => 'form.placeholder.lastname'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'form.register.email',
                'attr'  => [
                    'placeholder' => 'form.placeholder.email'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'form.register.password',
                'attr'  => [
                    'placeholder' => 'form.placeholder.password'
                ]
            ])
            ->add('conditions', CheckboxType::class, [
                'label' => 'form.register.cgu',
                'attr'  => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'form.register.cgu.on',
                    'data-off' => 'form.register.cgu.off',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'form.register.submit'
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MembreRequest::class,
            'translation_domain' => 'forms'
        ]);
    }

}