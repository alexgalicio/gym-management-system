<div id="sidebar"><a href="#" class="visible-phone"><i class="fas fa-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if ($page == 'dashboard') {echo 'active';} ?>"><a href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>

    <!-- user management -->
    <li class="<?php if ($page == 'user-management') {echo 'submenu active';} else {echo 'submenu';} ?>"> <a href="#"><i class="fas fa-users"></i> <span>User Management</span></a>
      <ul>
        <li class="<?php if ($page == 'manage-members') {echo 'active';} ?>"><a href="members.php"><i class="fas fa-arrow-right"></i> Members</a></li>
        <li class="<?php if ($page == 'manage-staff') {echo 'active';} ?>"><a href="staff.php"><i class="fas fa-arrow-right"></i> Staff</a></li>
      </ul>
    </li>



    <li class="<?php if ($page == 'member-status') {echo 'active';} ?>"><a href="member-status.php"><i class="fas fa-gift"></i> <span> Membership</span></a></li>

    <li class="<?php if ($page == 'promo-offers') {echo 'active';} ?>"><a href="promo-offers.php"><i class="fas fa-calendar-alt"></i> <span> Promo & Offers</span></a></li>


    <li class="<?php if ($page == 'equipment') {
      echo 'active';
    } ?>"><a href="equipment.php"><i class="fas fa-dumbbell"></i>
        <span>Gym Equipment</span></a>
    </li>

    <li class="<?php if ($page == 'attendance') {
      echo 'active';
    } ?>"><a href="attendance.php"><i class="fas fa-calendar-alt"></i>
        <span>Attendance</span></a>
    </li>

    <li class="<?php if ($page == 'announcement') {
      echo 'active';
    } ?>"><a href="announcement.php"><i class="fas fa-bullhorn"></i> <span>Announcement</span></a></li>


  </ul>
</div>