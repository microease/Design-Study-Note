<?php
require_once 'functions.php';
xiu_get_current_user();
//接受 保存 校验

if (!empty($_GET['id'])) {
    $current_edit_categories = xiu_fetch_one('select * from  categories where id =' . $_GET['id']);
}
function add_category()
{
    if (empty($_POST['name']) || empty($_POST['slug'])) {
        $GLOBALS['success'] = false;
        $GLOBALS['message'] = '请完整填写分类名和slug名！';
        return;
    }
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $rows = xiu_execute("insert into categories values (null,'{$slug}','{$name}');");
    $GLOBALS['success'] = $rows > 0;
    $GLOBALS['errorMessage'] = $rows <= 0 ? '添加失败' : '添加成功';
}
function edit_category()
{
    global $current_edit_categories;
    $id = $current_edit_categories['id'];
    $name = empty($_POST['name']) ? $current_edit_categories['name'] : $_POST['name'];
    $slug = empty($_POST['slug']) ? $current_edit_categories['slug'] : $_POST['slug'];
    $rows = xiu_execute("update categories set slug = '{$slug}',name ='{$name}' where id={$id}");
    $GLOBALS['success'] = $rows > 0;
    $GLOBALS['errorMessage'] = $rows <= 0 ? '修改失败' : '修改成功';
}

//如果修改操作和查询操作在一起，一定是先做修改，再做查询。
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_GET['id'])) {
        add_category();
    } else {
        edit_category();
    }
}

$categories = xiu_fetch_all('select * from categories;');

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Categories &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">
    <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
<script>NProgress.start()</script>

<div class="main">
    <nav class="navbar">
        <button class="btn btn-default navbar-btn fa fa-bars"></button>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
            <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="page-title">
            <h1>分类目录</h1>
        </div>
        <!-- 有错误信息时展示 -->
        <!-- <div class="alert alert-danger">
          <strong>错误！</strong>发生XXX错误
        </div> -->
        <?php if (isset($errorMessage)): ?>
            <?php if ($success): ?>
                <div class="alert alert-success">
                    <strong>成功！</strong><?php echo $errorMessage; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <strong>失败！</strong><?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($current_edit_categories)): ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $current_edit_categories['id'] ?>"
                          method="post">
                        <h2>编辑《<?php echo $current_edit_categories['name'] ?>》</h2>
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input id="name" class="form-control" name="name" type="text" placeholder="分类名称"
                                   value="<?php echo $current_edit_categories['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="slug">别名</label>
                            <input id="slug" class="form-control" name="slug" type="text" placeholder="slug"
                                   value="<?php echo $current_edit_categories['slug'] ?>">
                            <p class="help-block">Sample: https://www.wzxdm.com/category/<strong>slug</strong></p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">保存</button>
                        </div>
                    </form>
                <?php else: ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <h2>添加新分类目录</h2>
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
                        </div>
                        <div class="form-group">
                            <label for="slug">别名</label>
                            <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
                            <p class="help-block">Sample: https://www.wzxdm.com/category/<strong>slug</strong></p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">添加</button>
                        </div>
                    </form>
                <?php endif ?>
            </div>
            <div class="col-md-8">
                <div class="page-action">
                    <!-- show when multiple checked -->
                    <a class="btn btn-danger btn-sm btn_delete" href="/admin/categories-delete.php"
                       style="display: none">批量删除</a>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" width="40"><input type="checkbox"></th>
                        <th>名称</th>
                        <th>Slug</th>
                        <th class="text-center" width="100">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $item): ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" data-id="<?php echo $item['id'] ?>"></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['slug'] ?></td>
                            <td class="text-center">
                                <a href="/admin/categories.php?id=<?php echo $item['id'] ?>"
                                   class="btn btn-info btn-xs">编辑</a>
                                <a href="/admin/categories-delete.php?id=<?php echo $item['id'] ?>"
                                   class="btn btn-danger btn-xs">删除</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $currentPage = 'categories'; ?>
<?php include 'inc/sidebar.php' ?>
<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
<script>
    $(function ($) {
        var $tbodyCheckboxs = $('tbody input');
        var $btnDelete = $('.btn_delete');
        var allCheckeds = [];
        $tbodyCheckboxs.on('change', function () {
            var id = $(this).data('id');
            if ($(this).prop('checked')) {
                allCheckeds.push(id)
            } else {
                allCheckeds.splice(allCheckeds.indexOf(id))
            }
            allCheckeds.length ? $btnDelete.fadeIn() : $btnDelete.fadeOut()
            $btnDelete.prop('search', '?id=' + allCheckeds)
        })
        //
        //旧方法
        // $tbodyCheckboxs.on('change', function () {
        //     var flag = false;
        //     $tbodyCheckboxs.each(function (i, item) {
        //         //attr 获取的元素属性，prop获取的是元素对应的dom对象的属性
        //         if ($(item).prop('checked')) {
        //             flag = true
        //         }
        //     });
        //     flag ? $btnDelete.fadeIn() : $btnDelete.fadeOut()
        // })
    })
</script>
<script>NProgress.done()</script>
</body>
</html>
