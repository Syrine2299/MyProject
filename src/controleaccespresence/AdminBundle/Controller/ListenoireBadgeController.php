<?php

namespace controleaccespresence\AdminBundle\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use controleaccespresence\AdminBundle\Entity\ListenoireBadge;


/**
 * listenoireBadge controller.
 *
 */
class ListenoireBadgeController extends Controller
{

    /**
     * Lists all listenoirebadge entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('controleaccespresenceAdminBundle:ListenoireBadge')->findAll();
        return $this->render('controleaccespresenceAdminBundle:listenoirebadge:index.html.twig', array(
            'entities' => $entities,

        ));
    }

        /**
         * Finds and displays a listenoirebadge entity.
         *
         */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:ListenoireBadge')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ListenoireBadge entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:listenoirebadge:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a listenoirebadge entity.
     *
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        //$form = $this->createDeleteForm($idListenoireBadge);
        //$form->handleRequest($request);

        // if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('controleaccespresenceAdminBundle:ListenoireBadge')->find($id);

        // if (!$entity) {
        //throw $this->createNotFoundException('Unable to find listenoirebadge entity.');
        //}

        $em->remove($entity);
        $em->flush();
        //}

        return $this->redirect($this->generateUrl('listenoirebadge'));
    }

    /**
     * Creates a form to delete a listenoirebadge entity by id.
     *
     * @param int $id The entity id
     *
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('listenoirebadge_delete', array('id' => $id)))
            ->add('submit', SubmitType::class, array('label' => 'Oui',
                'attr' => array('class' => 'btn .btn-default pull-right')))->getForm()
            ;
    }


}