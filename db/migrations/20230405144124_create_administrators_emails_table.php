<?php

declare(strict_types=1);

use Phoenix\Database\Element\Index;
use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateAdministratorsEmailsTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('administrators_emails')
            ->addColumn('administrator_id', 'integer')
            ->addColumn('value', 'string')
            ->addIndex('value')
            ->addForeignKey('administrator_id', 'administrators')
            ->create();
    }

    protected function down(): void
    {
        $this->table('administrators_emails')
            ->drop();
    }
}
