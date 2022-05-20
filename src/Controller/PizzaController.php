<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Pizza;
use App\Form\PizzaFormType;
use App\Repository\CategoryRepository;
use App\Repository\OrderRepository;
use App\Repository\PizzaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;

class PizzaController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(EntityManagerInterface $em)
    {

        $repository = $em->getRepository(Category::class);

        $category = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'categories' => $category,
        ]);
    }

    /**
     * @Route("/pizza/{id}", name="app_cat" )
     */
    public function show(Category $category, PizzaRepository $pizzaRepository)
    {
        $pizza = $pizzaRepository->findBy(["category" => $category]);




        return $this->render('pizza/show.html.twig', [
            'pizzas' => $pizza,
            'categories' => $category,

        ]);
    }

    /**
     * @Route("/form" )
     */
    public function new(EntityManagerInterface $em, Request $request)
    {

        $form = $this->createForm(PizzaFormType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $order = new Order();
            $order->setFname($data['fname']);
            $order->setSname($data['sname']);
            $order->setAddress($data['address']);
            $order->setCity($data['city']);
            $order->setZipcode($data['zipcode']);
            $order->setStatus($data['status']);

            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('home/index.html.twig');
        }

        return $this->render('pizza/form.html.twig', [
           'pizzaForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/list" )
     */
    public function list(OrderRepository $orderRepository)
    {
        $order = $orderRepository->findAll();

        return $this->render('pizza/list.html.twig', [
            'orders' => $order,
        ]);
    }
}