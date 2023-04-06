<?php

declare(strict_types=1);

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateGaragesAdministratorsTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('garages_administrators')
            ->addColumn('garage_id', 'integer')
            ->addColumn('administrator_id', 'integer')
            ->addForeignKey('garage_id', 'garages')
            ->addForeignKey('administrator_id', 'administrators')
            ->create();
    }

    protected function down(): void
    {
        $this->table('garages_administrators')
            ->drop();
    }
}
