<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 23/04/2019
     * Time: 11:46
     */

    namespace Ataccama\Utils;

    use Nette\SmartObject;


    /**
     * Class Response
     * @package Ataccama\Utils
     * @property-read \stdClass $body
     * @property-read mixed     $error
     * @property-read int       $code
     */
    class Response
    {
        use SmartObject;

        /** @var int */
        protected $code;
        protected $body;
        protected $error;

        /**
         * Response constructor.
         * @param int            $code
         * @param mixed/null $body
         * @param null           $error
         */
        public function __construct(int $code, $body = null, $error = null)
        {
            $this->body = $body;
            $this->code = $code;
            $this->error = $error;
        }

        /**
         * @return mixed
         */
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @return mixed
         */
        public function getError()
        {
            return $this->error;
        }

        /**
         * @return int
         */
        public function getCode(): int
        {
            return $this->code;
        }
    }