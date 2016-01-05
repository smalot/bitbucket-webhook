<?php

require_once 'vendor/autoload.php';

$server = array(
    'HTTP_CONTENT_LENGTH' => '2830',
    'HTTP_CONTENT_TYPE' => 'application/json',
    'HTTP_X_REQUEST_UUID' => '07606ab4-601c-4ca4-8c93-b979d3c7b3a1',
    'HTTP_X_ATTEMPT_NUMBER' => '1',
    'HTTP_X_EVENT_KEY' => 'repo:push',
    'REMOTE_ADDR' => '131.103.20.165',
//    'REMOTE_ADDR' => '8.8.8.8',
);

$calls = array(
    'issue' => array(
        'comment_created' => array('actor', 'repository', 'issue', 'comment'),
        'created' => array('actor', 'repository', 'issue'),
        'updated' => array('actor', 'repository', 'issue', 'comment', 'changes'),
    ),
    'pullrequest' => array(
        'comment_created' => array('actor', 'repository', 'pullrequest', 'comment'),
        'comment_deleted' => array('actor', 'repository', 'pullrequest', 'comment'),
        'comment_updated' => array('actor', 'repository', 'pullrequest', 'comment'),
        'created' => array('actor', 'repository', 'pullrequest'),
        'updated' => array('actor', 'repository', 'pullrequest'),
        'approved' => array('actor', 'repository', 'pullrequest', 'approval'),
        'unapproved' => array('actor', 'repository', 'pullrequest', 'approval'),
        'fulfilled' => array('actor', 'repository', 'pullrequest'),
        'rejected' => array('actor', 'repository', 'pullrequest'),
    ),
    'repo' => array(
        'commit_comment_created' => array('actor', 'repository', 'comment', 'commit'),
        'commit_status_created' => array('actor', 'repository', 'commit_status'),
        'commit_status_updated' => array('actor', 'repository', 'commit_status'),
        'fork' => array('actor', 'repository', 'fork'),
        'push' => array('actor', 'repository', 'push'),
    ),
);

$webhook = new \Smalot\Bitbucket\Webhook\Webhook();
$map = $webhook->getEventMap();

foreach ($calls as $group => $types) {
    foreach ($types as $type => $properties) {
        echo 'check ' . $group . ':' . $type . "\n";

        $server['HTTP_X_EVENT_KEY'] = $group . ':' . $type;
        $content = file_get_contents('./test/payloads/' . $group . '/' . $type . '.json');

        $request = new \Symfony\Component\HttpFoundation\Request(
            array(), array(), array(), array(), array(), $server, $content
        );

        try {
            $event = $webhook->parseRequest($request);
            $classname = get_class($event);

            echo "  check event class name\n";

            if ($classname != trim($map[$group . ':' . $type], '\\')) {
                var_dump($classname, $map[$group . ':' . $type]);
                throw new \Exception('Invalid class used');
            }

            $model = $event->getModel();

            echo "  check model class name\n";

            if (get_class($model) != trim(preg_replace('/Event/', 'Model', $map[$group . ':' . $type]), '\\')) {
                var_dump(get_class($model), trim(preg_replace('/Event/', 'Model', $map[$group . ':' . $type]), '\\'));
                throw new \Exception('Invalid class used');
            }

            echo "  check actions\n";

            foreach ($properties as $property) {
                $action = 'get' . str_replace(' ', '', ucfirst(str_replace('_', ' ', $property)));

                echo '    ' . $action . "\n";

                if (!method_exists($model, $action)) {
                    var_dump(get_class($model), $action);
                    throw new \Exception('Missing method');
                }

                if (!is_array($model->$action())) {
                    var_dump($model, $action);
                    throw new \Exception('Json not mapped');
                }
            }

        } catch (Exception $e) {
            var_dump($e->getMessage());
            die("error\n");
        }
    }
}

die("done with success\n");
