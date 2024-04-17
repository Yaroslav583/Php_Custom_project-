<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            Poll types
        </div>
        <div class="col text-end">
            <a class="btn btn-success" href="/poll-types">List</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form class="row g-3 needs-validation" method="post" action="/poll-types/store">
                <div class="col-md-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <?php if (!empty($errors['name'])): ?>
                        <div class="invalid-feedback">
                            <?php foreach ($errors['name'] as $error): ?>
                                <?php echo $error; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control" id="status" name="status">
                    <?php if (!empty($errors['status'])): ?>
                        <div class="invalid-feedback">
                            <?php foreach ($errors['status'] as $error): ?>
                                <?php echo $error; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>