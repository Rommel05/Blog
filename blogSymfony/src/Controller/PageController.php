<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/newUser', name: 'New_User')]
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
    }

    #[Route('/NewPost', name: 'New_Post')]
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
    }

    #[Route('/AllUsers', name: 'All_users')]
    public function allusers(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(User::class);
        $usuarios = $repositorio->findAll();
        $resultado = "";
        foreach ($usuarios as $usuario) {
            $resultado .= $usuario->getId(). " " . $usuario->getUsername(). " " . $usuario->getDescription();
        }
        return new Response($resultado);
    }

    #[Route('/FindUserId', name: 'Find_User_Id')]
    public function FindUserId(ManagerRegistry $doctrine): Response
    {
        $id = $_GET['userId'] ?? null;
        $repositorio = $doctrine->getRepository(User::class);
        $usuario = $repositorio->find($id);
        $resultado = $usuario->getId(). " " .$usuario->getUsername() . " " . $usuario->getDescription();

        return new Response($resultado);
    }

    #[Route('/AllPosts', name: 'All_Posts')]
    public function AllPosts(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Post::class);
        $posts = $repositorio->findAll();
        $resultado = "";
        foreach ($posts as $post) {
            $resultado .= $post->getId(). " " . $post->getTitle(). " " . $post->getDescription();
        }

        return new Response($resultado);
    }

    #[Route('/FindPostId', name: 'Find_Post_Id')]
    public function FindPostId(ManagerRegistry $doctrine): Response
    {
        $id = $_GET['postId'] ?? null;
        $repositorio = $doctrine->getRepository(Post::class);
        $post = $repositorio->find($id);
        $resultado = $post->getId(). " " .$post->getTitle(). " " . $post->getDescription();
        return new Response($resultado);
    }
}