<?php

declare(strict_types=1);

namespace Tests\Tempest\Unit\Console\Components\Static;

use Tempest\Console\Console;
use Tests\Tempest\Unit\Console\ConsoleIntegrationTestCase;

/**
 * @internal
 * @small
 */
class StaticProgressBarComponentTest extends ConsoleIntegrationTestCase
{
    public function test_progress_bar(): void
    {
        $this->console
            ->call(function (Console $console) {
                $output = $console->progressBar(
                    ['a', 'b', 'c'],
                    fn (string $input) => $input . $input,
                );

                $console->write(json_encode($output));
            })
            ->assertContains(
                <<<TXT
[==========>                    ] (1/3)
[====================>          ] (2/3)
[===============================] (3/3)
["aa","bb","cc"]
TXT,
            );
    }
}
