# Keycloak PHP adapter

[![Latest Stable Version](https://poser.pugx.org/ataccama/keycloak-adapter/v/stable)](https://packagist.org/packages/ataccama/keycloak-adapter) [![Total Downloads](https://poser.pugx.org/ataccama/keycloak-adapter/downloads)](https://packagist.org/packages/ataccama/keycloak-adapter) [![License](https://poser.pugx.org/ataccama/keycloak-adapter/license)](https://packagist.org/packages/ataccama/keycloak-adapter) [![Monthly Downloads](https://poser.pugx.org/ataccama/keycloak-adapter/d/monthly)](https://packagist.org/packages/ataccama/keycloak-adapter)

## Install
`composer require ataccama/keycloak-adapter`

Neon config:
```
parameters:
    keycloak:
        realmId: your_realm
        clientDd: your_client_id
        host: https://your.keycloak.com
        defaultRedirectUri: https://your.default.url
        api:
            username: your_username
            password: your_password
            clientId: your_api_client_id
            clientSecret: your_client_secret
            
services:
    - Ataccama\Adapters\Keycloak(%keycloak%)
```

## Use
Create new class and extend class Ataccama\Auth, then you MUST implement all missing methods with your own logic.

Login URL:
`$loginUrl = $yourAuthClass->getLoginUrl()`

In code use your class like this:
`$yourAuthClass->authorize($_GET['code'])`

Example (Nette Framework):
```
// waiting for authorization code from Keycloak
if ($yourAuthClass->authorize($this->getParameter('code'))) {
    $this->redirectUrl($yourAuthClass->getRedirectUri());
} else {
    if (!$yourAuthClass->isAuthorized()) {
        $this->redirectUrl($yourAuthClass->getLoginUrl());
    }
}

// check if user is logged in on every page, if not redirect him to Keycloak login page
if (!$yourAuthClass->isAuthorized()) {
    $this->redirectUrl($yourAuthClass->getLoginUrl());
}
```