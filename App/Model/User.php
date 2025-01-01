<?php

include_once  __DIR__ . "/../Config/database.php";
include_once  __DIR__ . "/OperationInterface.php";
include_once  __DIR__ . "/../Api/Data/UserInterface.php";
class User extends database implements UserInterface
{


    public function setId(int $id)
    {
        // TODO: Implement setId() method.
    }

    public function getId(): int
    {
        // TODO: Implement getId() method.
    }

    public function setFirstName(string $firstName)
    {
        // TODO: Implement setFirstName() method.
    }

    public function getFirstName(): string
    {
        // TODO: Implement getFirstName() method.
    }

    public function setLastName(string $lastName)
    {
        // TODO: Implement setLastName() method.
    }

    public function getLastName(): string
    {
        // TODO: Implement getLastName() method.
    }

    public function setEmail(string $email)
    {
        // TODO: Implement setEmail() method.
    }

    public function getEmail(): string
    {
        // TODO: Implement getEmail() method.
    }

    public function setPhone(string $phone)
    {
        // TODO: Implement setPhone() method.
    }

    public function getPhone(): string
    {
        // TODO: Implement getPhone() method.
    }

    public function setPassword(string $password)
    {
        // TODO: Implement setPassword() method.
    }

    public function getPassword(): string
    {
        // TODO: Implement getPassword() method.
    }

    public function setGender(string $gender)
    {
        // TODO: Implement setGender() method.
    }

    public function getGender(): string
    {
        // TODO: Implement getGender() method.
    }

    public function setImage(string $image)
    {
        // TODO: Implement setImage() method.
    }

    public function getImage(): string
    {
        // TODO: Implement getImage() method.
    }

    public function setStatus(int $status)
    {
        // TODO: Implement setStatus() method.
    }

    public function getStatus(): int
    {
        // TODO: Implement getStatus() method.
    }

    public function setBirthdate(string $birthdate)
    {
        // TODO: Implement setBirthdate() method.
    }

    public function getBirthdate(): ?string
    {
        // TODO: Implement getBirthdate() method.
    }

    public function setCode(int $code)
    {
        // TODO: Implement setCode() method.
    }

    public function getCode(): ?int
    {
        // TODO: Implement getCode() method.
    }

    public function setBonusPerYear(int $bonus)
    {
        // TODO: Implement setBonusPerYear() method.
    }

    public function getBonusPerYear(): int
    {
        // TODO: Implement getBonusPerYear() method.
    }

    public function setBonusPerMonth(int $bonus)
    {
        // TODO: Implement setBonusPerMonth() method.
    }

    public function getBonusPerMonth(): int
    {
        // TODO: Implement getBonusPerMonth() method.
    }

    public function setEmailVerifiedAt(string $emailVerifiedAt)
    {
        // TODO: Implement setEmailVerifiedAt() method.
    }

    public function getEmailVerifiedAt(): ?string
    {
        // TODO: Implement getEmailVerifiedAt() method.
    }

    public function setCreatedAt(string $createdAt)
    {
        // TODO: Implement setCreatedAt() method.
    }

    public function getCreatedAt(): string
    {
        // TODO: Implement getCreatedAt() method.
    }

    public function setUpdatedAt(string $updatedAt)
    {
        // TODO: Implement setUpdatedAt() method.
    }

    public function getUpdatedAt(): string
    {
        // TODO: Implement getUpdatedAt() method.
    }
}