<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Mauro Ribeiro
 * @since 2022-04-07
 */
class BaseController extends AbstractController
{
    protected $entity;

    /**
     * @var string
     */
    protected $formType;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $pluralEntity;

    /**
     * @var string
     */
    protected $entityType;

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository($this->entityType);
        $entities = $repository->findAll();

        return $this->render("{$this->path}/index.html.twig", array(
            $this->pluralEntity => $entities
        ));
    }

    public function createAction(Request $request)
    {
        $form = $this->createForm($this->formType, $this->entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entity = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($this->entity);
            $em->flush();

            return $this->redirectToRoute($this->path);
        }

        return $this->render("{$this->path}/create.html.twig", array(
            'form' => $form->createView(),
        ));
    }

    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->entity = $em->find($this->entityType, $request->get('id'));
        $form = $this->createForm($this->formType, $this->entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entity = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($this->entity);
            $em->flush();

            return $this->redirectToRoute($this->path);
        }

        return $this->render("{$this->path}/update.html.twig", array(
            'form' => $form->createView(),
        ));
    }

    public function deleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->entity = $em->find($this->entityType, $request->get('id'));

        $em->remove($this->entity);
        $em->flush();

        return $this->redirectToRoute($this->path);
    }

    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->entity = $em->find($this->entityType, $request->get('id'));

        return $this->render("{$this->path}/show.html.twig", array(
            $this->path => $this->entity,
        ));
    }

    public function deleteApiAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->entity = $em->find($this->entityType, $request->get('id'));

        $em->remove($this->entity);
        $em->flush();

        return new JsonResponse(array('msg' => 'Deletado com Sucesso'), 200);
    }
}
