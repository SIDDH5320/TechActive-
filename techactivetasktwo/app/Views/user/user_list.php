<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>

<body>
    <h1>User List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <?php if ($page > 1): ?>
        <a href="<?= base_url('fetch-users/' . ($page - 1)) ?>">Previous</a>
        <?php endif; ?>
        <?php if ($users): ?>
        <span>Page <?= $page ?></span>
        <?php endif; ?>
        <?php if (count($users) == 10): ?>
        <a href="<?= base_url('fetch-users/' . ($page + 1)) ?>">Next</a>
        <?php endif; ?>
    </div>
</body>

</html>