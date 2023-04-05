<?php

declare(strict_types=1);

use Phoenix\Database\Element\Index;
use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateCountriesTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('countries')
            ->addColumn('code', 'string')
            ->addColumn('name', 'string')
            ->addIndex('code', Index::TYPE_NORMAL, Index::METHOD_DEFAULT, 'code')
            ->addIndex('code', Index::TYPE_UNIQUE, Index::METHOD_DEFAULT, 'code_unique')
            ->create();
    }

    protected function down(): void
    {
        $this->table('countries')
            ->drop();
    }
}
