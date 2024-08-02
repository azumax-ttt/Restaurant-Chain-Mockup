<?php

namespace Models;

use Models\Users\Employee;

class RestaurantLocation
{
    private string $id;
    protected string $name;
    protected string $address;
    protected string $city;
    protected string $state;
    protected string $zipCode;
    protected array $employees;
    protected bool $isOpen;


    public function __construct(
        string $name, string $address, string $city,
        string $state, string $zipCode, array $employees,
        bool $isOpen
    )
    {
        $this->id = $this->sanitizeHtmlId(uniqid($name. '-'));
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
    }

    public function sanitizeHtmlId($str): string
    {
        return preg_replace(
            '/[^a-zA-Z0-9\-_:.]/',
            '',
            ltrim($str, '0123456789')
        );
    }
    public function toString(): string
    {
        return sprintf(
            "Company Name: %s\n
            Address: %s, %s, %s\n
            ZipCode: %s\n",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode
        );
    }
    public function __toString(): string
    {
        return $this->name;
    }

    public function getEmployeesHTML(): string
    {
        return implode(
            ' ',
            array_map(function (Employee $employee) {
            return $employee->toHTML();
        }, $this->employees));
    }

    public function toHTML(): string
    {
        return "
        <div>
          <h1>{$this->name}</h1>
          <p>{$this->toString()}</p>
          <ul>
            {$this->getEmployeesHTML()}
          </ul>
        </div>
        ";
    }
}