<div class="col pt-0 bg-white sidenav" id="mySidenav">
  <!-- padding: 8px 8px 8px 32px; -->
  <div class="sidenav-content ">
    <a href="javascript:void(0)" class="closebtn p-0 " id="closeSideNav" onclick="closeNav()">&times;</a>
    <div class="pt-4 pl-4">
      <h2 style="font-weight: 300;
    line-height: 1.2;"><?= SITENAME ?></h2>
    </div>

    <hr>

    <div class="links mt-4 pt-1 text-dark">
      <li class="nav-item"><a href="<?= URLROOT; ?>/dashboard" class="pl-md-4"><i class="fa fa-tachometer"></i> Dashboard</a></li>

      <h6 class="pl-md-4 mt-4">Forms</h6>
      <li class="nav-item"><a href="<?= URLROOT; ?>/dashboard/forms" class="pl-md-4"><i class="fa fa-wpforms"></i> Forms</a></li>
      <li class="nav-item"><a href="<?= URLROOT; ?>/dashboard/formcreate" class="pl-md-4"><i class="fa fa-plus"></i> Create Form</a></li>

      <h6 class="pl-md-4 mt-4">Task Management</h6>
      <li class="nav-item"><a href="<?= URLROOT; ?>/dashboard/tasks" class="pl-md-4"><i class="fa fa-tasks"></i> Tasks</a></li>
      <li class="nav-item"><a href="<?= URLROOT; ?>/dashboard/todo" class="pl-md-4"><i class="fa fa-plus"></i> Todo List</a></li>


      <h6 class="pl-md-4 mt-4">Others</h6>
      <li class="nav-item"><a href="#" class="pl-md-4"><i class="fa fa-credit-card"></i> Payments</a></li>
      <li class="nav-item"><a href="<?= URLROOT; ?>/dashboard/membership" class="pl-md-4"><i class="fa fa-user"></i> Membership Plan</a></li>
      <li class="nav-item"><a href="#" class="pl-md-4"><i class="fa fa-home"></i> Back To Home</a></li>
      <li><a href="#" class="pl-md-4"><i class="fa fa-sign-out"></i> Logout</a></li>
    </div>
  </div>
</div>