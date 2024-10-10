<?php

namespace controleaccespresence\AdminBundle\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use controleaccespresence\AdminBundle\Entity\LogHT;


/**
 * log h_t controller.
 *
 */
class LogHTController extends Controller
{

    /**
     * Lists all loght entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('controleaccespresenceAdminBundle:LogHT')->findAll();
        return $this->render('controleaccespresenceAdminBundle:loght:index.html.twig', array(
            'entities' => $entities,

        ));
    }

    /**
     * Finds and displays a loght entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:LogHT')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LogHT entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:loght:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a loght entity.
     *
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('controleaccespresenceAdminBundle:LogHT')->find($id);


        $em->remove($entity);
        $em->flush();
        //}

        return $this->redirect($this->generateUrl('loght'));
    }

    /**
     * Creates a form to delete a loght entity by id.
     *
     * @param int $id The entity id
     *
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('loght_delete', array('id' => $id)))
            ->add('submit', SubmitType::class, array('label' => 'Oui',
                'attr' => array('class' => 'btn .btn-default pull-right')))->getForm()
            ;
    }


}