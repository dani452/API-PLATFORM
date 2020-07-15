<?php

namespace App\Controller;

use App\Repository\GenreRepository;
use App\Entity\Genre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiGenreController extends AbstractController
{
    /**
     * @Route("/api/genre", name="api_genre", methods={"GET"})
     */
    function list(GenreRepository $repo, SerializerInterface $serializer) {
        $genres = $repo->findAll();
        $resultat = $serializer->serialize(
            $genres,
            'json',
            [
                'groups' => ['listGenreFull']
            ]
        );
        return new JsonResponse($resultat, 200, [], true);
    }

    /**
     * @Route("/api/genre/{id}", name="api_genre_show", methods={"GET"})
     */
    function show(Genre $genre, SerializerInterface $serializer) {

        $resultat = $serializer->serialize(
            $genre,
            'json',
            [
                'groups' => ['listGenreSimple']
            ]
        );
        return new JsonResponse($resultat, 200, [], true);
    }

    /**
     * @Route("/api/genre", name="api_genre_create", methods={"POST"})
     */
    function create(Request $request, EntityManagerInterface $manager, SerializerInterface $serializer) {

        $data=$request->getContent();
        $genre=$serializer->deserialize($data, Genre::class, 'json');
        $manager->persist($genre);
        $manager->flush();
      
        return new JsonResponse(
            "genre à bien été crée", 
            Response::HTTP_CREATED, [
            "location" =>"api/genre/".$genre->getId()], 
            true
        );
    }
}
