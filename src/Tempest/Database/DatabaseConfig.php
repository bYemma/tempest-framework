<?php

declare(strict_types=1);

namespace Tempest\Database;

final class DatabaseConfig
{
    public array $migrations = [];

    public function __construct(
        public readonly DatabaseDriver $driver,
    ) {
    }

    public function addMigration(string $className): self
    {
        $this->migrations[$className] = $className;

        ksort($this->migrations);

        return $this;
    }
}
