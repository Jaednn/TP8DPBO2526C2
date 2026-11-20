<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../app/core/Config.php";
require_once "../app/core/Database.php";

// tangani routing url secara dinamis dan portabel
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (strpos($requestUri, $scriptDir) === 0) {
    $path = substr($requestUri, strlen($scriptDir));
} else {
    $path = $requestUri;
}

$path = trim($path, '/');
if (strpos($path, 'index.php') === 0) {
    $path = trim(substr($path, strlen('index.php')), '/');
}

$uri = $path === '' ? [] : explode('/', $path);
$segment = $uri[0] ?? '';

// router untuk entitas dosen (halaman default)
if ($segment === "" || $segment === "lecturers") {
    require_once "../app/controllers/LecturerController.php";
    $c = new LecturerController();

    if (!isset($uri[1])) $c->index();
    elseif ($uri[1] === "create") $c->create();
    elseif ($uri[1] === "store") $c->store($_POST);
    elseif ($uri[1] === "edit") $c->edit($uri[2] ?? 0);
    elseif ($uri[1] === "update") $c->update($uri[2] ?? 0, $_POST);
    elseif ($uri[1] === "delete") $c->delete($uri[2] ?? 0);
    exit;
}

// router untuk entitas departemen
if ($segment === "departments") {
    require_once "../app/controllers/DepartmentController.php";
    $c = new DepartmentController();

    if (!isset($uri[1])) $c->index();
    elseif ($uri[1] === "create") $c->create();
    elseif ($uri[1] === "store") $c->store($_POST);
    elseif ($uri[1] === "edit") $c->edit($uri[2] ?? 0);
    elseif ($uri[1] === "update") $c->update($uri[2] ?? 0, $_POST);
    elseif ($uri[1] === "delete") $c->delete($uri[2] ?? 0);
    exit;
}

// router untuk entitas mata kuliah
if ($segment === "courses") {
    require_once "../app/controllers/CourseController.php";
    $c = new CourseController();

    if (!isset($uri[1])) $c->index();
    elseif ($uri[1] === "create") $c->create();
    elseif ($uri[1] === "store") $c->store($_POST);
    elseif ($uri[1] === "edit") $c->edit($uri[2] ?? 0);
    elseif ($uri[1] === "update") $c->update($uri[2] ?? 0, $_POST);
    elseif ($uri[1] === "delete") $c->delete($uri[2] ?? 0);
    exit;
}

// jika url tidak ditemukan
http_response_code(404);
echo "<!DOCTYPE html><html><head><title>404 Not Found</title><link rel='stylesheet' href='" . BASEURL . "assets/bootstrap.min.css'></head><body class='bg-light text-center p-5'><div class='container'><h1>404</h1><p class='lead'>Halaman Tidak Ditemukan</p><a href='" . BASEURL . "lecturers' class='btn btn-primary'>Kembali ke Home</a></div></body></html>";
