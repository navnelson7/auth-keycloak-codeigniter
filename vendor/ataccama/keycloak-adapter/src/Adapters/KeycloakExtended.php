<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 17/04/2019
     * Time: 10:37
     */

    namespace Ataccama\Adapters;


    use Ataccama\Exceptions\MissingParameter;
    use Ataccama\Utils\AccessToken;
    use Ataccama\Utils\KeycloakAPI;
    use Ataccama\Utils\RefreshToken;
    use Nette\SmartObject;


    /**
     * @property-read string       $apiClientId
     * @property-read string       $apiClientSecret
     * @property-read string       $apiUsername
     * @property-read string       $apiPassword
     * @property-read AccessToken  $apiAccessToken
     * @property-read RefreshToken $apiRefreshToken
     */
    class KeycloakExtended extends Keycloak
    {
        use SmartObject;

        /** @var string */
        protected $apiClientId, $apiClientSecret, $apiUsername, $apiPassword;

        /** @var AccessToken */
        protected $apiAccessToken;

        /** @var RefreshToken */
        protected $apiRefreshToken;

        /**
         * KeycloakExtended constructor.
         * @param array $parameters
         * @throws \Ataccama\Exceptions\MissingParameter
         */
        public function __construct(array $parameters)
        {
            parent::__construct($parameters);
            $requiredParameters = ["clientId", "clientSecret", "username", "password"];

            foreach ($requiredParameters as $requiredParameter) {
                if (empty($parameters['api'][$requiredParameter])) {
                    throw new MissingParameter(__CLASS__ .
                        " needs parameter called '$requiredParameter', set the parameter in config.neon");
                } else {
                    $this->{'api' . ucfirst($requiredParameter)} = $parameters['api'][$requiredParameter];
                }
            }
        }

        /**
         * @return string
         */
        public function getApiClientId(): string
        {
            return $this->apiClientId;
        }

        /**
         * @return string
         */
        public function getApiClientSecret(): string
        {
            return $this->apiClientSecret;
        }

        /**
         * @return string
         */
        public function getApiPassword(): string
        {
            return $this->apiPassword;
        }

        /**
         * @return string
         */
        public function getApiUsername(): string
        {
            return $this->apiUsername;
        }

        /**
         * @return RefreshToken
         * @throws \Ataccama\Exceptions\CurlException
         * @throws \Ataccama\Exceptions\UnknownError
         */
        public function getApiRefreshToken(): RefreshToken
        {
            if (!isset($this->apiRefreshToken)) {
                $this->obtainTokens();

                return $this->apiRefreshToken;
            }

            return $this->apiRefreshToken;
        }

        /**
         * @throws \Ataccama\Exceptions\CurlException
         * @throws \Ataccama\Exceptions\UnknownError
         */
        private function obtainTokens()
        {
            $response = KeycloakAPI::getApiAuthorization($this);
            $this->apiAccessToken = $response->accessToken;
            $this->apiRefreshToken = $response->refreshToken;

            $_SESSION['auth']['api_access_token']['expiration'] = $this->apiAccessToken->expiration;
            $_SESSION['auth']['api_refresh_token']['expiration'] = $this->apiRefreshToken->expiration;
        }

        /**
         * @return AccessToken
         * @throws \Ataccama\Exceptions\CurlException
         * @throws \Ataccama\Exceptions\UnknownError
         */
        public function getApiAccessToken(): AccessToken
        {
            if (!isset($this->apiAccessToken)) {
                $this->obtainTokens();

                return $this->apiAccessToken;
            }

            return $this->apiAccessToken;
        }

        /**
         * @param string $firstname
         * @param string $lastname
         * @param string $email
         * @return bool
         * @throws \Ataccama\Exceptions\CurlException
         */
        public function createUser(string $firstname, string $lastname, string $email): bool
        {
            return KeycloakAPI::createUser($this, $email, $firstname, $lastname, $email);
        }

        /**
         * @return bool
         */
        public function hasApiAccessTokenExpired(): bool
        {
            if (!isset($_SESSION['auth']['api_access_token']['expiration'])) {
                return true;
            }

            if ($_SESSION['auth']['api_access_token']['expiration'] < time()) {
                return true;
            }

            return false;
        }
    }