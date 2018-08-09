<?php echo $_SERVER['PHP_SELF']?>
<div class="aside">
    <div class="profile">
        <img class="avatar" src="../static/uploads/avatar.png">
        <h3 class="name">浮生若梦</h3>
    </div>
    <ul class="nav">
        <li<?php echo $currentPage === 'index' ? ' class="active"' : ''?>>
            <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
        </li>
        <?php $menuPosts = array('posts','post-add','categories');?>
        <li<?php echo in_array($currentPage,$menuPosts) ? ' class="active"' : ''?>>
            <a href="#menu-posts" class="collapsed" data-toggle="collapse">
                <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
            </a>
            <ul id="menu-posts" class="collapse<?php echo in_array($currentPage,$menuPosts) ? ' in"' : ''?>">
                <li<?php echo $currentPage === 'posts' ? ' class="active"' : ''?>><a href="posts.php">所有文章</a></li>
                <li<?php echo $currentPage === 'post-add' ? ' class="active"' : ''?>><a href="post-add.php">写文章</a></li>
                <li<?php echo $currentPage === 'categories' ? ' class="active"' : ''?>><a href="categories.php">分类目录</a></li>
            </ul>
        </li>
        <li<?php echo $currentPage === 'comments' ? ' class="active"' : ''?>>
            <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
        </li>
        <li<?php echo $currentPage === 'users' ? ' class="active"' : ''?>>
            <a href="users.php"><i class="fa fa-users"></i>用户</a>
        </li>
        <?php $menuSettings = array('nav-menus','slides','settings');?>
        <li>
            <a href="#menu-settings" class="collapsed" data-toggle="collapse">
                <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
            </a>
            <ul id="menu-settings" class="collapse<?php echo in_array($currentPage,$menuSettings) ? ' in"' : ''?>">
                <li<?php echo $currentPage === 'nav-menus' ? ' class="active"' : ''?>><a href="nav-menus.php">导航菜单</a></li>
                <li<?php echo $currentPage === 'slides' ? ' class="active"' : ''?>><a href="slides.php">图片轮播</a></li>
                <li<?php echo $currentPage === 'settings' ? ' class="active"' : ''?>><a href="settings.php">网站设置</a></li>
            </ul>
        </li>
    </ul>
</div>