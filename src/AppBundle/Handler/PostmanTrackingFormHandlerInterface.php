<?php

namespace AppBundle\Handler;

use AppBundle\Model\PostmanTrackingInterface;

interface PostmanTrackingFormHandlerInterface
{
    public function post(array $parameters);
}