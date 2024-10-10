<?php


namespace controleaccespresence\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalendarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class, ['label' => 'Salle Serveur '])
            ->add('start', DateTimeType::class, [
                'date_widget' => 'single_text',
                'label' => 'Date Entrée'
            ])
            ->add('end', DateTimeType::class, [
                'date_widget' => 'single_text',
                'label' => 'Date de sortie '
            ])
            ->add('description', TextType::class, ['label' => 'Employé '])
            ->add('backgroundColor', ColorType::class)
            ->add('borderColor', ColorType::class)
            ->add('textColor', ColorType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'controleaccespresenceAdminBundle\Entity\Calendar'
        ));
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'Admin_event';
    }
}
