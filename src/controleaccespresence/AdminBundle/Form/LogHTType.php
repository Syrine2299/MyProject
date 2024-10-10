<?php

namespace controleaccespresence\AdminBundle\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LogHTType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('temperature')
            ->add('humidite')
            ->add('dateHt', DateType::class, array(
                "widget" => 'single_text',
                "format" => 'yyyy-MM-dd',
                "data" => new \DateTime()
            ))
            ->add('salleServeur', EntityType::class,
                array('class'=>'controleaccespresenceAdminBundle:SalleServeur','choice_label'=>'Nom_salle_serveur'))
            ->add('nomDevice')


        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'controleaccespresenceAdminBundle\Entity\LogHT'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Admin_loght';
    }
}