# TP9DPBO2025
TUGAS PRAKTIKUM 9 DPBO MVC PHP Ilmu Komputer Universitas Pendidikan Indonesia

Aplikasi web berbasis **PHP Native + MySQL** dengan arsitektur **MVC (Model–View–Controller)**.  
Digunakan untuk mengelola data akademik:

- Departments (Departemen / Program Studi)
- Lecturers (Dosen)
- Courses (Mata Kuliah)

Semua tabel memiliki fitur **CRUD (Create, Read, Update, Delete)** dan tampilan menggunakan **Bootstrap**.

---

### 📄 Janji
Saya Afzaal Zaidan Febryanto dengan NIM 2508692 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

## 🚀 Fitur Utama

| Modul | Fitur |
|-------|-------|
| Departments | Create, Read, Edit, Delete |
| Lecturers | Create, Read, Edit, Delete + relasi ke Department |
| Courses | Create, Read, Edit, Delete + relasi ke Lecturer |

### Relasi
- DEPARTMENTS (1) ────< (Many) LECTURERS
- LECTURERS (1) ────< (Many) COURSES

- **Lecturers** menggunakan **dropdown untuk memilih Department**, dan halaman index menampilkan **nama departemen dan fakultas** (`LEFT JOIN departments`). Jika belum memiliki relasi (NULL), ditampilkan tanda `-`.
- **Courses** menggunakan **dropdown untuk memilih Lecturer**, dan halaman index menampilkan **nama dosen pengampu** (`LEFT JOIN lecturers`). Jika belum memiliki relasi (NULL), ditampilkan tanda `-`.

---

## 📂 Struktur Folder
```
tp_mvc25/
│
├── app/
│   ├── controllers/
│   │   ├── DepartmentController.php
│   │   ├── LecturerController.php
│   │   └── CourseController.php
│   │
│   ├── models/
│   │   ├── Department.php
│   │   ├── Lecturer.php
│   │   └── Course.php
│   │
│   ├── views/
│   │   ├── departments/ (index, create, edit)
│   │   ├── lecturers/ (index, create, edit)
│   │   └── courses/ (index, create, edit)
│   │
│   └── core/
│       ├── Database.php
│       └── Config.php
│
├── public/
│   ├── index.php   ← Router dinamis
│   ├── .htaccess   ← URL rewriting
│   └── assets/     ← bootstrap.min.css, js, jquery, popper
│
├── db_academic.sql ← Skrip database MySQL
├── index.php       ← Redirect otomatis ke public/
|
├── dokumentasi/    ← Folder aset rekaman/tangkapan layar
└── README.md
```

---

## 🧩 DESAIN PROGRAM — ARSITEKTUR MVC

Program dirancang agar setiap lapisan memiliki tanggung jawab yang jelas — View tidak berisi query database, Controller tidak berisi HTML, Model tidak berurusan dengan router.

```
┌─────────────┐      ┌─────────────┐      ┌──────────────┐
│ Controller  │ ---> │   Model     │ ---> │   Database   │
└──────┬──────┘      └─────┬───────┘      └──────┬───────┘
       │                   │                     │
       ▼                   ▼                     │
  menerima request   mengelola data            query SQL (Prepared Stmt)
       │                                         │
       ▼                                         │
┌──────┴──────┐                                  │
│    View     │ <--------------------------------┘
└─────────────┘
menampilkan UI kepada user
```

---

## 📁 Penjelasan Folder `app/` — MVC Architecture Overview

Folder `app/` merupakan inti utama aplikasi dan berisi seluruh komponen pola arsitektur **MVC (Model – View – Controller)**.  
Struktur di dalamnya terdiri dari 4 subfolder:
```
app/
├─ controllers/
├─ models/
├─ views/
└─ core/
```
Setiap bagian memiliki peran spesifik seperti berikut.

---

### 🧠 `controllers/` — Pengatur Alur Aplikasi
Berisi file **Controller**, yaitu bagian yang menerima request dari router kemudian menghubungkan View (<– user) dengan Model (<– database).

