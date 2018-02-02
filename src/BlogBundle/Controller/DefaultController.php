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
     * @Route("/operateurs", name="accueil_homepage")
     */
    public function indexAction(){

      $bar = true;
      $str = "TEST". ($bar ? 'true' : 'false') ."TEST";
      //echo $str;
      setcookie("siteLuciana","entrou",time());

      return $this->render('BlogBundle/front.html.twig',
          array('str' => $str));

	  /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

    }

    /**
     * @Route("/lepiano", name="lepiano_root") 
     */
    public function lepianoAction(){

      return $this->render('BlogBundle/generics.html.twig');

	  /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

    }


	/**
     * @Route("/cours", name="cours_root")
     */
    public function coursAction(){

      return $this->render('BlogBundle/elements.html.twig');

	  /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

    }

    /**
     * @Route("/villalobos", name="villalobos_root")
     */
    public function villaAction(){

      return $this->render('BlogBundle/villalobos.html.twig');

	  /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

    }

    /**
     * @Route("/cadences", name="cadences_root")
     */
    public function cadencesAction(){

      return $this->render('BlogBundle/cadences.html.twig');

	  /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

    }

    /**
     * @Route("/accords", name="accords_root")
     */
    public function accordsAction(){

      return $this->render('BlogBundle/accords.html.twig');

	  /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

    }

    /**
     * @Route("/rythme", name="rythme_root")
     */
    public function rythmeAction(){

      return $this->render('BlogBundle/rythme.html.twig');

	  /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

    }

    /**
     * @Route("/terminologie", name="terminologie_root")
     */
    public function terminologieAction(){

      return $this->render('BlogBundle/terminologie.html.twig');

	  /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);*/

    }



}
