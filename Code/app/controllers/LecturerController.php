<?php
require_once __DIR__ . "/../models/Lecturer.php";
require_once __DIR__ . "/../models/Department.php";

class LecturerController {

    // tampilkan daftar semua dosen beserta nama departemen
    public function index() {
        $lecturerModel = new Lecturer();
        $data = $lecturerModel->getAll();
        include "../app/views/lecturers/index.php";
    }

    // tampilkan form tambah dosen dan data departemen untuk dropdown
    public function create() {
        $departmentModel = new Department();
        $departments = $departmentModel->getAll();
        include "../app/views/lecturers/create.php";
    }

    // simpan data dosen baru ke database
    public function store($post) {
        $lecturerModel = new Lecturer();
        $lecturerModel->insert($post);
        // redirect kembali ke halaman daftar dosen
        header("Location: " . BASEURL . "lecturers");
        exit;
    }

    // tampilkan form ubah dosen dan data departemen untuk dropdown
    public function edit($id) {
        $lecturerModel = new Lecturer();
        $data = $lecturerModel->getById($id);
        if (!$data) {
            header("Location: " . BASEURL . "lecturers");
            exit;
        }

        $departmentModel = new Department();
        $departments = $departmentModel->getAll();
        include "../app/views/lecturers/edit.php";
    }

    // simpan perubahan data dosen
    public function update($id, $post) {
        $lecturerModel = new Lecturer();
        $lecturerModel->update($id, $post);
        // redirect kembali ke halaman daftar dosen
        header("Location: " . BASEURL . "lecturers");
        exit;
    }

    // hapus data dosen berdasarkan id
    public function delete($id) {
        $lecturerModel = new Lecturer();
        $lecturerModel->delete($id);
        // redirect kembali ke halaman daftar dosen
        header("Location: " . BASEURL . "lecturers");
        exit;
    }
}
