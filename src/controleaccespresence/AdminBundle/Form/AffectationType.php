<?php


namespace controleaccespresence\AdminBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffectationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('salleServeur', EntityType::class,
                array('class'=>'controleaccespresenceAdminBundle:SalleServeur','choice_label'=>'Nom_salle_serveur'))

            ->add('employe', EntityType::class, array(
                'choice_label' => function ($employe) {
                    return $employe->getPrenom() . ' ' . $employe->getNom();
                },
                'class' => 'controleaccespresenceAdminBundle:Employe',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.id', 'ASC');
                },
            ))
            ->add('tache')

            ->add('dateEntree', DateTimeType::class, [
                'date_widget' => 'single_text'
            ])
            ->add('dateSortie', DateTimeType::class, [
                'date_widget' => 'single_text'
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'controleaccespresenceAdminBundle\Entity\Affectation'
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
