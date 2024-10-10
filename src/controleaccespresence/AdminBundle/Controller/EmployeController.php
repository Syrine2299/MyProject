<?php

namespace controleaccespresence\AdminBundle\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use controleaccespresence\AdminBundle\Form\EmployeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use controleaccespresence\AdminBundle\Entity\Employe;


/**
 * employe controller.
 *
 */
class EmployeController extends Controller
{

    /**
     * Lists all employe entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('controleaccespresenceAdminBundle:Employe')->findAll();
        return $this->render('controleaccespresenceAdminBundle:employe:index.html.twig', array(
            'entities'      => $entities,


        ));
    }
    /**
     * Creates a new employe entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new employe();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'employe bien enregistrée');
            return $this->redirect($this->generateUrl('employes_show', array('id' => $entity->getId())));
        }

        return $this->render('controleaccespresenceAdminBundle:employe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a contact entity.
     *
     * @param employe $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(employe $entity)
    {
        $form = $this->createForm(EmployeType::class, $entity, array(
            'action' => $this->generateUrl('employes_create'),
            'method' => 'POST',
        ));

        $form->add('submit',SubmitType::class, array('label' => 'Ajouter',
            'attr' => array('class' => 'btn btn-info pull-left')));

        return $form;
    }

    /**
     * Displays a form to create a new employe entity.
     *
     */
    public function newAction()
    {
        $entity = new employe();
        $form   = $this->createCreateForm($entity);

        return $this->render('controleaccespresenceAdminBundle:employe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a employe entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:Employe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find employe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:employe:show.html.twig', array(
            'entity'  => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing employe entity.
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:Employe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find employe entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:employe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a employe entity.
     *
     * @param employe $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(employe $entity)
    {
        $form = $this->createForm(EmployeType::class, $entity, array(
            'action' => $this->generateUrl('employes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Mettre à jour',
            'attr' => array('class' => 'btn btn-primary pull-right')));
        return $form;
    }
    /**
     * Edits an existing employe entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:Employe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find employe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'employe bien modifié');
            return $this->redirect($this->generateUrl('employes_edit', array('id' => $id)));
        }

        return $this->render('controleaccespresenceAdminBundle:employe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a employe entity.
     *
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('controleaccespresenceAdminBundle:Employe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find employe entity.');
        }

        $em->remove($entity);
        $em->flush();
        //}

        return $this->redirect($this->generateUrl('employes'));
    }

    /**
     * Creates a form to delete a employe entity by id.
     *
     * @param int $id The entity id
     *
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employes_delete', array('id' => $id)))
            ->add('submit', SubmitType::class, array('label' => 'Oui',
                'attr' => array('class' => 'btn .btn-default pull-right')))->getForm()
            ;
    }


}