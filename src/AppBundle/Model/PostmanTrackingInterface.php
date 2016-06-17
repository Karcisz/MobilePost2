<?php

namespace AppBundle\Model;

interface PostmanTrackingInterface
{
    public function setLat($lat);
    public function getLat();
    public function setLang($lang);
    public function getLang();
    public function setDistance($distance);
    public function getDistance();
    public function setPostmanId($postmanId);
    public function getPostmanId();
}