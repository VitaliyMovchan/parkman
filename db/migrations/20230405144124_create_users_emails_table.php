<?php

declare(strict_types=1);

use Phoenix\Database\Element\Index;
use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateUsersEmailsTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('users_emails')
            ->addColumn('user_id', 'integer')
            ->addColumn('value', 'string')
            ->addIndex('value', Index::TYPE_NORMAL, Index::METHOD_DEFAULT, 'value')
            ->addIndex('value', Index::TYPE_UNIQUE, Index::METHOD_DEFAULT, 'value_unique')
            ->addForeignKey('user_id', 'users')
            ->create();
    }

    protected function down(): void
    {

    }
}
