<!DOCTYPE html>
<html>
<head>
    <title>Departments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= BASEURL ?>assets/bootstrap.min.css">
    <script src="<?= BASEURL ?>assets/jquery.min.js"></script>
    <script src="<?= BASEURL ?>assets/popper.min.js"></script>
    <script src="<?= BASEURL ?>assets/bootstrap.min.js"></script>
</head>
<body>

<!-- navigasi bar utama -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASEURL ?>lecturers">Ngampus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>lecturers">Lecturers</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?= BASEURL ?>departments">Departments</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>courses">Courses</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- konten utama daftar departemen -->
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Departments List</h2>
        <a href="<?= BASEURL ?>departments/create" class="btn btn-primary">Create Department</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Department Name</th>
            <th>Faculty</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php if (!empty($data)): ?>
            <?php foreach ($data as $d): ?>
                <tr>
                    <td><?= $d['id'] ?></td>
                    <td><?= htmlspecialchars($d['department_name']) ?></td>
                    <td><?= htmlspecialchars($d['faculty']) ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="<?= BASEURL ?>departments/edit/<?= $d['id'] ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="<?= BASEURL ?>departments/delete/<?= $d['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data departemen ini?')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4" class="text-center">Belum ada data departemen</td></tr>
        <?php endif; ?>

        </tbody>
    </table>
</div>

</body>
</html>
