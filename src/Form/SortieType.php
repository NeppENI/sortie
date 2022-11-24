<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_de_la_sortie', TextType::class, [
                'label' => 'Nom '
            ])
            ->add('date_sortie', DateType::class, [
                'html5' => true,
                'widget' => 'single_text',
            ])
            ->add('date_limite_inscription', DateType::class, [
                'html5' => true,
                'widget' => 'single_text',
            ])
            ->add('nombre_places')
            ->add('duree')
            ->add('description_info', TextareaType::class)
            ->add('campus', ChoiceType::class, [
                'choices' => [
                    'La-Roche Sur Yon' => 'La-Roche Sur Yon',
                    'Saint-Herblain' => 'Saint-Herblain',
                    'Chartres De Bretagne' => 'Chartres De Bretagne',
                    'Rennes' => 'Rennes'
                ],
                'multiple' => false
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('lieu', TextType::class, [
                'label' => 'Lieu'
            ])
            ->add('rue', TextType::class, [
                'label' => 'Rue'
            ])
            ->add('code_postal', TextType::class, [
                'label' => 'Code Postal'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
