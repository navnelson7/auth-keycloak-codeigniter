<?php


    namespace Ataccama\Clients\Keycloak\Env\Users;

    /**
     * Class User
     * @package Ataccama\Clients\Keycloak\Env\Users
     */
    class User
    {
        /** @var string */
        public $id;

        /** @var string */
        public $firstname;

        /** @var string */
        public $lastname;

        /** @var string */
        public $email;

        /**
         * User constructor.
         * @param string $id
         * @param string $firstname
         * @param string $lastname
         * @param string $email
         */
        public function __construct(string $id, string $firstname, string $lastname, string $email)
        {
            $this->id = $id;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
        }
    }