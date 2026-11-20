<?php
require_once __DIR__ . "/../core/Database.php";

class Department extends Database {

    // ambil semua data departemen
    public function getAll() {
        return $this->fetchAll("SELECT * FROM departments ORDER BY id ASC");
    }

    // ambil satu data departemen berdasarkan id
    public function getById($id) {
        return $this->fetchOne("SELECT * FROM departments WHERE id = ?", [(int)$id]);
    }

    // tambah data departemen baru
    public function insert($data) {
        $departmentName = trim($data['department_name'] ?? '');
        $faculty = trim($data['faculty'] ?? '');
        $q = "INSERT INTO departments (department_name, faculty) VALUES (?, ?)";
        return $this->execute($q, [$departmentName, $faculty]);
    }

    // ubah data departemen berdasarkan id
    public function update($id, $data) {
        $departmentName = trim($data['department_name'] ?? '');
        $faculty = trim($data['faculty'] ?? '');
        $q = "UPDATE departments SET department_name = ?, faculty = ? WHERE id = ?";
        return $this->execute($q, [$departmentName, $faculty, (int)$id]);
    }

    // hapus data departemen berdasarkan id
    public function delete($id) {
        return $this->execute("DELETE FROM departments WHERE id = ?", [(int)$id]);
    }
}