| File | Fungsi |
|------|--------|
| `DepartmentController.php` | Mengatur alur CRUD untuk data Departments |
| `LecturerController.php` | Mengatur alur CRUD untuk data Lecturers |
| `CourseController.php` | Mengatur alur CRUD untuk data Courses |

Controller bertanggung jawab untuk:
- Menerima aksi pengguna (klik menu, navigasi, submit form, update, delete)
- Meminta pengolahan data ke Model
- Mengirimkan data ke View untuk ditampilkan ke pengguna
- Melakukan redirect bersih kembali ke halaman daftar setelah Create, Update, atau Delete

Tanpa controller, View akan bercampur dengan SQL dan menjadi tidak modular.

---

### 🗄 `models/` — Logika Database
Berisi **Model**, yaitu bagian yang berhubungan langsung dengan database melalui kelas `Database`.

| File | Fungsi |
|------|--------|
| `Department.php` | Query dan logika data pada tabel `departments` |
| `Lecturer.php` | Query dan logika data pada tabel `lecturers` (termasuk JOIN) |
| `Course.php` | Query dan logika data pada tabel `courses` (termasuk JOIN) |

Model berisi operasi:
- `fetchAll()` — mengambil kumpulan baris data
- `fetchOne()` — mengambil satu baris data spesifik
- `insert()` — menambahkan data baru
- `update()` — memperbarui data yang ada
- `delete()` — menghapus data

Model **tidak** menampilkan HTML dan **tidak** menangani request HTTP langsung.

---

### 👁 `views/` — Tampilan HTML / UI
Berisi semua file **View**, yaitu tampilan yang dilihat pengguna.
```
views/
├─ departments/
│ ├─ index.php
│ ├─ create.php
│ └─ edit.php
├─ lecturers/
│ ├─ index.php
│ ├─ create.php
│ └─ edit.php
└─ courses/
  ├─ index.php
  ├─ create.php
  └─ edit.php
```

View hanya bertugas merender data dari Controller menggunakan Bootstrap dan tidak memiliki query database langsung.

---

### ⚙ `core/` — Mesin MVC (Engine)
Berisi class inti yang membuat MVC dapat berjalan.

| File | Fungsi |
|------|--------|
| `Config.php` | Membuat `BASEURL` dinamis otomatis untuk asset dan redirect |
| `Database.php` | Mengatur koneksi database MySQL & mengeksekusi query dengan Prepared Statements |

Peran utama `core/`:
- Memastikan aplikasi tetap **portable** di environment Laragon/XAMPP tanpa perlu mengubah konfigurasi base URL secara manual
- Menyederhanakan query serta mengamankan sistem dari celah keamanan SQL Injection melalui fungsi `execute()`, `fetchOne()`, dan `fetchAll()` dengan parameter binding

---

## 🔗 Hubungan antar folder dalam `app/`

```
View  ↔  Controller  ↔  Model  ↔  Database
            ▲
            │
      Router (public/index.php)
```

---

## 🔄 Alur Program (Program Flow / Workflow CRUD)

1. **Create (Tambah Data):**
   - User menekan tombol "Create" pada halaman index.
   - Router mengarahkan request ke Controller method `create()`.
   - Controller memanggil Model (misal mengambil data untuk dropdown) dan merender view form `create.php`.
   - User mengisi form dan menekan "Submit" (POST ke endpoint `store`).
   - Controller method `store($_POST)` memanggil method `insert()` pada Model.
   - Model menjalankan parameterized query ke Database.
   - Controller melakukan header redirect bersih kembali ke halaman daftar entitas.

2. **Read (Tampil Data):**
   - User mengakses halaman index entitas.
   - Router mengarahkan request ke Controller method `index()`.
   - Controller memanggil method `getAll()` pada Model.
   - Model mengeksekusi query `SELECT` (dengan `LEFT JOIN` untuk data berelasi).
   - Controller mengirimkan data hasil query ke view `index.php` untuk dirender dalam tabel Bootstrap.

