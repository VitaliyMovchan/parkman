<?php

namespace App\Application\Actions\Garage;

use App\Application\Actions\Action;
use Illuminate\Database\Capsule\Manager;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

/**
 * @property Manager databaseManager
 */
class ListGaragesAction extends Action
{

    protected Manager $databaseManager;

    /**
     * @param LoggerInterface $logger
     * @param Manager $databaseManager
     */
    public function __construct(LoggerInterface $logger, Manager $databaseManager)
    {
        parent::__construct($logger);

        $this->databaseManager = $databaseManager;
    }

    /**
     * @return Response
     */
    protected function action(): Response
    {
        $administratorName = $this->request->getAttribute("administratorName", "");
        $countryName = $this->request->getAttribute("countryName", "");
        $latitude = $this->request->getAttribute("latitude", 0);
        $longitude = $this->request->getAttribute("longitude", 0);

        $table = $this->databaseManager
            ->table("garages")
            ->select([
                "garages.id as garage_id",
                "garages.name as name",
                "garages_hourly_prices.amount as hourly_price",
                "currencies.code as currency",
                "administrators_emails.value as contact_email",
                Manager::raw("CONCAT(garages.latitude, ' ', garages.longitude) as point"),
                "administrators.id as owner_id",
                "administrators.name as garage_owner",
            ])
            ->join("garages_hourly_prices", "garages.id", "=", "garages_hourly_prices.garage_id")
            ->join("currencies", "currencies.id", "=", "garages_hourly_prices.currency_id");

        if ($administratorName) {
            $table->join("garages_administrators", "garages.id", "=", "garages_administrators.garage_id")
                ->join("administrators", "administrators.id", "=", "garages_administrators.administrator_id")
                ->join("administrators_emails", "administrators_emails.administrator_id", "=", "administrators.id")
                ->where("administrators.name", "=", $administratorName);
        } else {
            $table->join("garages_administrators", "garages.id", "=", "garages_administrators.garage_id", "left")
                ->join("administrators", "administrators.id", "=", "garages_administrators.administrator_id", "left")
                ->join("administrators_emails", "administrators_emails.administrator_id", "=", "administrators.id", "left");
        }

        if ($countryName) {
            $table->join("garages_countries", "garages.id", "=", "garages_countries.garage_id")
                ->join("countries", "countries.id", "=", "garages_countries.country_id")
                ->where("countries.name", "=", $countryName);
        } else {
            $table->join("garages_countries", "garages.id", "=", "garages_countries.garage_id", "left")
                ->join("countries", "countries.id", "=", "garages_countries.country_id", "left");
        }

        if ($latitude) {
            $table->where("garages.latitude", "=", $latitude);
        }

        if ($longitude) {
            $table->where("garages.longitude", "=", $longitude);
        }

        $garages = $table->get();

        return $this->respondWithData(
            [
                "garages" => $garages
            ],
            $garages->isEmpty() ? 404 : 200
        );
    }
}