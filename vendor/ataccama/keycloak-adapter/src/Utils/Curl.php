<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 23/04/2019
     * Time: 09:03
     */

    namespace Ataccama\Utils;


    use Ataccama\Exceptions\CurlException;


    class Curl
    {
        /**
         * @param string $url
         * @param array  $headers
         * @param mixed  $parameters
         * @return Response
         * @throws CurlException
         */
        public static function post(string $url, array $headers = [], $parameters = null): Response
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            if (!empty($parameters)) {
                if (is_array($parameters)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                } else {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
                }
            }

            if (!empty($headers)) {
                $h = [];
                foreach ($headers as $key => $header) {
                    $h[] = "$key: $header";
                }
                curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
            }

            curl_setopt($ch, CURLOPT_POST, true);

            $response = curl_exec($ch);

            $error = null;
            if (curl_error($ch)) {
                $error = curl_error($ch);
                throw new CurlException("Curl Error: " . curl_error($ch));
            }

            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);

            return new Response($httpcode, json_decode($response), $error);
        }

        /**
         * @param string $url
         * @param array  $headers
         * @param null   $parameters
         * @return Response
         * @throws CurlException
         */
        public static function put(string $url, array $headers = [], $parameters = null): Response
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            if (!empty($parameters)) {
                if (is_array($parameters)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                } else {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
                }
            }

            if (!empty($headers)) {
                $h = [];
                foreach ($headers as $key => $header) {
                    $h[] = "$key: $header";
                }
                curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
            }

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

            $response = curl_exec($ch);

            $error = null;
            if (curl_error($ch)) {
                $error = curl_error($ch);
                throw new CurlException("Curl Error: " . curl_error($ch));
            }

            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);

            return new Response($httpcode, json_decode($response), $error);
        }

        /**
         * @param string $url
         * @param array  $headers
         * @return Response
         * @throws CurlException
         */
        public static function get(string $url, array $headers = []): Response
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            if (!empty($headers)) {
                $h = [];
                foreach ($headers as $key => $header) {
                    $h[] = "$key: $header";
                }
                curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
            }

            $response = curl_exec($ch);

            $error = null;
            if (curl_error($ch)) {
                $error = curl_error($ch);
                throw new CurlException("Curl Error: " . curl_error($ch));
            }

            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);

            return new Response($httpcode, json_decode($response), $error);
        }
    }