3. **Update (Ubah Data):**
   - User menekan tombol "Edit" pada salah satu baris data.
   - Router memanggil method `edit($id)`.
   - Controller meminta data spesifik melalui Model `getById($id)` dan merender form `edit.php` terisi data lama.
   - User menyunting data dan menekan tombol "Update" (POST ke endpoint `update/$id`).
   - Controller method `update($id, $_POST)` memanggil method `update()` pada Model.
   - Setelah eksekusi database selesai, Controller me-redirect kembali ke halaman index.

4. **Delete (Hapus Data):**
   - User menekan tombol "Delete" pada baris data yang ingin dihapus.
   - Dialog konfirmasi JavaScript muncul (`confirm()`). Jika disetujui, browser mengakses URL `delete/$id`.
   - Router memanggil method `delete($id)` pada Controller.
   - Controller memanggil method `delete()` pada Model untuk menghapus record terkait.
   - Controller me-redirect kembali ke halaman index tanpa meninggalkan pesan error.

---

# 💿 DATABASE

## 🗄 Penjelasan Database

Database pada aplikasi ini bernama **`db_academic`**, digunakan untuk menyimpan data **Departments**, **Lecturers**, dan **Courses**.  
Struktur database dibuat dengan konsep **relasi satu–ke–banyak (one-to-many)** berjenjang:
1. Satu Departemen memiliki banyak Dosen (`departments` 1 ──< N `lecturers`).
2. Satu Dosen mengampu banyak Mata Kuliah (`lecturers` 1 ──< N `courses`).

Foreign key diatur dengan opsi `ON DELETE SET NULL` sehingga jika data induk dihapus, data relasi anak tidak ikut terhapus melainkan bernilai `NULL`.

---

### 📌 Daftar Tabel

Database terdiri dari **3 tabel utama**:

| Tabel | Fungsi |
|-------|--------|
| `departments` | Menyimpan data departemen / program studi |
| `lecturers` | Menyimpan data dosen dan relasinya ke departemen |
| `courses` | Menyimpan data mata kuliah dan relasinya ke dosen pengampu |

---

### 📍 Struktur Tabel `departments`
Digunakan sebagai tabel master data departemen / program studi dan fakultas.

| Field | Tipe | Keterangan |
|-------|------|-------------|
| `id` | INT (PK, Auto Increment) | Primary key departemen |
| `department_name` | VARCHAR(100) | Nama program studi / departemen |
| `faculty` | VARCHAR(100) | Nama fakultas induk |

---

### 📍 Struktur Tabel `lecturers`
Digunakan sebagai tabel data dosen yang terhubung dengan tabel `departments`.

| Field | Tipe | Keterangan |
|-------|------|-------------|
| `id` | INT (PK, Auto Increment) | Primary key dosen |
| `name` | VARCHAR(100) | Nama lengkap dosen |
| `nidn` | VARCHAR(20) | Nomor Induk Dosen Nasional |
| `phone` | VARCHAR(20) | Nomor telepon dosen |
| `join_date` | DATE | Tanggal mulai bergabung |
| `department_id` | INT (FK, Nullable) | Relasi ke `departments.id` (`ON DELETE SET NULL`) |

---

### 📍 Struktur Tabel `courses`
Menyimpan daftar mata kuliah dan menghubungkannya dengan dosen pengampu melalui `lecturer_id`.

| Field | Tipe | Keterangan |
|-------|------|-------------|
| `id` | INT (PK, Auto Increment) | Primary key mata kuliah |
| `course_code` | VARCHAR(20) | Kode mata kuliah (misal: IK201) |
| `course_name` | VARCHAR(100) | Nama mata kuliah |
| `credits` | INT | Bobot SKS mata kuliah |
| `lecturer_id` | INT (FK, Nullable) | Relasi ke `lecturers.id` (`ON DELETE SET NULL`) |

# 📸 DEMO

Berikut adalah dokumentasi pengerjaan dan demonstrasi program yang tersimpan pada folder `dokumentasi/`:

- **Video Demonstrasi Program:**

https://github.com/user-attachments/assets/2e68ea0b-7062-44bf-a4f4-540463857e52




