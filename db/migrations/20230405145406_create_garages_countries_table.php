<?php

declare(strict_types=1);

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateGaragesCountriesTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('garages_countries')
            ->addColumn('garage_id', 'integer')
            ->addColumn('country_id', 'integer')
            ->addForeignKey('garage_id', 'garages')
            ->addForeignKey('country_id', 'countries')
            ->create();
    }

    protected function down(): void
    {
        $this->table('garages_countries')
            ->drop();
    }
}
