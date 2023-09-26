<?php

namespace Models\Users;

use DateTime;
use Interfaces\FileConvertible;
use Models\Users\User;

class Employee extends User implements FileConvertible
{
  protected string $jobTitle;
  protected float $salary;
  protected DateTime $startDate;
  protected array $awards;

  public function __construct(
    int $id,
    string $firstName,
    string $lastName,
    string $email,
    string $password,
    string $phoneNumber,
    string $address,
    DateTime $birthDate,
    DateTime $membershipExpirationDate,
    string $role,
    string $jobTitle,
    float $salary,
    DateTime $startDate,
    array $awards
  ) {
    parent::__construct(
      $id,
      $firstName,
      $lastName,
      $email,
      $password,
      $phoneNumber,
      $address,
      $birthDate,
      $membershipExpirationDate,
      $role
    );
    $this->jobTitle = $jobTitle;
    $this->salary = $salary;
    $this->startDate = $startDate;
    $this->awards = $awards;
  }

  public function getFirstName(): string
  {
    return $this->firstName;
  }
  public function getLastName(): string
  {
    return $this->lastName;
  }

  public function toString(): string
  {
    return sprintf(
      "User ID: %d\nName: %s %s\nEmail: %s\nPhone Number: %s\nAddress: %s\nBirth Date: %s\nMembership Expiration Date: %s\nRole: %s\nJob Title: %s\nSalary: %s\nStart Date: %s\nAwards: %s\n",
      $this->id,
      $this->firstName,
      $this->lastName,
      $this->email,
      $this->phoneNumber,
      $this->address,
      $this->birthDate->format("Y-m-d"),
      $this->membershipExpirationDate->format("Y-m-d"),
      $this->role,
      $this->jobTitle,
      $this->salary,
      $this->startDate->format("Y-m-d"),
      implode(", ", $this->awards)
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "
        <div class='user-card'>
          <div class='avatar'>SAMPLE</div>
          <h2>%s %s</h2>
          <p>%s</p>
          <p>%s</p>
          <p>%s</p>
          <p>Birth Date: %s</p>
          <p>Membership Expiration Date: %s</p>
          <p>Role: %s</p>
          <p>Job Title: %s</p>
          <p>Salary: %s</p>
          <p>Start Date: %s</p>
          <p>Awards: %s</p>
        </div>",
      $this->firstName,
      $this->lastName,
      $this->email,
      $this->phoneNumber,
      $this->address,
      $this->birthDate->format("Y-m-d"),
      $this->membershipExpirationDate->format("Y-m-d"),
      $this->role,
      $this->jobTitle,
      $this->salary,
      $this->startDate->format("Y-m-d"),
      implode(", ", $this->awards)
    );
  }

  public function toMarkdown(): string
  {
    return sprintf(
      "## User: {$this->firstName} {$this->lastName}
        - Email: {$this->email}
        - Phone Number: {$this->phoneNumber}
        - Address: {$this->address}
        - Birth Date: {$this->birthDate->format("Y-m-d")}
        - Role: {$this->role}
        - Job Title: {$this->jobTitle}
        - Salary: {$this->salary}
        - Start Date: {$this->startDate->format("Y-m-d")}
        - Awards: %s
    ",
      implode(', ', $this->awards)
    );
  }

  public function toArray(): array
  {
    return [
      "id" => $this->id,
      "firstName" => $this->firstName,
      "lastName" => $this->lastName,
      "email" => $this->email,
      "phoneNumber" => $this->phoneNumber,
      "address" => $this->address,
      "birthDate" => $this->birthDate,
      "role" => $this->role,
      "jobTitle" => $this->jobTitle,
      "salary" => $this->salary,
      "startDate" => $this->startDate,
      "awards" => $this->awards
    ];
  }
}
