<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
    <li class="<?php if($page=='classes'){ echo 'active'; }?>"> <a href="classes.php"><i class="fas fa-calendar-alt"></i> <span>Classes</span></a></li>
    <li class="<?php if($page=='announcement'){ echo 'active'; }?>"><a href="announcement.php"><i class="fas fa-bullhorn"></i> <span>Announcement</span></a></li>
    <li class="<?php if($page=='todo'){ echo 'active'; }?>"> <a href="to-do.php"><i class="fas fa-pencil"></i> <span>To-Do</span></a></li>
    <li class="<?php if($page=='account'){ echo 'active'; }?>"> <a href="edit-account.php"><i class="fas fa-user"></i> <span>Account</span></a></li>
  </ul>
</div>