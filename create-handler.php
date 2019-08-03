<?php

$endpoint = $argv[1];
list($ns, $command) = explode('.', $endpoint);
$base = ucfirst($command);
$codeHandler = <<<EOF
<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\\${base}Result;

class ${base}Handler extends AbstractHandler
{
    public function __invoke(): ${base}Result
    {
        \$command = new Command('${endpoint}', [
        ]);

        return \$this->handle(\$command, ${base}Result::class);
    }
}
EOF;

    file_put_contents('sdk/Handler/' . $base . 'Handler.php', $codeHandler);

    $codeResult = <<<EOF
<?php

namespace Sdk\Result;

class ${base}Result extends AbstractResult
{
    /**
     * @var array
     */
    private \$items;

    /**
     * ${base}Result constructor.
     * @param array \$items
     */
    public function __construct(array \$items)
    {
        \$this->items = \$items;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return \$this->items;
    }
}
EOF;

    file_put_contents('sdk/Result/' . $base . 'Result.php', $codeResult);
