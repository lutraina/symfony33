<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{

    function __construct() {
      //print "In BaseClass constructor\n";
    }


    /**
     * @Route("/blog")
     */
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    /**
     * @Route("/operateurs")
     */
    public function testOperateurs(){

      $bar = true;
      $str = "TEST". ($bar ? 'true' : 'false') ."TEST";
      //echo $str;
      setcookie("siteLuciana","entrou",time());

      return $this->render('BlogBundle/elements.html.twig',
          array('str' => $str));

	  /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

    }

}
