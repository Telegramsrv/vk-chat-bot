<?php

namespace Iillexial\VKBot\VKApi;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * Class API
 *
 * @package Iillexial\VkBot\VKApi
 * @author Ivan Klymenchenko <iillexial@gmail.com>
 */
class API
{
    /**
     * @var string
     */
    protected $appId;

    /**
     * @var string
     */
    protected $appSecret;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var string
     */
    protected $version = '5.52';

    /**
     * @var ClientInterface
     */
    private $httpClient;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $methodName
     * @param array $methodArgs
     * @param string $methodType
     * @param array $methodBody
     *
     * @return array
     */
    public function method($methodName, $methodArgs, $methodType = 'GET', $methodBody = [])
    {
        $methodArgs['v'] = $this->getVersion();
        $methodArgs['access_token'] = $this->getAccessToken();

        $url = sprintf(
            "https://api.vk.com/method/%s?%s",
            $methodName, http_build_query($methodArgs)
        );
        $request = new Request($methodType, $url, [], http_build_query($methodBody));

        $response = $this->httpClient->send($request);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     */
    public function setAppId(string $appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getAppSecret(): string
    {
        return $this->appSecret;
    }

    /**
     * @param string $appSecret
     */
    public function setAppSecret(string $appSecret)
    {
        $this->appSecret = $appSecret;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }


}