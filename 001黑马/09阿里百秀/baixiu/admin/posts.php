<?php
require_once 'functions.php';
xiu_get_current_user();
$page = empty($_GET['page']) ? 1 : (int)$_GET['page'];
$size = 20;
$offset = ($page - 1) * $size;
$posts = xiu_fetch_all("select
  posts.id,
  posts.title,
  users.nickname as user_name,
  categories.name as category_name,
  posts.created,
  posts.status
from posts
inner join categories on posts.category_id = categories.id
inner join users on posts.user_id = users.id
order by posts.created desc
limit {$offset},{$size};");
//$posts = xiu_fetch_all("select * from posts");
$total_count = (int)xiu_fetch_one('select count(1) as num from posts;')['num'];
$total_pages = (int)ceil($total_count / $size);

$visiables = 5;
$region = ($visiables - 1) / 2;
$begin = $page - $region;
$end = $begin + $visiables;
if ($begin < 1) {
    $begin = 1;
    $end = $begin + $visiables;
}
if ($end > $total_pages + 1) {
    $end = $total_pages + 1;
}


function convert_status($status)
{
    $dict = array(
        'published' => '已发布',
        'drafted' => '草稿',
        'trashed' => '回收站'
    );
    return isset($dict[$status]) ? $dict[$status] : '未知';
}

function convert_date($created)
{
    $timestamp = strtotime($created);
    return date('Y年m月d日<b\r>H:i:s', $timestamp);
}

function get_category_name($category_id)
{
    return xiu_fetch_one("select name from categories where id = {$category_id}")['name'];
}

function get_user_name($user_id)
{
    return xiu_fetch_one("select nickname from users where id = {$user_id}")['nickname'];
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Posts &laquo; Admin</title>
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
        <div class="page-title">
            <h1>所有文章</h1>
            <a href="post-add.php" class="btn btn-primary btn-xs">写文章</a>
        </div>
        <!-- 有错误信息时展示 -->
        <!-- <div class="alert alert-danger">
          <strong>错误！</strong>发生XXX错误
        </div> -->
        <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
            <form class="form-inline">
                <select name="" class="form-control input-sm">
                    <option value="">所有分类</option>
                    <option value="">未分类</option>
                </select>
                <select name="" class="form-control input-sm">
                    <option value="">所有状态</option>
                    <option value="">草稿</option>
                    <option value="">已发布</option>
                </select>
                <button class="btn btn-default btn-sm">筛选</button>
            </form>
            <ul class="pagination pagination-sm pull-right">
                <li><a href="?page=<?php echo $begin = 1 ? 1 : $begin - 1; ?>">上一页</a></li>
                <?php for ($i = $begin; $i < $end; $i++): ?>
                    <li<?php echo $i === $page ? ' class="active"' : '' ?>>
                        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li><a href="?page=<?php echo $begin + 1; ?>">下一页</a></li>
            </ul>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>标题</th>
                <th>作者</th>
                <th>分类</th>
                <th class="text-center">发表时间</th>
                <th class="text-center">状态</th>
                <th class="text-center" width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $item): ?>
                <tr>
                    <td class="text-center"><input type="checkbox"></td>
                    <td><?php echo $item['title']; ?></td>
                    <td><?php echo $item['user_name']; ?></td>
                    <td><?php echo $item['category_name']; ?></td>
                    <td class="text-center"><?php echo convert_date($item['created']); ?></td>
                    <td class="text-center"><?php echo convert_status($item['status']); ?></td>
                    <td class="text-center">
                        <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                        <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $currentPage = 'posts'; ?>

<?php include 'inc/sidebar.php' ?>


<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
<script>NProgress.done()</script>
</body>
</html>
