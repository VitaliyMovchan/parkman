<?php

declare(strict_types=1);

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateGaragesGeosTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('garages_geos')
            ->addColumn('garage_id', 'integer')
            ->addColumn('latitude', 'decimal')
            ->addColumn('longitude', 'decimal')
            ->addIndex('latitude')
            ->addIndex('longitude')
            ->addForeignKey('garage_id', 'garages')
            ->create();
    }

    protected function down(): void
    {
        $this->table('garages_geos')
            ->drop();
    }
}
