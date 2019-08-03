<?php

$content = file_get_contents('endpoints.txt');
$endpoints = array_filter(explode("\n", $content));

foreach($endpoints as $endpoint) {
    list($ns, $command) = explode('.', $endpoint);
    $class = ucfirst($command);
    $code = <<<EOF
<?php

declare(strict_types=1);

namespace Sdk\Message;

use App\Api\Command;

class $class implements MessageInterface
{
    public function getCommand(): Command
    {
        return new Command('$endpoint', []);
    }
}
EOF;

    file_put_contents('sdk/Message/' . $class . '.php', $code);

    $handlerName = $class . "Handler";
    $code2 = <<<EOF
<?php

namespace Sdk\MessageHandler;

use Sdk\Api\Client;
use Sdk\Message\\$class;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class $handlerName implements MessageHandlerInterface
{
        /**
         * @var Client
         */
        private \$client;
    
        /**
         * @param Client \$client
         */
        public function __construct(Client \$client)
        {
            \$this->client = \$client;
        }
    
        public function __invoke($class \$message)
        {
            \$items = \$this->client->executeCommand(\$message->getCommand());
    
            return \$this->client->denormalizeArray(\$items);
        }
}
EOF;

}
