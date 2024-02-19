<?php

namespace bitflix\models;
class User
{

	private int $id;
	private string $firstName;
	private string $secondName;
	private string $email;
	private string $password;
	private string $role;
	private int $createdAt;

	public function __construct(
		int    $id,
		string $firstName,
		string $secondName,
		string $email,
		string $password,
		string $role,
		int    $createdAt
	)
	{
		$this->id = $id;
		$this->firstName = $firstName;
		$this->secondName = $secondName;
		$this->email = $email;
		$this->password = $password;
		$this->role = $role;
		$this->createdAt = $createdAt;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getFirstName(): string
	{
		return $this->firstName;
	}

	public function getSecondName(): string
	{
		return $this->secondName;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getPassword(): string
	{
		return $this->password;
	}

	public function getRole(): string
	{
		return $this->role;
	}

	public function getCreatedAt(): int
	{
		return $this->createdAt;
	}

}