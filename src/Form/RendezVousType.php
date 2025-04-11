<?php

namespace App\Form;

use App\Entity\Patient;
use App\Entity\RendezVous;
use App\Enum\Specialite;
use App\Enum\Status;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType; // Importation correcte
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Date et heure du rendez-vous',
            ])
            ->add('Motif', TextType::class, [ // Utilisation de TextType de Symfony
                'label' => 'Motif du rendez-vous',
            ])
            ->add('Status', ChoiceType::class, [
                'choices' => Status::cases(),
                'choice_label' => fn(Status $status) => match ($status) {
                    Status::EN_ATTENTE => 'En attente',
                    Status::CONFIRMÉ => 'Confirmé',
                    Status::ANNULÉ => 'Annulé',
                },
                'label' => 'Statut',
            ])
            ->add('Specialite', ChoiceType::class, [
                'choices' => Specialite::cases(),
                'choice_label' => fn(Specialite $specialite) => match ($specialite) {
                    Specialite::CARDIOLOGIE => 'Cardiologie',
                    Specialite::Dentiste => 'Dentiste',
                    Specialite::Diabetique => 'Diabétique',
                },
                'label' => 'Spécialité',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => ['class' => 'btn btn-primary']
            ])
        ;
    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
