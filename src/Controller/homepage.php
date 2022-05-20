<?php
//
//namespace App\Controller;
//use App\Repository\CategoryRepository;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;
//
//class Homepage extends AbstractController
//{
///**
//* @Route("/")
//*/
//    public function category(CategoryRepository $categoryRepository): Response
//    {
//        $cat = $categoryRepository->findAll();
//        return new Response(sprintf('Dit is categorie'));
//    }
//
///**
//* @Route("/show", name="app_show")
//*/
//    function show(EntityManagerInterface $em)
//  {
//    $repository = $em->getRepository(Category::class);
//  /** @var Category $cat */
// $cat = $repository->findAll();
//return $this->render('home/index.html.twig');
//}
//
//        /**
//         * @Route("/category/{id}", name="app_cat")
//         */
//        function home(Category $category, PizzaRepository $pizzaRepository)
//        {
//
//            $pizza = $pizzaRepository->findBy(['category' => $category]);
//
//        }
//
//        /**
//        * @Route("/test")
//    */
//    public function homepage() : Response
//    {
//        return $this->render('home/index.html.twig',
//            [
//                'cat' => "test"
//            ]);
//    }
//
//};