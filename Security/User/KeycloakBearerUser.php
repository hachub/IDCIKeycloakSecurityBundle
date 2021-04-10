<?php

namespace IDCI\Bundle\KeycloakSecurityBundle\Security\User;

use KnpU\OAuth2ClientBundle\Security\User\OAuthUser;
use League\OAuth2\Client\Token\AccessToken;

class KeycloakBearerUser extends OAuthUser
{
    public function __construct(string $username, array $roles
        , private string $accessToken)
    {
        parent::__construct($username, $roles);
    }

    public function __toString(): string
    {
        return $this->getUsername();
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }
}
