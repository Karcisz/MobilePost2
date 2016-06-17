<?php

namespace AppBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;

use AppBundle\Model\PostmanTrackingInterface;
use AppBundle\Form\PostmanTrackingType;
use AppBundle\Exception\InvalidFormException;

class PostmanTrackingFormHandler implements PostmanTrackingFormHandlerInterface
{
    private $entityClass;
    private $repository;
    private $formFactory;
    private $formType;

    public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory, $formType)
    {
        $this->entityClass = $entityClass;
        $this->repository = $om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
        $this->formType = $formType;
    }

    public function post(array $parameters)
    {
        $postmanTracking = $this->createPostmanTracking();
        return $this->processForm($postmanTracking, $parameters, 'POST');
    }

    private function processForm(PostmanTrackingInterface $postmanTracking, array $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create($this->formType, $postmanTracking, array('method' => $method));
		
        $form->submit($parameters, 'PATCH' !== $method);
		
        if ($form->isValid()) {
            $note = $form->getData();
            $this->repository->save($postmanTracking);
            return $postmanTracking;
        }
		
        throw new InvalidFormException('Invalid submitted data', $form);
    }

    private function createPostmanTracking()
    {
        return new $this->entityClass();
    }
}