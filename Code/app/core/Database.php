<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "db_academic";

    protected $conn;

    // inisialisasi koneksi ke database mysql
    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
        mysqli_set_charset($this->conn, "utf8mb4");
    }

    // eksekusi query sql dengan prepared statement jika ada parameter
    public function execute($query, $params = []) {
        if (empty($params)) {
            $result = mysqli_query($this->conn, $query);
            if (!$result) {
                die("Query gagal: " . mysqli_error($this->conn));
            }
            return $result;
        }

        $stmt = mysqli_prepare($this->conn, $query);
        if (!$stmt) {
            die("Persiapan query gagal: " . mysqli_error($this->conn));
        }

        $types = "";
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= "i";
            } elseif (is_float($param)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }

        mysqli_stmt_bind_param($stmt, $types, ...$params);
        $result = mysqli_stmt_execute($stmt);
        if (!$result) {
            die("Eksekusi query gagal: " . mysqli_stmt_error($stmt));
        }
        mysqli_stmt_close($stmt);
        return $result;
    }

    // ambil semua baris data hasil query
    public function fetchAll($query, $params = []) {
        if (empty($params)) {
            $result = mysqli_query($this->conn, $query);
            if (!$result) {
                die("Query gagal: " . mysqli_error($this->conn));
            }
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        $stmt = mysqli_prepare($this->conn, $query);
        if (!$stmt) {
            die("Persiapan query gagal: " . mysqli_error($this->conn));
        }

        $types = "";
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= "i";
            } elseif (is_float($param)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }

        mysqli_stmt_bind_param($stmt, $types, ...$params);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data = $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
        mysqli_stmt_close($stmt);
        return $data;
    }

    // ambil satu baris data hasil query
    public function fetchOne($query, $params = []) {
        if (empty($params)) {
            $result = mysqli_query($this->conn, $query);
            if (!$result) {
                die("Query gagal: " . mysqli_error($this->conn));
            }
            return mysqli_fetch_assoc($result);
        }

        $stmt = mysqli_prepare($this->conn, $query);
        if (!$stmt) {
            die("Persiapan query gagal: " . mysqli_error($this->conn));
        }

        $types = "";
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= "i";
            } elseif (is_float($param)) {
                $types .= "d";
            } else {
                $types .= "s";
            }
        }

        mysqli_stmt_bind_param($stmt, $types, ...$params);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = $result ? mysqli_fetch_assoc($result) : null;
        mysqli_stmt_close($stmt);
        return $row;
    }
}
