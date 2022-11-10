<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 23/04/2019
     * Time: 10:49
     */

    namespace Ataccama\Utils;


    use Nette\SmartObject;


    /**
     * @property-read AccessToken  $accessToken
     * @property-read RefreshToken $refreshToken
     * @property-read string       $sessionState
     */
    class AuthorizationResponse
    {
        use SmartObject;

        /** @var \stdClass */
        private $response;

        /** @var AccessToken */
        protected $accessToken;

        /** @var RefreshToken */
        protected $refreshToken;

        /** @var string */
        protected $sessionState;

        /**
         * AuthorizationResponse constructor.
         * @param \stdClass $response
         */
        public function __construct(\stdClass $response)
        {
            $this->response = $response;
        }

        /**
         * @return AccessToken
         */
        public function getAccessToken(): AccessToken
        {
            return new AccessToken($this->response->access_token, $this->response->expires_in);
        }

        /**
         * @return RefreshToken
         */
        public function getRefreshToken(): RefreshToken
        {
            return new RefreshToken($this->response->refresh_token, $this->response->refresh_expires_in);
        }

        /**
         * @return string
         */
        public function getSessionState(): string
        {
            return $this->response->session_state;
        }
    }