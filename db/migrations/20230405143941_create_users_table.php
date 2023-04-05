<?php

declare(strict_types=1);

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('users')
            ->addColumn('username', 'string')
            ->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->create();
    }

    protected function down(): void
    {
        $this->table('users')
            ->drop();
    }
}
