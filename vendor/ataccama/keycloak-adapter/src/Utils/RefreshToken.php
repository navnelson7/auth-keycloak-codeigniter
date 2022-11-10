<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 23/04/2019
     * Time: 10:51
     */

    namespace Ataccama\Utils;

    /**
     * Class RefreshToken
     * @package Ataccama\Utils
     * @property-read string $refreshToken
     */
    class RefreshToken extends Token
    {
        protected $refreshToken;

        /**
         * RefreshToken constructor.
         * @param string $refreshToken
         * @param int    $expires_in
         */
        public function __construct(string $refreshToken, int $expires_in)
        {
            parent::__construct(time() + $expires_in);
            $this->refreshToken = $refreshToken;
        }

        /**
         * @return string
         */
        public function getRefreshToken(): string
        {
            return $this->refreshToken;
        }
    }