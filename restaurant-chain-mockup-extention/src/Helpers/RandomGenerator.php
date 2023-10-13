<?php

namespace Helpers;

use Faker\Factory;
use Models\Users\User;
use Models\Users\Employee;
use Models\Locations\RestaurantLocation;
use Models\Companies\RestaurantChain;

class RandomGenerator
{
  public static function user(): User
  {
    $faker = Factory::create();

    return new User(
      $faker->randomNumber(),
      $faker->firstName(),
      $faker->lastName(),
      $faker->email,
      $faker->password,
      $faker->phoneNumber,
      $faker->address,
      $faker->dateTimeThisCentury,
      $faker->dateTimeBetween('-10 years', '+20 years'),
      $faker->randomElement(['admin', 'user', 'editor'])
    );
  }

  public static function users(int $min, int $max): array
  {
    $faker = Factory::create();
    $users = [];
    $numOfUsers = $faker->numberBetween($min, $max);

    for ($i = 0; $i < $numOfUsers; $i++) {
      $users[] = self::user();
    }

    return $users;
  }

  public static function employee(int $minSalary, int $maxSalary): Employee
  {
    $faker = Factory::create();

    return new Employee(
      $faker->randomNumber(),
      $faker->firstName(),
      $faker->lastName(),
      $faker->email,
      $faker->password,
      $faker->phoneNumber,
      $faker->address,
      $faker->dateTimeThisCentury,
      $faker->dateTimeBetween('-10 years', '+20 years'),
      $faker->randomElement(['admin', 'user', 'editor']),
      $faker->jobTitle(),
      $faker->randomFloat(1, $minSalary, $maxSalary),
      $faker->dateTimeThisCentury(),
      $faker->words()
    );
  }

  public static function employees(int $minEmployees, int $maxEmployees, int $minSalary, int $maxSalary): array
  {
    $faker = Factory::create();
    $employees = [];
    $numberOfEmployees = $faker->numberBetween($minEmployees, $maxEmployees);

    for ($i = 0; $i < $numberOfEmployees; $i++) {
      $employees[] = self::employee($minSalary, $maxSalary);
    }

    return $employees;
  }

  public static function restaurantLocation(int $minEmployees, int $maxEmployees, int $minSalary, int $maxSalary): RestaurantLocation
  {
    $faker = Factory::create();
    $employees = self::Employees($minEmployees, $maxEmployees, $minSalary, $maxSalary);

    return new RestaurantLocation(
      $faker->uuid(),
      $faker->company(),
      $faker->address(),
      $faker->city(),
      $faker->state(),
      $faker->postcode(),
      $employees,
      $faker->boolean(),
      $faker->boolean()
    );
  }

  public static function restaurantLocations(int $minEmployees, int $maxEmployees, int $minSalary, int $maxSalary, int $minLocations, int $maxLocations): array
  {
    $faker = Factory::create();
    $restaurantLocations = [];
    $numOfRestaurantLocations = $faker->numberBetween($minLocations, $maxLocations);

    for ($i = 0; $i < $numOfRestaurantLocations; $i++) {
      $restaurantLocations[] = self::restaurantLocation($minEmployees, $maxEmployees, $minSalary, $maxSalary);
    }
    return $restaurantLocations;
  }

  public static function restaurantChain(int $minEmployees, int $maxEmployees, int $minSalary, int $maxSalary, int $minLocations, int $maxLocations): RestaurantChain
  {
    $faker = Factory::create();
    $restaurantLocations = self::restaurantLocations($minEmployees, $maxEmployees, $minSalary, $maxSalary, $minLocations, $maxLocations);

    return new RestaurantChain(
      $faker->company(),
      $faker->date("Y"),
      $faker->sentence(),
      $faker->url,
      $faker->phoneNumber(),
      $faker->word(),
      $faker->name(),
      $faker->boolean(),
      $faker->country(),
      $faker->name(),
      $faker->uuid(),
      $restaurantLocations,
      $faker->word(),
      $faker->company()
    );
  }

  public static function restaurantChains(int $min, int $max, int $minEmployees, int $maxEmployees, int $minSalary, int $maxSalary, int $minLocations, int $maxLocations): array
  {
    $faker = Factory::create();
    $restaurantChains = [];
    $numberOfRestaurantCains = $faker->numberBetween($min, $max);

    for ($i = 0; $i < $numberOfRestaurantCains; $i++) {
      $restaurantChains[] = self::restaurantChain($minEmployees, $maxEmployees, $minSalary, $maxSalary, $minLocations, $maxLocations);
    }

    return $restaurantChains;
  }
}
