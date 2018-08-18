<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoft\Elasticsearch\Namespaces;

class TasksNamespace extends \Elasticsearch\Namespaces\TasksNamespace
{
    use PerformRequest;
}
