<!DOCTYPE html>
<html>
<head>
    <title>Edit Lecturer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= BASEURL ?>assets/bootstrap.min.css">
    <script src="<?= BASEURL ?>assets/jquery.min.js"></script>
    <script src="<?= BASEURL ?>assets/popper.min.js"></script>
    <script src="<?= BASEURL ?>assets/bootstrap.min.js"></script>
</head>
<body>

<!-- navigasi bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASEURL ?>lecturers">Ngampus</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="<?= BASEURL ?>lecturers">Lecturers</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>departments">Departments</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>courses">Courses</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- form ubah dosen -->
<div class="col-lg-6 m-auto mt-4">
    <form method="post" action="<?= BASEURL ?>lecturers/update/<?= $data['id'] ?>">
        <div class="card">
            <div class="card-header bg-warning">
                <h1 class="text-white text-center">Edit Lecturer</h1>
            </div>
            <div class="card-body">

                <label>Department:</label>
                <select name="department_id" class="form-control" required>
                    <option value="" disabled>-- Choose Department --</option>
                    <?php if (!empty($departments)): ?>
                        <?php foreach ($departments as $d): ?>
                            <option value="<?= $d['id'] ?>" <?= ($d['id'] == $data['department_id']) ? 'selected' : '' ?>>
                                <?= $d['id'] ?> - <?= htmlspecialchars($d['department_name']) ?> (<?= htmlspecialchars($d['faculty']) ?>)
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select><br>

                <label>Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" class="form-control" required><br>

                <label>NIDN:</label>
                <input type="text" name="nidn" value="<?= htmlspecialchars($data['nidn']) ?>" class="form-control" required><br>

                <label>Phone:</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>" class="form-control" required><br>

                <label>Join Date:</label>
                <input type="date" name="join_date" value="<?= htmlspecialchars($data['join_date']) ?>" class="form-control" required><br>

                <button class="btn btn-success" type="submit">Update</button>
                <a class="btn btn-info" href="<?= BASEURL ?>lecturers">Cancel</a>
            </div>
        </div>
    </form>
</div>

</body>
</html>
