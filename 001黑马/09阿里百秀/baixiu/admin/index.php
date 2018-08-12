<?php
require_once 'functions.php';
xiu_get_current_user();
$post_count = xiu_fetch_one('select count(1) as num  from posts;')['num'];
$post_drafted_count = xiu_fetch_one('select count(1) as num  from posts where status="drafted";')['num'];
$categories_count = xiu_fetch_one('select count(1) as num  from categories;')['num'];
$comments_count = xiu_fetch_one('select count(1) as num  from comments;')['num'];
$comments_approved_count = xiu_fetch_one('select count(1)  as num from comments where status="approved";')['num'];

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Dashboard &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">
    <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
<script>NProgress.start()</script>

<div class="main">
    <?php include 'inc/navbar.php' ?>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>One Belt, One Road</h1>
            <p>Thoughts, stories and ideas.</p>
            <p><a class="btn btn-primary btn-lg" href="post-add.php" role="button">写文章</a></p>
        </div>
        <div class="row">
             <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">站点内容统计：</h3>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong><?php echo $post_count?></strong>篇文章（<strong><?php echo $post_drafted_count?></strong>篇草稿）</li>
                        <li class="list-group-item"><strong><?php echo $categories_count?></strong>个分类</li>
                        <li class="list-group-item"><strong><?php echo $comments_count?></strong>条评论（<strong><?php echo $comments_approved_count?></strong>条待审核）</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <canvas id="chart">

                </canvas>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
<?php $currentPage = 'index'; ?>
<?php include 'inc/sidebar.php' ?>

<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
<script src="../static/assets/vendors/chart/Chart.js"></script>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
    var ctx = document.getElementById("chart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["文章数", "草稿数", "分类数", "评论数", "待审核评论", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo $post_count?>, <?php echo $post_drafted_count?>, <?php echo $categories_count?>, <?php echo $comments_count?>, <?php echo $comments_approved_count?>, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

<script>NProgress.done()</script>
</body>
</html>
