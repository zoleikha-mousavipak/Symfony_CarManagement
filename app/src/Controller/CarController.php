<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Laminas\Code\Generator\DocBlock\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/car')]
class CarController extends AbstractController
{
    #[Route('/list', name: 'app_car_list')]
    public function list(CarRepository $carRepository): Response
    {
        return $this->render('car/list.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
    }

    #[Route('/add', name: 'app_car_add')]
    public function addOld(Request $request): Response
    {
        $parameters = $request->request;

        $description = $parameters->get('description');
        $plate = $parameters->get('plate');   

        return $this->render('car/add.html.twig', [
            'Bezeichnung' => $description,
            'Kennzeien' => $plate
        ]);
    }

    // add with form
    #[Route('/add', name: 'app_car_add')]
    public function add(Request $request, CarRepository $carRepository): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $carRepository->add($car, true);
            return $this->redirectToRoute('app_car_list');
        }

        return $this->render('car/add.html.twig', [
            'carForm' => $form->createView()
        ]);
    }

    // update
    #[Route('/update{id}', name: 'app_car_update')]
    public function update(int $id, Request $request, CarRepository $carRepository): Response
    {
        $car = $carRepository->find($id);
        if(!$car instanceof Car) {
            dd("Auto nicht gefunden!");
        }
        $form = $this->createForm(CarType::class, $car); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $carRepository->add($car, true);
            return $this->redirectToRoute('app_car_list');
        }

        return $this->render('car/update.html.twig', [
            'carForm' => $form->createView()
        ]);
    }


      // delete
      #[Route('/delete{id}', name: 'app_car_delete')]
      public function delete(int $id, CarRepository $carRepository) {
        $car = $carRepository->find($id);
        if(!$car instanceof Car) {
            dd("Auto nicht gefunden!");
        }
        $carRepository->remove($car, true);

        return $this->redirectToRoute('app_car_list');

      }


}