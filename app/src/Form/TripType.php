<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Trip;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startLocation', TextType::class, [
                'label' => 'Startort'
            ] )
            ->add('endLocation')
            ->add('startDateTime', DateTimeType::class, [
                'label' => 'Startzeitpunkt',
                'years' => $this->getAvailableYears(),
            ] )
            ->add('endDateTime')
            ->add('drivenkilometers')
            ->add('car', EntityType::class, [
                'class' => Car::class,
                'label' => 'Fahrzug',
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }

    private function getAvailableYears(): array
    {
        $actualYear = date('Y') - 1;
        $targetYear = $actualYear + 3;
        $returnArray = [];

        for ($i = $actualYear; $i < $targetYear; $i++) {
            $returnArray[] = $i;
        }
        return $returnArray;
    }
}
