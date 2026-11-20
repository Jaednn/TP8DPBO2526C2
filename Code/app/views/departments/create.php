<!DOCTYPE html>
<html>
<head>
    <title>Create Department</title>
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
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>lecturers">Lecturers</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?= BASEURL ?>departments">Departments</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>courses">Courses</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- form tambah departemen -->
<div class="col-lg-6 m-auto mt-4">
    <form method="post" action="<?= BASEURL ?>departments/store">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center">Create Department</h1>
            </div>
            <div class="card-body">

                <label>Department Name:</label>
                <input type="text" name="department_name" class="form-control" placeholder="Contoh: Ilmu Komputer" required><br>

                <label>Faculty:</label>
                <input type="text" name="faculty" class="form-control" placeholder="Contoh: FPMIPA" required><br>

                <button class="btn btn-success" type="submit">Submit</button>
                <a class="btn btn-info" href="<?= BASEURL ?>departments">Cancel</a>
            </div>
        </div>
    </form>
</div>

</body>
</html>
