<?php

namespace Models\Locations;

use Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible
{
  private string $name;
  private string $address;
  private string $city;
  private string $state;
  private string $zipCode;
  private array $employees;
  private bool $isOpen;
  private bool $hasDriveThru;

  public function __construct(
    string $name,
    string $address,
    string $city,
    string $state,
    string $zipCode,
    array $employees,
    bool $isOpen,
    bool $hasDriveThru,
  ) {
    $this->name = $name;
    $this->address = $address;
    $this->city = $city;
    $this->state = $state;
    $this->zipCode = $zipCode;
    $this->employees = $employees;
    $this->isOpen = $isOpen;
    $this->hasDriveThru = $hasDriveThru;
  }

  public function toString(): string
  {
    return sprintf(
      "Restaurant Location Name: %s\nAddress: %s\nCity: %s\nState: %s\nZip Code: %s\nEmployees: %s\nIs Open: %s\nHas Drive Thru: %s\n",
      $this->name,
      $this->address,
      $this->city,
      $this->state,
      $this->zipCode,
      // Todo employeesを文字列に
      $this->employees,
      $this->isOpen,
      $this->hasDriveThru
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "
        <div class='restaurant-location-card'>
          <div class='avatar'>SAMPLE</div>
          <h2>%s</h2>
          <p>Address: %s</p>
          <p>City: %s</p>
          <p>State: %s</p>
          <p>Zip Code: %s</p>
          <p>Employees: %s</p>
          <p>Is Open: %s</p>
          <p>Has Drive Thru: %s</p>
        </div>",
      $this->name,
      $this->address,
      $this->city,
      $this->state,
      $this->zipCode,
      // Todo employeesを文字列に
      $this->employees,
      $this->isOpen,
      $this->hasDriveThru
    );
  }

  public function toMarkdown(): string
  {
    return "## Restaurant Location Name: {$this->name}
             - Address: {$this->address}
             - City: {$this->city}
             - State: {$this->state}
             - Zip Code: {$this->zipCode}
             // Todo employeesを文字列に
             - Employees: {$this->employees}
             - Is Open: {$this->isOpen}
             - Has Drive Thru: {$this->hasDriveThru}
             ";
  }

  public function toArray(): array
  {
    return [
      "name" => $this->name,
      "address" => $this->address,
      "city" => $this->city,
      "state" => $this->state,
      "zipCode" => $this->zipCode,
      "employees" => $this->employees,
      "isOpen" => $this->isOpen,
      "hasDriveThru" => $this->hasDriveThru
    ];
  }
}