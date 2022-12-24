<?php


namespace App\Form;

use App\Entity\Car;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("Description", TextType::class, [
                'label' => 'Bezeichnung',
                'required' => false
            ] )
            ->add("Plate", TextType::class, [
                'label' => 'Kennzeichen'
            ] )
            ->add("Submit", SubmitType::class, [
                'label' => 'Speichern'
            ] );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }

}