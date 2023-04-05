<?php

declare(strict_types=1);

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateGaragesHourlyPricesTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('garages_hourly_prices')
            ->addColumn('garage_id', 'integer')
            ->addColumn('currency_id', 'integer')
            ->addColumn('amount', 'float')
            ->addForeignKey('garage_id', 'garages')
            ->addForeignKey('currency_id', 'currencies')
            ->create();
    }

    protected function down(): void
    {
        $this->table('garages_hourly_prices')
            ->drop();
    }
}
