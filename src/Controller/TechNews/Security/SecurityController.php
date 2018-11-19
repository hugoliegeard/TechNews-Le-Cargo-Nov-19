<?php

namespace App\Controller\TechNews\Security;


use App\Form\ConnexionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * Connexion d'un Membre
     * @Route({
     *      "fr" : "/connexion",
     *      "en" : "/login"
     *     }, name="security_connexion")
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function connexion(Request $request,
                              AuthenticationUtils $authenticationUtils)
    {

        /**
         * Si notre utilisateur est déjà authentifié,
         * on le redirige sur la page d'accueil
         */
        if ($this->getUser()) {
            return $this->redirectToRoute('index');
        }

        # Récupération du Formulaire de Connexion
        $form = $this->createForm(ConnexionType::class, [
            'email' => $authenticationUtils->getLastUsername()
        ]);

        # Récupération du message d'erreur.
        $error = $authenticationUtils->getLastAuthenticationError();

        # Transmission à la vue
        return $this->render('security/connexion.html.twig', [
            'form' => $form->createView(),
            'error' => $error
        ]);

    }

    /**
     * Déconnexion d'un Membre
     * @Route({
     *     "fr": "/deconnexion",
     *     "en": "/logout"
     * }, name="security_deconnexion")
     */
    public function deconnexion()
    {
    }

    /**
     * Vous pourriez définir aussi ici,
     * votre logique, mot de passe oublié...
     * Réinitialisation du mot de passe,  et
     * Email de validation, ...
     */
}