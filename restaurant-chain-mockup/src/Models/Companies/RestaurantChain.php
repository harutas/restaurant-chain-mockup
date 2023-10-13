<?php

namespace Models\Companies;

use Interfaces\FileConvertible;
use Models\Companies\Company;

class RestaurantChain extends Company implements FileConvertible
{
  private string $chainId;
  private array $restaurantLocations;
  private string $cuisineType;
  private string $parentCompany;

  public function __construct(
    string $name,
    int $foundingYear,
    string $description,
    string $website,
    string $phone,
    string $industry,
    string $ceo,
    bool $isPubliclyTraded,
    string $country,
    string $founder,
    int $totalEmployees,
    string $chainId,
    array $restaurantLocations,
    string $cuisineType,
    string $parentCompany
  ) {
    parent::__construct(
      $name,
      $foundingYear,
      $description,
      $website,
      $phone,
      $industry,
      $ceo,
      $isPubliclyTraded,
      $country,
      $founder,
      $totalEmployees,
      $chainId,
      $restaurantLocations,
      $cuisineType,
      $parentCompany
    );
    $this->chainId = $chainId;
    $this->restaurantLocations = $restaurantLocations;
    $this->cuisineType = $cuisineType;
    $this->parentCompany = $parentCompany;
  }

  public function getChainId(): string
  {
    return $this->chainId;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getRestaurantLocations(): array
  {
    return $this->restaurantLocations;
  }

  public function getNumberOfLocations(): int
  {
    return count($this->restaurantLocations);
  }

  // restaurantLocationsの名前の配列を返す
  private function restaurantLocationsToStringArray(): array
  {
    $stringRestaurantLocationsNameArray = [];
    $restaurantLocations = $this->getRestaurantLocations();
    for ($i = 0; $i < count($restaurantLocations); $i++) {
      $stringRestaurantLocationsNameArray[] = $restaurantLocations[$i]->getName();
    }
    return $stringRestaurantLocationsNameArray;
  }

  public function toString(): string
  {
    return sprintf(
      "Restaurant Chain Name: %s\nFounding Year: %s\nDescription: %s\nWebsite: %s\nPhone: %s\nIndustry: %s\n
      CEO: %s\nIs Publicly Traded: %s\nCountry: %s\nFounder: %s\nTotal Employees: %s\n
      Chain ID: %s\nRestaurant Locations: %s\nCuisine Type: %s\nNumber Of Locations: %s\nParent Company: %s\n",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website,
      $this->phone,
      $this->industry,
      $this->ceo,
      $this->isPubliclyTraded,
      $this->chainId,
      implode(", ", $this->restaurantLocationsToStringArray()),
      $this->cuisineType,
      $this->getNumberOfLocations(),
      $this->parentCompany
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "
        <div class='restaurant-chain-card'>
          <div class='avatar'>SAMPLE</div>
          <h2>%s</h2>
          <p>Founding Year: %s</p>
          <p>Description: %s</p>
          <p>Website: %s</p>
          <p>Phone: %s</p>
          <p>Industry: %s</p>
          <p>CEO: %s</p>
          <p>Is Publicly Traded: %s</p>
          <p>Chain ID: %s</p>
          <p>Restaurant Locations: %s</p>
          <p>Cuisine Type: %s</p>
          <p>Number Of Locations: %s</p>
          <p>Parent Company: %s</p>
        </div>",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website,
      $this->phone,
      $this->industry,
      $this->ceo,
      $this->isPubliclyTraded,
      $this->chainId,
      implode(", ", $this->restaurantLocationsToStringArray()),
      $this->cuisineType,
      $this->getNumberOfLocations(),
      $this->parentCompany
    );
  }

  public function toMarkdown(): string
  {
    return sprintf(
      "## Restaurant Chain Name: {$this->name}
         - Founding Year: {$this->foundingYear}
         - Description: {$this->description}
         - Website: {$this->website}
         - Phone: {$this->phone}
         - Industry: {$this->industry}
         - CEO: {$this->ceo}
         - Is Publicly Traded: {$this->isPubliclyTraded}
         - Chain ID: {$this->chainId}
         - Restaurant Locations: %s
         - Cuisine Type: {$this->cuisineType}
         - Number Of Locations: %s
         - Parent Company: {$this->parentCompany}
      ",
      implode(", ", $this->restaurantLocationsToStringArray()),
      $this->getNumberOfLocations()
    );
  }

  public function toArray(): array
  {
    return [
      "name" => $this->name,
      "foundingYear" => $this->foundingYear,
      "description" => $this->description,
      "website" => $this->website,
      "phone" => $this->phone,
      "industry" => $this->industry,
      "ceo" => $this->ceo,
      "isPubliclyTraded" => $this->isPubliclyTraded,
      "chainId" => $this->chainId,
      "restaurantLocations" => $this->restaurantLocations,
      "cuisineType" => $this->cuisineType,
      "numberOfLocations" => $this->getNumberOfLocations(),
      "parentCompany" => $this->parentCompany
    ];
  }
}
