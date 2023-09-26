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

  public static function employee(): Employee
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
      $faker->randomFloat(1, 100, 500),
      $faker->dateTimeThisCentury(),
      $faker->words()
    );
  }

  public static function restaurantChain(): RestaurantChain
  {
    $faker = Factory::create();

    // Todo: RestaurantLocationsを生成
    $restaurantLocations = [];

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
      $faker->randomNumber(null, false),
      $faker->uuid(),
      $restaurantLocations,
      $faker->word(),
      $faker->company()
    );
  }

  public static function restaurantLocation(): RestaurantLocation
  {
    $faker = Factory::create();

    // TODO: employeesを作成
    $numberOfEmployees = $faker->numberBetween(0, 10);

    for ($i = 0; $i < $numberOfEmployees; $i++) {
      $numberOfEmployees[] = self::employee();
    }
    $employees = [];

    return new RestaurantLocation(
      $faker->name(),
      $faker->address(),
      $faker->city(),
      $faker->state(),
      $faker->postcode(),
      $employees,
      $faker->boolean(),
      $faker->boolean()
    );
  }
}
