<?php

namespace App\Models\AdminModels;

use App\Models\Model;

class UserModel extends Model
{
    public function getAllUsers()
    {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getUserByUsername(string $username)
{
    $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
    $stmt->execute(['username' => $username]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}


    public function createUser(array $data)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO users (name, username, email, password, role, status, created_at, updated_at)
             VALUES (:name, :username, :email, :password, :role, :status, NOW(), NOW())"
        );

        return $stmt->execute([
            'name'     => $data['name'],
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role'     => $data['role'] ?? 'viewer',
            'status'   => $data['status'] ?? 1,
        ]);
    }

    public function find($id)
{
    $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

public function all()
{
    $stmt = $this->db->query("SELECT id, name, email FROM users");
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}
}
