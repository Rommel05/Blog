<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Expr\Empty_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\isEmpty;

class PageController extends AbstractController
{
    #[Route('/page', name: 'app_page')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/', name: 'inicio')]
    public function inicio(): Response
    {
        return new Response('<h1>Bienvenido a la pagina principal</h1>');
    }

    /*#[Route('/newUser', name: 'New_User')]
    public function newUser(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $name = $_GET['username'] ?? null;
        $password = $_GET['password'] ?? null;
        $description = $_GET['description'] ?? null;
        $user = new User();
        $user->setUsername($name);
        $user->setPassword($password);
        $user->setDescription($description);

        if (!$name || !$password || !$description) {
            return new Response("Faltan datos para dar de alta a este usuario");
        } else {
            try {
                $entityManager->persist($user);
                $entityManager->flush();
                return new Response("Se ha añadido el usuario correctamente");
            } catch (\Exception $e) {
                return new Response("Error al dar de alta el nuevo usuario". $e->getMessage());
            }
        }
    }*/

    #[Route('/newUser', name: 'New_User')]
    public function newUser(ManagerRegistry $doctrine, Request $request): Response
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('username', TextType::class)
            //->add('email', EmailType::class)
            ->add('Password', PasswordType::class)
            ->add('description', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Crear Usuario'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('Find_User_Id', ["id" => $user->getId()]);
        }
        return $this->render('formularios/form.html.twig', [
            'formulario' => $form->createView(),
        ]);
    }


    /*#[Route('/NewPost', name: 'New_Post')]
    public function newPost(ManagerRegistry $doctrine): Response
    {
        $fecha = new \DateTime();

        $entityManager = $doctrine->getManager();
        $post = new Post();
        $titulo = $_GET['title'] ?? null;
        $description = $_GET['description'] ?? null;

        $repositorio = $doctrine->getRepository(User::class);
        $user = $repositorio->find(1);

        $post->setTitle($titulo);
        $post->setDescription($description);
        $post->setFecha($fecha);
        $post->setUsuario($user);

        if (!$titulo || !$description || !$user) {
            return new Response("Faltan datos para crear este post");
        } else {
            try {
                $entityManager->persist($post);
                $entityManager->flush();
                return new Response("Se ha creado el post correctamente");
            } catch (\Exception $e) {
                return new Response("Error al crear el nuevo post". $e->getMessage());
            }
        }
    }*/

    #[Route('/NewPost', name: 'New_Post')]
    public function newPost(ManagerRegistry $doctrine, Request $request): Response
    {
        $fecha = new \DateTime();
        $post = new Post();
        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('usuario', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username',
            ])
            ->add('save', SubmitType::class, array('label' => 'Crear Post'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $post->setFecha($fecha);
            $entityManager = $doctrine->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
            return $this->redirectToRoute('Find_Post_Id', ["id" => $post->getId()]);
        }
        return $this->render('formularios/formPost.html.twig', [
            'formulario' => $form->createView(),
        ]);
    }

    #[Route('/AllUsers', name: 'All_users')]
    public function allusers(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(User::class);
        $usuarios = $repositorio->findAll();
        return $this->render('User/users.html.twig', [
            'users' => $usuarios,
        ]);
    }

    #[Route('/FindUserId/{id?}', name: 'Find_User_Id')]
    public function FindUserId(ManagerRegistry $doctrine,$id): Response
    {
        $repositorio = $doctrine->getRepository(User::class);

        if(!$id) {
            return new Response("Tienes que proporcionar el ID para realizar la búsqueda");
        } else {
            $usuario = $repositorio->find($id);
            return $this->render('User/user.html.twig', [
                'user' => $usuario,
            ]);
        }
    }

    #[Route('/AllPosts', name: 'All_Posts')]
    public function AllPosts(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Post::class);
        $posts = $repositorio->findAll();
        return $this->render('Post/posts.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/FindPostId/{id?}', name: 'Find_Post_Id')]
    public function FindPostId(ManagerRegistry $doctrine,$id): Response
    {
        $repositorio = $doctrine->getRepository(Post::class);
        if (!$id) {
            return new Response("Tienes que proporcionar el ID para realizar la búsqueda");
        } else {
            $post = $repositorio->find($id);
            return $this->render('Post/post.html.twig', [
                'post' => $post,
            ]);
        }
    }

    #[Route('/ModifyUser/{id?}', name: 'ModifyUser')]
    public function ModifyUser(ManagerRegistry $doctrine, Request $request, $id): Response {
        $repositorio = $doctrine->getRepository(User::class);
        $usuario = $repositorio->find($id);

        $form = $this->createFormBuilder($usuario)
            ->add('username', TextType::class)
            //->add('email', EmailType::class)
            ->add('Password', PasswordType::class)
            ->add('description', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Crear Usuario'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usuario = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();
        }
        return $this->render('formularios/modifyUser.html.twig', [
            'formulario' => $form->createView(),
        ]);

    }

    #[Route('/ModifyPost/{id?}', name: 'ModifyPost')]
    public function ModifyPost(ManagerRegistry $doctrine, Request $request, $id): Response {
        $repositorio = $doctrine->getRepository(Post::class);
        $post = $repositorio->find($id);

        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('usuario', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username',
            ])
            ->add('save', SubmitType::class, array('label' => 'Crear Post'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
        }

        return $this->render('formularios/modifyPost.html.twig', [
            'formulario' => $form->createView(),
        ]);
    }

}