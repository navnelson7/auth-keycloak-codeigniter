<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 23/04/2019
     * Time: 10:24
     */

    require __DIR__ . "/Utils/Token.php";
    require __DIR__ . "/Exceptions/NotAuthorized.php";
    require __DIR__ . "/Exceptions/MissingParameter.php";
    require __DIR__ . "/Exceptions/CurlException.php";
    require __DIR__ . "/Exceptions/NotAuthenticated.php";
    require __DIR__ . "/Exceptions/NotDefined.php";
    require __DIR__ . "/Exceptions/UnknownError.php";
    require __DIR__ . "/Utils/UserProfile.php";
    require __DIR__ . "/Adapters/Keycloak.php";
    require __DIR__ . "/Adapters/KeycloakExtended.php";
    require __DIR__ . "/Utils/UserIdentity.php";
    require __DIR__ . "/Utils/KeycloakAPI.php";
    require __DIR__ . "/Utils/AccessToken.php";
    require __DIR__ . "/Utils/Curl.php";
    require __DIR__ . "/Utils/AuthorizationResponse.php";
    require __DIR__ . "/Utils/RefreshToken.php";
    require __DIR__ . "/Utils/Response.php";