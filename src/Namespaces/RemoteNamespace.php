<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoft\Elasticsearch\Namespaces;

class RemoteNamespace extends \Elasticsearch\Namespaces\RemoteNamespace
{
    use PerformRequest;
}
