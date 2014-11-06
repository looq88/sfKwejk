<?php

namespace Kwejk\MemsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RatingController extends Controller
{
    public function newAction()
    {
        return $this->render('KwejkMemsBundle:Rating:new.html.twig', array(
                // ...
            ));    }

    public function editAction($id)
    {
        return $this->render('KwejkMemsBundle:Rating:edit.html.twig', array(
                // ...
            ));    }

}
