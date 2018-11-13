<?php

namespace App\Membre;

use Symfony\Component\Validator\Constraints as Assert;

class MembreRequest
{
    /**
     * @Assert\NotBlank(message="Saisissez votre Prénom.")
     * @Assert\Length(max="50", maxMessage="Votre prénom est trop long. {{ limit }} caractères max.")
     */
    private $prenom;

    /**
     * @Assert\NotBlank(message="Saisissez votre Nom.")
     * @Assert\Length(max="50", maxMessage="Votre nom est trop long. {{ limit }} caractères max.")
     */
    private $nom;

    /**
     * @Assert\Email(message="Vérifiez votre email.")
     * @Assert\NotBlank(message="Saisissez votre Email.")
     * @Assert\Length(max="80", maxMessage="Votre email est trop long. {{ limit }} caractères max.")
     */
    private $email;

    /**
     * @Assert\NotBlank(message="N'oubliez pas votre mot de passe.")
     * @Assert\Regex(
     *     pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]+$/",
     *     message="Votre mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre."
     * )
     * @Assert\Length(
     *     min="8",
     *     minMessage="Votre mot de passe est trop court. {{ limit }} caractères min.",
     *     max="20",
     *     maxMessage="Votre mot de passe est trop long. {{ limit }} caractères max."
     * )
     */
    private $password;

    /**
     * @Assert\IsTrue(message="Vous devez valider nos CGU.")
     */
    private $conditions;
    private $dateInscription;
    private $roles = [];

    /**
     * MembreRequest constructor.
     * @param $role
     */
    public function __construct(string $role = 'ROLE_MEMBRE')
    {
        $this->addRole($role);
        $this->dateInscription = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * @param mixed $conditions
     */
    public function setConditions($conditions): void
    {
        $this->conditions = $conditions;
    }

    /**
     * @return mixed
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function addRole(string $role): bool
    {
        if (!in_array($role, $this->roles)) {
            $this->roles[] = $role;
            return true;
        } else {
            return false;
        }
    }

}