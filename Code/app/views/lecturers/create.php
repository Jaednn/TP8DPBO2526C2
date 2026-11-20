<!DOCTYPE html>
<html>
<head>
    <title>Create Lecturer</title>
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

<!-- form tambah dosen -->
<div class="col-lg-6 m-auto mt-4">
    <form method="post" action="<?= BASEURL ?>lecturers/store">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center">Create Lecturer</h1>
            </div>
            <div class="card-body">

                <label>Department:</label>
                <select name="department_id" class="form-control" required>
                    <option value="" disabled selected>-- Choose Department --</option>
                    <?php if (!empty($departments)): ?>
                        <?php foreach ($departments as $d): ?>
                            <option value="<?= $d['id'] ?>">
                                <?= $d['id'] ?> - <?= htmlspecialchars($d['department_name']) ?> (<?= htmlspecialchars($d['faculty']) ?>)
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select><br>

                <label>Name:</label>
                <input type="text" name="name" class="form-control" required><br>

                <label>NIDN:</label>
                <input type="text" name="nidn" class="form-control" required><br>

                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" required><br>

                <label>Join Date:</label>
                <input type="date" name="join_date" class="form-control" required><br>

                <button class="btn btn-success" type="submit">Submit</button>
                <a class="btn btn-info" href="<?= BASEURL ?>lecturers">Cancel</a>
            </div>
        </div>
    </form>
</div>

</body>
</html>
