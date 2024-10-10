<?php

namespace controleaccespresence\AdminBundle\Controller;
use controleaccespresence\AdminBundle\Entity\Affectation;
use controleaccespresence\AdminBundle\Form\AffectationType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * affectation controller.
 *
 */
class AffectationController extends Controller
{

    /**
     * Lists all affectation entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('controleaccespresenceAdminBundle:Affectation')->findAll();

        return $this->render('controleaccespresenceAdminBundle:affectation:index.html.twig', array(
            'entities'      => $entities,


        ));
    }
    /**
     * Creates a new affectation entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Affectation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'affectation bien enregistrée');
            return $this->redirect($this->generateUrl('affectation_show', array('id' => $entity->getId())));
        }

        return $this->render('controleaccespresenceAdminBundle:affectation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a contact entity.
     *
     * @param Affectation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Affectation $entity)
    {
        $form = $this->createForm(AffectationType::class, $entity, array(
            'action' => $this->generateUrl('affectation_create'),
            'method' => 'POST',
        ));

        $form->add('submit',SubmitType::class, array('label' => 'Ajouter',
            'attr' => array('class' => 'btn btn-info pull-left')));

        return $form;
    }

    /**
     * Displays a form to create a new affectation entity.
     *
     */
    public function newAction()
    {
        $entity = new Affectation();
        $form   = $this->createCreateForm($entity);

        return $this->render('controleaccespresenceAdminBundle:affectation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a affectation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:Affectation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find affectation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:affectation:show.html.twig', array(
            'entity'  => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing affectation entity.
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:Affectation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find affectation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('controleaccespresenceAdminBundle:affectation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a affectation entity.
     *
     * @param Affectation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Affectation $entity)
    {
        $form = $this->createForm(AffectationType::class, $entity, array(
            'action' => $this->generateUrl('affectation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Mettre à jour',
            'attr' => array('class' => 'btn btn-primary pull-right')));
        return $form;
    }
    /**
     * Edits an existing affectation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('controleaccespresenceAdminBundle:Affectation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find affectation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('info', 'affectation bien modifié');
            return $this->redirect($this->generateUrl('affectation_edit', array('id' => $id)));
        }

        return $this->render('controleaccespresenceAdminBundle:affectation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a affectation entity.
     *
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('controleaccespresenceAdminBundle:Affectation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find affectation entity.');
        }

        $em->remove($entity);
        $em->flush();
        //}

        return $this->redirect($this->generateUrl('affectation'));
    }

    /**
     * Creates a form to delete a affectation entity by id.
     *
     * @param int $id The entity id
     *
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('affectation_delete', array('id' => $id)))
            ->add('submit', SubmitType::class, array('label' => 'Oui',
                'attr' => array('class' => 'btn .btn-default pull-right')))->getForm()
            ;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function rechercheByTacheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('controleaccespresenceAdminBundle:Affectation')->findAll();
        if($request->isMethod('POST'))
        {

            $tache = $request->get('tache');
            die(var_dump($tache));

            $entities= $em->getRepository('controleaccespresenceAdminBundle:Affectation')->findBy(array(
                'tache' =>$tache,

            ));

        }
        return $this->render('controleaccespresenceAdminBundle:affectation:recherche.html.twig', array(
            'entities'      => $entities,

        ));
    }

}