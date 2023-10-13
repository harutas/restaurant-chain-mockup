<?php

namespace Models\Locations;

use Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible
{
  private string $id;
  private string $name;
  private string $address;
  private string $city;
  private string $state;
  private string $zipCode;
  private array $employees;
  private bool $isOpen;
  private bool $hasDriveThru;

  public function __construct(
    string $id,
    string $name,
    string $address,
    string $city,
    string $state,
    string $zipCode,
    array $employees,
    bool $isOpen,
    bool $hasDriveThru,
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->address = $address;
    $this->city = $city;
    $this->state = $state;
    $this->zipCode = $zipCode;
    $this->employees = $employees;
    $this->isOpen = $isOpen;
    $this->hasDriveThru = $hasDriveThru;
  }

  public function getId(): string
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getAddress(): string
  {
    return $this->address;
  }

  public function getCity(): string
  {
    return $this->city;
  }

  public function getState(): string
  {
    return $this->state;
  }

  public function getZipCode(): string
  {
    return $this->zipCode;
  }

  public function getEmployees(): array
  {
    return $this->employees;
  }

  // employeeの名前の配列を返す
  private function employeesToStringArray(): array
  {
    $stringEmployeeNameArray = [];
    $employees = $this->getEmployees();
    for ($i = 0; $i < count($employees); $i++) {
      $stringEmployeeNameArray[] = $employees[$i]->getFirstName() . " " . $employees[$i]->getLastName();
    }
    return $stringEmployeeNameArray;
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
      implode(", ", $this->employeesToStringArray()),
      $this->isOpen ? "Open" : "Close",
      $this->hasDriveThru ? "Available" : "Not Available"
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "
        <div class='restaurant-location-card'>
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
      implode(", ", $this->employeesToStringArray()),
      $this->isOpen ? "Open" : "Close",
      $this->hasDriveThru ? "Available" : "Not Available"
    );
  }

  public function toMarkdown(): string
  {
    return sprintf(
      "## Restaurant Location Name: {$this->name}
   - Address: {$this->address}
   - City: {$this->city}
   - State: {$this->state}
   - Zip Code: {$this->zipCode}
   - Employees: %s
   - Is Open: %s
   - Has Drive Thru: %s
      ",
      implode(", ", $this->employeesToStringArray()),
      $this->isOpen ? "Open" : "Close",
      $this->hasDriveThru ? "Available" : "Not Available"
    );
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
