<?php
/**
 * Created by PhpStorm.
 * User: Hugo LIEGEARD
 * Date: 13/11/2018
 * Time: 10:52
 */

namespace App\Controller\TechNews;


use App\Membre\MembreRequest;
use App\Membre\MembreRequestHandler;
use App\Membre\MembreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends Controller
{
    /**
     * Inscription d'un Utilisateur
     * @Route({
     *     "fr": "/inscription",
     *     "en": "/register"
     * }, name="membre_inscription",
     *     methods={"GET", "POST"})
     * @param Request $request
     * @param MembreRequestHandler $membreRequestHandler
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function inscription(Request $request, MembreRequestHandler $membreRequestHandler)
    {
        # Création d'un Nouvel Utilisateur
        $membre = new MembreRequest();

        # Création du Formulaire
        $form = $this->createForm(MembreType::class, $membre)
            ->handleRequest($request);

        # Vérification et Traitement du Formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            # Enregistrement de l'utilisateur
            $membre = $membreRequestHandler->handle($membre);

            # Flash Message
            $this->addFlash('notice', 'Félicitations, vous pouvez vous connecter !');

            # Redirection
            return $this->redirectToRoute('security_connexion');
        }

        # Affichage du formulaire dans la vue
        return $this->render('membre/inscription.html.twig', [
           'form' => $form->createView()
        ]);
    }
}