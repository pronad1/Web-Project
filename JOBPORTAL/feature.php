<?php
include 'config.php';

$query = "SELECT * FROM jobs ORDER BY created_at DESC LIMIT 12";
$result = $conn->query($query);

$jobs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="job-card.css">
    <title>Job Card</title>
</head>

<body>
    <section>
        <h3>Featured Jobs</h3>

        <?php if (!empty($jobs)): ?>

        <div class="job-card">
            <?php foreach ($jobs as $job): ?>
            <a href="<?php echo htmlspecialchars($job['url']); ?>"
                <div class="top">
                <?php echo htmlspecialchars($job['title']); ?>
        </div>

        <div class="middle">
            <h3><?php echo htmlspecialchars($job['salary']); ?>
            </h3>
            <p><?php echo htmlspecialchars($job['schedule']); ?>
            </p>
            <p><?php echo htmlspecialchars($job['location']); ?>
            </p>
        </div>

        <div class="bottom">
            <p><?php echo htmlspecialchars($job['tags']); ?>
            </p>
        </div>
        </a>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </section>
</body>

</html>