<?php
include_once  __DIR__ . "/../Config/database.php";
include_once  __DIR__ . "/OperationInterface.php";

class Cart extends database implements OperationInterface
{

    public function insert(string $table, array $data): array
    {
        // TODO: Implement insert() method.
    }

    public function read(string $table, int $id = null): array
    {
        // TODO: Implement read() method.
    }

    public function update(string $table, int $id, array $data): array
    {
        // TODO: Implement update() method.
    }

    public function delete(string $table, int $id): bool
    {
        // TODO: Implement delete() method.
    }
}