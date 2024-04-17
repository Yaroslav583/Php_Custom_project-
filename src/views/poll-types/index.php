<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            Poll types
        </div>
        <div class="col text-end">
            <a class="btn btn-success" href="/poll-types/create">Create</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($pollTypes as $pollType): ?>
                <tr>

                    <td><?php echo $pollType->attributes['id']?></td>
                    <td><?php echo $pollType->attributes['name']?></td>
                    <td>
                        <?php if ($pollType->isDraft()): ?>
                        <span class="badge text-bg-secondary"><?php echo $pollType->attributes['status']?></span>
                        <?php elseif($pollType->isPublished()): ?>
                        <span class="badge text-bg-success"><?php echo $pollType->attributes['status']?></span>
                        <?php endif; ?>
                    </td>

                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>