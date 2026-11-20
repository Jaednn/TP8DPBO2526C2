<?php
require_once __DIR__ . "/../models/Course.php";
require_once __DIR__ . "/../models/Lecturer.php";

class CourseController {

    // tampilkan daftar semua mata kuliah beserta nama dosen
    public function index() {
        $courseModel = new Course();
        $data = $courseModel->getAll();
        include "../app/views/courses/index.php";
    }

    // tampilkan form tambah mata kuliah dan data dosen untuk dropdown
    public function create() {
        $lecturerModel = new Lecturer();
        $lecturers = $lecturerModel->getAll();
        include "../app/views/courses/create.php";
    }

    // simpan data mata kuliah baru ke database
    public function store($post) {
        $courseModel = new Course();
        $courseModel->insert($post);
        // redirect kembali ke halaman daftar mata kuliah
        header("Location: " . BASEURL . "courses");
        exit;
    }

    // tampilkan form ubah mata kuliah dan data dosen untuk dropdown
    public function edit($id) {
        $courseModel = new Course();
        $data = $courseModel->getById($id);
        if (!$data) {
            header("Location: " . BASEURL . "courses");
            exit;
        }

        $lecturerModel = new Lecturer();
        $lecturers = $lecturerModel->getAll();
        include "../app/views/courses/edit.php";
    }

    // simpan perubahan data mata kuliah
    public function update($id, $post) {
        $courseModel = new Course();
        $courseModel->update($id, $post);
        // redirect kembali ke halaman daftar mata kuliah
        header("Location: " . BASEURL . "courses");
        exit;
    }

    // hapus data mata kuliah berdasarkan id
    public function delete($id) {
        $courseModel = new Course();
        $courseModel->delete($id);
        // redirect kembali ke halaman daftar mata kuliah
        header("Location: " . BASEURL . "courses");
        exit;
    }
}
