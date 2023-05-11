<?php include 'inc/header.php';?>
<link rel="stylesheet" href="inc/nav.css">
<link rel="stylesheet" href="CSS/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?> 
<section class="content">
 <section class="content-header">
        <h3>Student Feedback for  <span style="color: #6610f2;"> Royal.edu </span></h3>
        <?php if (empty($feedback)): ?>
                <p class="lead mt-3">There is no feedback</p>
        <?php endif; ?>

        <?php foreach ($feedback as $item): ?>
                <div class="card my-3 w-50" style="margin-left: 25%;">
                <div class="card-body text-center">
                <?php echo $item['feedback']; ?>
                <div class="text-secondary mt-2">By <?php echo $item[
                    'name'
                ]; ?> on <?php echo date_format(
            date_create($item['date']),
            'g:ia \o\n l jS F Y'
            ); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
 </section>
<?php include 'inc/footer.php';?> 
