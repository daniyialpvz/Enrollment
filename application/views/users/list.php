<?php include(APPPATH.'views/common/header.php'); ?>

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
	<!-- Search for small screen -->
	<div class="header-search-wrapper grey hide-on-large-only">
		<i class="mdi-action-search active"></i>
		<input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
	</div>
  <div class="container">
	<div class="row">
	  <div class="col s12 m12 l12">
		<h5 class="breadcrumbs-title">Users List</h5>
        <button class="btn-flat waves-effect blue accent-2 white-text right" onclick="location.href='<?php echo base_url();?>index.php/Users/index/1'">Print</button>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
            <li><a href="#">Source</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/Users">List</a></li>
		</ol>
	  </div>
	</div>
  </div>
</div>

<div class="container">
    <div class="section">
<div id="table-datatables">
	<div class="row">    
	<div class="col s12 m12 l12">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Short Name</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Counter</th>
                            <?php if($role_m != 7): ?>
                            <th>Action</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                 
                    <tfoot>
                          <tr>
                            <th>Username</th>
                            <th>Short Name</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Counter</th>
                            <?php if($role_m != 7): ?>
                            <th>Action</th>
                            <?php endif; ?>
                        </tr>
                    </tfoot>
                    <?php $base = base_url();?>
                    <?php if(!empty($users)): ?>
                    <tbody>
                    <?php foreach ($users as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['username']; ?></td>
                            <td><?php echo $value['short_name']; ?></td>
                            <td><?php echo $value['full_name']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $value['description']; ?></td> 
                            <td><?php echo $value['counter']; ?></td> 
                            <?php if($role_m != 7): ?>
                            <td>
                            <a class="btn-floating waves-effect waves-light blue" href="<?php echo base_url(); ?>index.php/Users/edit/<?php echo $value['user_id']; ?>"><i class="mdi-content-create"></i></a>
                            <a class="btn-floating waves-effect waves-light red" href="<?php echo base_url(); ?>index.php/Users/delete/<?php echo $value['user_id']; ?>"><i class="mdi-content-clear"></i></a>
                            </td>
                             <?php endif; ?>
                        </tr>
 					<?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
                  </table>
                </div>
			 </div>
		 </div>
	</div>
</div>



<?php include(APPPATH.'views/common/footer.php');?>