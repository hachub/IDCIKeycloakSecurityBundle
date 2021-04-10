<?php

namespace IDCI\Bundle\KeycloakSecurityBundle\Security\User;

use KnpU\OAuth2ClientBundle\Security\User\OAuthUser;
use League\OAuth2\Client\Token\AccessToken;
use Symfony\Component\Security\Core\User\UserInterface;

class KeycloakUser extends OAuthUser
{
    public function __construct(
        string $username,
        array $roles,
        private AccessToken $accessToken,
        private string $id,
        private ?string $email = null,
        private ?string $displayName = null,
        private ?string $firstName = null,
        private ?string $lastName = null,
        private string $accountUrl,
        private ?string $preferredLanguage = 'en'
    ) {
        parent::__construct($username, $roles);
    }

    public function __toString(): string
    {
        return $this->getDisplayName();
    }

    public function getAccessToken(): ?AccessToken
    {
        return $this->accessToken;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getAccountUrl(): ?string
    {
        return $this->accountUrl;
    }

    public function getPreferredLanguage(): ?string
    {
        return $this->preferredLanguage;
    }

    public function isEqualTo(UserInterface $user): bool
    {
        if (!$user instanceof self) {
            return false;
        }

        if ($this->getId() !== $user->getId()) {
            return false;
        }

        return true;
    }
}
