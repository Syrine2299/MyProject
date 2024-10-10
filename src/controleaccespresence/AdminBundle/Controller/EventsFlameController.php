<?php

namespace controleaccespresence\AdminBundle\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use controleaccespresence\AdminBundle\Entity\EventsFlame;


/**
 * events flame controller.
 *
 */
class EventsFlameController extends Controller
{

    /**
     * Lists all eventsflame entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('controleaccespresenceAdminBundle:EventsFlame')->findAll();
        return $this->render('controleaccespresenceAdminBundle:eventsflame:index.html.twig', array(
            'entities' => $entities,

        ));
    }

    /**
     * Finds and displays a eventsflame entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:EventsFlame')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventsFlame entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:eventsflame:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a eventsflame entity.
     *
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('controleaccespresenceAdminBundle:EventsFlame')->find($id);


        $em->remove($entity);
        $em->flush();
        //}

        return $this->redirect($this->generateUrl('eventsflame'));
    }

    /**
     * Creates a form to delete a eventsflame entity by id.
     *
     * @param int $id The entity id
     *
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eventsflame_delete', array('id' => $id)))
            ->add('submit', SubmitType::class, array('label' => 'Oui',
                'attr' => array('class' => 'btn .btn-default pull-right')))->getForm()
            ;
    }


}