<?php

declare(strict_types=1);

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateAdministratorsTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('administrators')
            ->addColumn('name', 'string')
            ->create();
    }

    protected function down(): void
    {
        $this->table('administrators')
            ->drop();
    }
}
