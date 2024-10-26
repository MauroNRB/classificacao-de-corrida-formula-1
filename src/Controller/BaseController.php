<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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
    protected $entityType;

    public function indexAction(Request $request)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository($this->entityType);
            $entities = $repository->findAll();

            $arr = array();
            foreach($entities as $entity) {
                $arr[] = $entity->getArrayEntity();
            }

            return new JsonResponse($arr, 200);
        } catch (\Throwable $e) {
            return new JsonResponse(array(
                'msg' => 'Error interno'
            ), 500);
        }
    }

    public function showAction(Request $request)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $this->entity = $em->find($this->entityType, $request->get('id'));
            return new JsonResponse($this->entity->getArrayEntity(), 200);
        } catch (\Throwable $e) {
            return new JsonResponse(array(
                'msg' => 'Error interno'
            ), 500);
        }
    }

    public function createAction(Request $request)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $arr = json_decode($request->getContent(), true);

            $this->create($em, $arr);

            $em->persist($this->entity);
            $em->flush();

            return new JsonResponse(array('msg' => 'Criado com Sucesso'), 201);
        } catch (\Throwable $e) {
            return new JsonResponse(array(
                'msg' => 'Error interno'
            ), 500);
        }
    }

    public function updateAction(Request $request)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $this->entity = $em->find($this->entityType, $request->get('id'));
            $arr = json_decode($request->getContent(), true);

            $this->update($em, $arr);

            $em->persist($this->entity);
            $em->flush();

            return new JsonResponse(array('msg' => 'Atualizado com Sucesso'), 201);
        } catch (\Throwable $e) {
            return new JsonResponse(array(
                'msg' => 'Error interno'
            ), 500);
        }
    }
}
