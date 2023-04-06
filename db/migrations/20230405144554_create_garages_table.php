<?php

declare(strict_types=1);

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateGaragesTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('garages')
            ->addColumn('name', 'string')
            ->addColumn('latitude', 'decimal', ['length' => 17, 'decimals' => 15])
            ->addColumn('longitude', 'decimal', ['length' => 17, 'decimals' => 15])
            ->addIndex('latitude')
            ->addIndex('longitude')
            ->create();
    }

    protected function down(): void
    {
        $this->table('garages')
            ->drop();
    }
}
