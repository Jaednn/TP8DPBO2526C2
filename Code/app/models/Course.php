<?php
require_once __DIR__ . "/../core/Database.php";

class Course extends Database {

    // ambil semua data mata kuliah beserta nama dosen pengampu
    public function getAll() {
        $q = "SELECT courses.*, lecturers.name AS lecturer_name 
              FROM courses 
              LEFT JOIN lecturers ON courses.lecturer_id = lecturers.id 
              ORDER BY courses.id ASC";
        return $this->fetchAll($q);
    }

    // ambil satu data mata kuliah berdasarkan id
    public function getById($id) {
        return $this->fetchOne("SELECT * FROM courses WHERE id = ?", [(int)$id]);
    }

    // tambah data mata kuliah baru
    public function insert($data) {
        $courseCode = trim($data['course_code'] ?? '');
        $courseName = trim($data['course_name'] ?? '');
        $credits = (int)($data['credits'] ?? 0);
        $lecturerId = !empty($data['lecturer_id']) ? (int)$data['lecturer_id'] : null;

        $q = "INSERT INTO courses (course_code, course_name, credits, lecturer_id) VALUES (?, ?, ?, ?)";
        return $this->execute($q, [$courseCode, $courseName, $credits, $lecturerId]);
    }

    // ubah data mata kuliah berdasarkan id
    public function update($id, $data) {
        $courseCode = trim($data['course_code'] ?? '');
        $courseName = trim($data['course_name'] ?? '');
        $credits = (int)($data['credits'] ?? 0);
        $lecturerId = !empty($data['lecturer_id']) ? (int)$data['lecturer_id'] : null;

        $q = "UPDATE courses SET course_code = ?, course_name = ?, credits = ?, lecturer_id = ? WHERE id = ?";
        return $this->execute($q, [$courseCode, $courseName, $credits, $lecturerId, (int)$id]);
    }

    // hapus data mata kuliah berdasarkan id
    public function delete($id) {
        return $this->execute("DELETE FROM courses WHERE id = ?", [(int)$id]);
    }
}
