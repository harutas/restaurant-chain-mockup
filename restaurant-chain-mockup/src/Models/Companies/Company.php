<?php

namespace Models\Companies;

use Interfaces\FileConvertible;

class Company implements FileConvertible
{
  protected string $name;
  protected int $foundingYear;
  protected string $description;
  protected string $website;
  protected string $phone;
  protected string $industry;
  protected string $ceo;
  protected bool $isPubliclyTraded;
  public function __construct(
    string $name,
    int $foundingYear,
    string $description,
    string $website,
    string $phone,
    string $industry,
    string $ceo,
    bool $isPubliclyTraded,
  ) {
    $this->name = $name;
    $this->foundingYear = $foundingYear;
    $this->description = $description;
    $this->website = $website;
    $this->phone = $phone;
    $this->industry = $industry;
    $this->ceo = $ceo;
    $this->isPubliclyTraded = $isPubliclyTraded;
  }

  public function toString(): string
  {
    return sprintf(
      "Company Name: %s\nFounding Year: %s\nDescription: %s\nWebsite: %s\nPhone: %s\nIndustry: %s\n
      CEO: %s\nIs Publicly Traded: %s\nCountry: %s\nFounder: %s\nTotal Employees: %s\n",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website,
      $this->phone,
      $this->industry,
      $this->ceo,
      $this->isPubliclyTraded,
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "
        <div class='company-card'>
          <div class='avatar'>SAMPLE</div>
          <h2>%s</h2>
          <p>Founding Year: %s</p>
          <p>Description: %s</p>
          <p>Website: %s</p>
          <p>Phone: %s</p>
          <p>Industry: %s</p>
          <p>CEO: %s</p>
          <p>Is Publicly Traded: %s</p>
        </div>",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website,
      $this->phone,
      $this->industry,
      $this->ceo,
      $this->isPubliclyTraded,
    );
  }

  public function toMarkdown(): string
  {
    return "## Company Name: {$this->name}
             - Founding Year: {$this->foundingYear}
             - Description: {$this->description}
             - Website: {$this->website}
             - Phone: {$this->phone}
             - Industry: {$this->industry}
             - CEO: {$this->ceo}
             - Is Publicly Traded: {$this->isPubliclyTraded}
             ";
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
    ];
  }
}
