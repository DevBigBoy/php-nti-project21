<?php

interface UserInterface {
    // Define constants for column names
     const COLUMN_ID = 'id';
     const COLUMN_FIRST_NAME = 'first_name';
     const COLUMN_LAST_NAME = 'last_name';
     const COLUMN_EMAIL = 'email';
     const COLUMN_PHONE = 'phone';
     const COLUMN_PASSWORD = 'password';
     const COLUMN_GENDER = 'gender';
     const COLUMN_IMAGE = 'image';
     const COLUMN_STATUS = 'status';
     const COLUMN_BIRTHDATE = 'birthdate';
     const COLUMN_CODE = 'code';
     const COLUMN_BONUS_PER_YEAR = 'bonus_per_year';
     const COLUMN_BONUS_PER_MONTH = 'bonus_per_month';
     const COLUMN_EMAIL_VERIFIED_AT = 'email_verified_at';
     const COLUMN_CREATED_AT = 'created_at';
     const COLUMN_UPDATED_AT = 'updated_at';

    // Method definitions (Setters & Getters)
    public function setId(int $id);
    public function getId(): int;

    public function setFirstName(string $firstName);
    public function getFirstName(): string;

    public function setLastName(string $lastName);
    public function getLastName(): string;

    public function setEmail(string $email);
    public function getEmail(): string;

    public function setPhone(string $phone);
    public function getPhone(): string;

    public function setPassword(string $password);
    public function getPassword(): string;

    public function setGender(string $gender);
    public function getGender(): string;

    public function setImage(string $image);
    public function getImage(): string;

    public function setStatus(int $status);
    public function getStatus(): int;

    public function setBirthdate(?string $birthdate);
    public function getBirthdate(): ?string;

    public function setCode(?int $code);
    public function getCode(): ?int;

    public function setBonusPerYear(int $bonus);
    public function getBonusPerYear(): int;

    public function setBonusPerMonth(int $bonus);
    public function getBonusPerMonth(): int;

    public function setEmailVerifiedAt(?string $emailVerifiedAt);
    public function getEmailVerifiedAt(): ?string;

    public function setCreatedAt(string $createdAt);
    public function getCreatedAt(): string;

    public function setUpdatedAt(string $updatedAt);
    public function getUpdatedAt(): string;
}
