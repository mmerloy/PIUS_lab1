<?php

require_once './vendor/autoload.php';

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Email;

class User
{
    private int $id;
    protected string $name;
    protected string $email;
    protected string $password;
    protected DateTime $my_datetime;

    public function __construct(int $id, string $name, string $email, string $password)
    {
        $this->validation_id($id);
        $this->id = $id;

        $this->validation_name($name);
        $this->name = $name;

        $this->validation_email($email);
        $this->email = $email;

        $this->validation_password($password);
        $this->password = $password;

        $this->my_datetime = new Datetime();
    }

    public function validation_id(int $id): void
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($id, [
            new LessThan(['value' => 9999999,]),
            new GreaterThan(['value' => 1000000,]),
            new NotBlank(),
        ]);
        if (count($violations) > 0) {
            echo 'Incorrect id'."<br>";
        }
    }

    public function validation_name(string $name): void
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($name, [
            new Regex(['pattern' => '/^[A-Z][a-z]+/']),
            new NotBlank(),
        ]);
        if (count($violations) > 0) {
            echo 'Incorrect name'."<br>";
        };
    }

    public function validation_email(string $email): void
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($email, [
            new Email(),
            new NotBlank(),
        ]);
        if (count($violations) > 0) {
            echo 'Incorrect email'."<br>";
        };
    }

    public function validation_password(string $password): void
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($password, [
            new Regex(['pattern' => '/^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&? "]).*$/']),
            new NotBlank(),
        ]);
        if (count($violations) > 0) {
            echo 'Incorrect password'."<br>";
        };
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getMydatetime(): DateTime
    {
        return $this->my_datetime;
    }
}
