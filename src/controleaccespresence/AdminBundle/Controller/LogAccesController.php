<?php

namespace controleaccespresence\AdminBundle\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use controleaccespresence\AdminBundle\Entity\LogAcces;


/**
 * log acces controller.
 *
 */
class LogAccesController extends Controller
{

    /**
     * Lists all logacces entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('controleaccespresenceAdminBundle:LogAcces')->findAll();
        return $this->render('controleaccespresenceAdminBundle:logacces:index.html.twig', array(
            'entities' => $entities,

        ));
    }

    /**
     * Finds and displays a logacces entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:LogAcces')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LogAcces entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:logacces:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a logacces entity.
     *
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        //$form = $this->createDeleteForm($idLogAcces);
        //$form->handleRequest($request);

        // if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('controleaccespresenceAdminBundle:LogAcces')->find($id);

        // if (!$entity) {
        //throw $this->createNotFoundException('Unable to find logacces entity.');
        //}

        $em->remove($entity);
        $em->flush();
        //}

        return $this->redirect($this->generateUrl('logacces'));
    }

    /**
     * Creates a form to delete a logacces entity by id.
     *
     * @param int $id The entity id
     *
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('logacces_delete', array('id' => $id)))
            ->add('submit', SubmitType::class, array('label' => 'Oui',
                'attr' => array('class' => 'btn .btn-default pull-right')))->getForm()
            ;
    }


}