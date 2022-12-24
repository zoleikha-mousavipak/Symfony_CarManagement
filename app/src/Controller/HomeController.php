<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Person;
use App\Service\PersonFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use \Symfony\Component\HttpFoundation\Response as SymResponse;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class HomeController extends AbstractController
{

    // Twig

    #public function __construct(Environment $twig)
    #{
     #   $this->twig = $twig;
    #}

    ##[Route(path:'/', name : 'app_home_index')]
    #public function index(): SymResponse
    #{
     #  $person = new Person('Zoleikha');
      # return new SymResponse($this->twig->render('home/index.html.twig', ['model' => $person]));
    # }

    // End twig
    



    #[Route(path:'/', name : 'app_home_index')]

     public function index(): SymResponse
     {
        $person = new Person('Zoleikha');
        return $this->render('home/index.html.twig', ['model' => $person]);
     }
    

    // Dependency injection
   # #[Route(path:'/', name : 'app_home_index')]
    #public function index(PersonFactory $personFactory ): SymResponse
     #{
       # $person = $personFactory->createPerson();
       # return $this->render('home/index.html.twig', ['model' => $person]);
    # }
     // End Dependency injection


     #[Route(path:'/overview', name : 'app_home_overview')]
     public function overview(): SymResponse
      {
         $person = new Person('Zoleikha');
          return $this->render('home/overview.html.twig');
      }

}

