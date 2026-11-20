CREATE DATABASE IF NOT EXISTS db_academic;
USE db_academic;

-- Tabel Departments
CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    faculty VARCHAR(100) NOT NULL
);

-- Tabel Lecturers
CREATE TABLE lecturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nidn VARCHAR(20) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    join_date DATE NOT NULL,
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL
);

-- Tabel Courses
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(20) NOT NULL,
    course_name VARCHAR(100) NOT NULL,
    credits INT NOT NULL,
    lecturer_id INT,
    FOREIGN KEY (lecturer_id) REFERENCES lecturers(id) ON DELETE SET NULL
);

-- Data Dummy untuk pengetesan awal
INSERT INTO departments (department_name, faculty) VALUES
('Ilmu Komputer', 'FPMIPA'),
('Pendidikan Ilmu Komputer', 'FPMIPA'),
('Matematika', 'FPMIPA');

INSERT INTO lecturers (name, nidn, phone, join_date, department_id) VALUES
('Dr. Defun, M.T ', '0012058501', '081234567890', '2018-08-01', 1),
('Rusdi Fuad, M.Kom.', '0024099002', '081987654321', '2020-02-15', 2);

INSERT INTO courses (course_code, course_name, credits, lecturer_id) VALUES
('IK201', 'Desain dan Pemrograman Berbasis Objek', 3, 1),
('IK202', 'Sistem Basis Data', 3, 2);