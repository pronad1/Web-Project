<?php
session_start();
require_once("db.php");

$limit = 4;

$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$start_from = ($page - 1) * $limit;

// JOIN company with job_post using id_company
$sql = "SELECT job_post.*, company.companyname, company.country 
        FROM job_post 
        INNER JOIN company ON job_post.id_company = company.id_company 
        ORDER BY job_post.createdat DESC 
        LIMIT $start_from, $limit";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="attachment-block clearfix">
          <div class="attachment-pushed">
            <h4 class="attachment-heading">
              <a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>">
                <?php echo htmlspecialchars($row['jobtitle']); ?>
              </a>
              <span class="attachment-heading pull-right">
                $<?php echo htmlspecialchars($row['maximumsalary']); ?>/Month
              </span>
            </h4>
            <div class="attachment-text">
              <div>
                <strong>
                  <?php echo htmlspecialchars($row['companyname']); ?> |
                  <?php echo htmlspecialchars($row['city']); ?> |
                  Experience <?php echo htmlspecialchars($row['experience']); ?> Years
                </strong>
              </div>
            </div>
          </div>
        </div>
        <?php
    }
} else {
    echo "<p>No job postings found.</p>";
}

$conn->close();
?>
