<!DOCTYPE html>
<html>
<head>
    <title>Lecturers</title>
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
                <li class="nav-item"><a class="nav-link active" href="<?= BASEURL ?>lecturers">Lecturers</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>departments">Departments</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>courses">Courses</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- konten utama daftar dosen -->
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lecturers List</h2>
        <a href="<?= BASEURL ?>lecturers/create" class="btn btn-primary">Create Lecturer</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>NIDN</th>
            <th>Phone</th>
            <th>Join Date</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php if (!empty($data)): ?>
            <?php foreach ($data as $l): ?>
                <tr>
                    <td><?= $l['id'] ?></td>
                    <td><?= htmlspecialchars($l['name']) ?></td>
                    <td><?= htmlspecialchars($l['nidn']) ?></td>
                    <td><?= htmlspecialchars($l['phone']) ?></td>
                    <td><?= htmlspecialchars($l['join_date']) ?></td>
                    <td>
                        <?= !empty($l['department_name']) ? htmlspecialchars($l['department_name']) . ' (' . htmlspecialchars($l['faculty']) . ')' : '-' ?>
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="<?= BASEURL ?>lecturers/edit/<?= $l['id'] ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="<?= BASEURL ?>lecturers/delete/<?= $l['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data dosen ini?')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7" class="text-center">Belum ada data dosen</td></tr>
        <?php endif; ?>

        </tbody>
    </table>
</div>

</body>
</html>
