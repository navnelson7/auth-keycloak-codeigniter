<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 23/04/2019
     * Time: 14:05
     */

    namespace Ataccama\Utils;

    use Nette\SmartObject;


    /**
     * Class Token
     * @package Ataccama\Utils
     * @property-read int $expiration
     */
    abstract class Token
    {
        use SmartObject;

        /** @var int */
        protected $expiration;

        /**
         * Token constructor.
         * @param int $expiration
         */
        public function __construct(int $expiration)
        {
            $this->expiration = $expiration;
        }

        /**
         * @return int
         */
        public function getExpiration(): int
        {
            return $this->expiration;
        }
    }