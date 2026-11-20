<?php
require_once __DIR__ . "/../core/Database.php";

class Lecturer extends Database {

    // ambil semua data dosen beserta nama departemen dan fakultas
    public function getAll() {
        $q = "SELECT lecturers.*, departments.department_name, departments.faculty 
              FROM lecturers 
              LEFT JOIN departments ON lecturers.department_id = departments.id 
              ORDER BY lecturers.id ASC";
        return $this->fetchAll($q);
    }

    // ambil satu data dosen berdasarkan id
    public function getById($id) {
        return $this->fetchOne("SELECT * FROM lecturers WHERE id = ?", [(int)$id]);
    }

    // tambah data dosen baru
    public function insert($data) {
        $name = trim($data['name'] ?? '');
        $nidn = trim($data['nidn'] ?? '');
        $phone = trim($data['phone'] ?? '');
        $joinDate = trim($data['join_date'] ?? '');
        $departmentId = !empty($data['department_id']) ? (int)$data['department_id'] : null;

        $q = "INSERT INTO lecturers (name, nidn, phone, join_date, department_id) VALUES (?, ?, ?, ?, ?)";
        return $this->execute($q, [$name, $nidn, $phone, $joinDate, $departmentId]);
    }

    // ubah data dosen berdasarkan id
    public function update($id, $data) {
        $name = trim($data['name'] ?? '');
        $nidn = trim($data['nidn'] ?? '');
        $phone = trim($data['phone'] ?? '');
        $joinDate = trim($data['join_date'] ?? '');
        $departmentId = !empty($data['department_id']) ? (int)$data['department_id'] : null;

        $q = "UPDATE lecturers SET name = ?, nidn = ?, phone = ?, join_date = ?, department_id = ? WHERE id = ?";
        return $this->execute($q, [$name, $nidn, $phone, $joinDate, $departmentId, (int)$id]);
    }

    // hapus data dosen berdasarkan id
    public function delete($id) {
        return $this->execute("DELETE FROM lecturers WHERE id = ?", [(int)$id]);
    }
}
