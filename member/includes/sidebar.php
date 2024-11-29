<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
    <li class="<?php if($page=='membership'){ echo 'active'; }?>"> <a href="membership.php"><i class="fas fa-gift"></i> <span>My Membership</span></a></li>
    <li class="<?php if($page=='promo-offers'){ echo 'active'; }?>"> <a href="promo-offers.php"><i class="fas fa-ad"></i> <span>Promo & Offers</span></a></li>
    <li class="<?php if($page=='reminder'){ echo 'active'; }?>"><a href="member-reminder.php"><i class="fas fa-calendar"></i> <span>Reminders</span></a></li>
    <li class="<?php if($page=='announcement'){ echo 'active'; }?>"><a href="announcement.php"><i class="fas fa-bullhorn"></i> <span>Announcement</span></a></li>
    <li class="<?php if($page=='todo'){ echo 'active'; }?>"> <a href="to-do.php"><i class="fas fa-pencil"></i> <span>To-Do</span></a></li>
    <li class="<?php if($page=='account'){ echo 'active'; }?>"> <a href="edit-account.php"><i class="fas fa-user"></i> <span>Account</span></a></li>
  </ul>
</div>