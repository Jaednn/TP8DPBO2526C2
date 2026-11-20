<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
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
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>departments">Departments</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?= BASEURL ?>courses">Courses</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- form tambah mata kuliah -->
<div class="col-lg-6 m-auto mt-4">
    <form method="post" action="<?= BASEURL ?>courses/store">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center">Create Course</h1>
            </div>
            <div class="card-body">

                <label>Lecturer:</label>
                <select name="lecturer_id" class="form-control" required>
                    <option value="" disabled selected>-- Choose Lecturer --</option>
                    <?php if (!empty($lecturers)): ?>
                        <?php foreach ($lecturers as $l): ?>
                            <option value="<?= $l['id'] ?>">
                                <?= $l['id'] ?> - <?= htmlspecialchars($l['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select><br>

                <label>Course Name:</label>
                <input type="text" name="course_name" class="form-control" required><br>

                <label>Course Code:</label>
                <input type="text" name="course_code" class="form-control" required><br>

                <label>Credits (SKS):</label>
                <input type="number" name="credits" min="1" max="6" class="form-control" required><br>

                <button class="btn btn-success" type="submit">Submit</button>
                <a href="<?= BASEURL ?>courses" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </form>
</div>

</body>
</html>
