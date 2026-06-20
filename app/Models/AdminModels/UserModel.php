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

    public function countUsers(): int
    {
        return (int) $this->db->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }

    public function countByStatus(int $status): int
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE status = :s");
        $stmt->execute(['s' => $status]);
        return (int) $stmt->fetchColumn();
    }

    public function countNewSince(string $datetime): int
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE created_at >= :d");
        $stmt->execute(['d' => $datetime]);
        return (int) $stmt->fetchColumn();
    }

    public function recentUsers(int $limit = 5)
    {
        $stmt = $this->db->prepare(
            "SELECT id, name, username, email, role, created_at
             FROM users ORDER BY created_at DESC, id DESC LIMIT :lim"
        );
        $stmt->bindValue(':lim', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUserByEmail(string $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
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
