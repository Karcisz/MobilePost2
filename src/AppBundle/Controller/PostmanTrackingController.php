<?php
namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostmanTrackingController extends FOSRestController {
	
	public function getPostmanTrackingsAction()
	{
		return $this->getDoctrine()->getRepository('AppBundle:PostmanTracking')->findAll();
	}
	public function getPostmanTrackingAction($id)
	{
		return $this->getDoctrine()->getRepository('AppBundle:PostmanTracking')->find($id);
	}
	
	public function postPostmanTrackingAction(Request $request)
	{
		try {
			$newPostmanTracking = $this->container->get('app.postman_tracking_form.handler')
				->post($request->request->all()
			);
			$routeOptions = array(
				'id' => $newPostmanTracking->getId(),
				'_format' => $request->get('_format')
			);
			return $this->routeRedirectView('api_2_get_postman_tracking', $routeOptions, Response::HTTP_CREATED);
		} catch (InvalidFormException $exception) {
			return array('form' => $exception->getForm());
		}
	}
}