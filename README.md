# swoft-elasticsearch-client

No-blocking Coroutine Elasticsearch Client

[![Build Status](https://travis-ci.org/limingxinleo/swoft-elasticsearch.svg?branch=master)](https://travis-ci.org/limingxinleo/swoft-elasticsearch)

## 安装
~~~
composer require limingxinleo/swoft-elasticsearch
~~~

## 使用

使用方法与官方ES客户端一致

~~~php
<?php

use Swoftx\Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->setHosts(['127.0.0.1:9200'])->build();

go(function() use ($client){
    print_r($client->info());
});
~~~
