<?php

declare(strict_types=1);

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateGaragesUsersTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('garages_users')
            ->addColumn('user_id', 'integer')
            ->addColumn('garage_id', 'integer')
            ->addForeignKey('user_id', 'users')
            ->addForeignKey('garage_id', 'garages')
            ->create();
    }

    protected function down(): void
    {
        $this->table('garages_users')
            ->drop();
    }
}
