<?php

session_start();

require_once("db.php");

$limit = 4;

if (isset($_POST['input'])) {

    $input= $_POST['input'];

    $query =" select * from job_post where jobtitle like '%{$input}%'";

    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        ?>
<table class="table table-bordered table-striped mt-4">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Description</th>
            <th>Experience</th>
            <th>MinimunSalary</th>
            <th>MaximumSalary</th>
        </tr>
    </thead>
    <tbody>
        <?php
                while ($row = $result->fetch_assoc()) {

                    $title=$row['jobtitle'];
                    $description=$row['description'];
                    $experience=$row['experience'];
                    $minimumsalary=$row['minimumsalary'];
                    $maximumsalary=$row['maximumsalary'];

                    ?>

        <tr>
            <td><?php echo $title;?></td>
            <td><?php echo $description;?></td>
            <td><?php echo $experience;?></td>
            <td><?php echo $minimumsalary;?></td>
            <td><?php echo $maximumsalary;?></td>
        </tr>


        <?php
                }
        ?>
    </tbody>

</table>
<?php

    } else {
        echo '<h6 class="text-danger text0-center mt-3">No job postings found.</h6>';
    }
}

?>