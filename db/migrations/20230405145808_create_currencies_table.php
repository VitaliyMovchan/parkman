<?php

declare(strict_types=1);

use Phoenix\Database\Element\Index;
use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateCurrenciesTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('currencies')
            ->addColumn('code', 'string')
            ->addColumn('currency', 'string')
            ->addIndex('code', Index::TYPE_UNIQUE)
            ->addIndex('currency', Index::TYPE_UNIQUE)
            ->create();
    }

    protected function down(): void
    {
        $this->table('currencies')
            ->drop();
    }
}
