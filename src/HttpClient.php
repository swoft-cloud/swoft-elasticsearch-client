<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Elasticsearch;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Transport;
use Swoft\Helper\JsonHelper;
use Swoft\HttpClient\Client;
use Swoft\Bean\Annotation\Bean;
use Swoft\Elasticsearch\Pool\Config\ElasticPoolConfig;

/**
 * Class HttpClient
 * @Bean
 * @package Swoft\Elasticsearch
 */
class HttpClient
{
    /**
     * 访问接口
     * @author limx
     * @param AbstractEndpoint $endpoint
     * @param Transport        $transport
     * @return mixed
     */
    public function request(AbstractEndpoint $endpoint, Transport $transport)
    {
        $connection = $transport->getConnection();
        $uri = $endpoint->getURI();
        if ($params = $endpoint->getParams()) {
            $uri .= '?' . http_build_query($params);
        }
        $client = new Client([
            'base_uri' => $connection->getHost()
        ]);

        $method = $endpoint->getMethod();
        $jsonArray = $endpoint->getBody();
        if (!empty($jsonArray) && $method === 'GET') {
            $method = 'POST';
        }

        $config = bean(ElasticPoolConfig::class);

        $string = $client->request($method, $uri, [
            'json' => $jsonArray,
            '_options' => [
                'timeout' => $config->getTimeout()
            ],
        ])->getResult();

        return JsonHelper::decode($string, true);
    }
}
