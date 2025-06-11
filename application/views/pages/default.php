<!-- views/pages/default.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?= htmlspecialchars($page['meta_description'] ?? '') ?>">
    <title><?= htmlspecialchars($page['title'] ?? 'Untitled Page') ?></title>
</head>

<body>
    <h1><?= htmlspecialchars($page['h1'] ?? $page['title']) ?></h1>
    <div><?= $page['body'] ?></div>
</body>

</html>