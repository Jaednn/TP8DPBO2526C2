<?php
require_once __DIR__ . "/../models/Department.php";

class DepartmentController {

    // tampilkan daftar semua departemen
    public function index() {
        $departmentModel = new Department();
        $data = $departmentModel->getAll();
        include "../app/views/departments/index.php";
    }

    // tampilkan form tambah departemen
    public function create() {
        include "../app/views/departments/create.php";
    }

    // simpan data departemen baru ke database
    public function store($post) {
        $departmentModel = new Department();
        $departmentModel->insert($post);
        // redirect kembali ke halaman daftar departemen
        header("Location: " . BASEURL . "departments");
        exit;
    }

    // tampilkan form ubah departemen berdasarkan id
    public function edit($id) {
        $departmentModel = new Department();
        $data = $departmentModel->getById($id);
        if (!$data) {
            header("Location: " . BASEURL . "departments");
            exit;
        }
        include "../app/views/departments/edit.php";
    }

    // simpan perubahan data departemen
    public function update($id, $post) {
        $departmentModel = new Department();
        $departmentModel->update($id, $post);
        // redirect kembali ke halaman daftar departemen
        header("Location: " . BASEURL . "departments");
        exit;
    }

    // hapus data departemen berdasarkan id
    public function delete($id) {
        $departmentModel = new Department();
        $departmentModel->delete($id);
        // redirect kembali ke halaman daftar departemen
        header("Location: " . BASEURL . "departments");
        exit;
    }
}
