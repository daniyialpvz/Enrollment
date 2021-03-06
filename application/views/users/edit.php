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
		<h5 class="breadcrumbs-title">Users</h5>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/Users">List</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/Users/edit">Edit</a></li>
		</ol>
	  </div>
	</div>
  </div>
</div>

<div class="container">
     <div class="row">
     <?php 
     	if (isset($this->session->userdata['message_display'])) {
			echo "<div class='alert alert-info fade in'>";
				echo $this->session->userdata['message_display'];
				$this->session->unset_userdata('message_display');
			echo "</div>";
		}
     	$attributes = array('user_id' => 'userId');
		echo form_open_multipart('Users/update', $attributes); 

		if (isset($this->session->userdata['errors'])) {
			echo "<div class='alert alert-danger fade in'>";
				echo $this->session->userdata['errors'];
				$this->session->unset_userdata('errors');
			echo "</div>";
		}

		?>
        

        <div class="col s12">
          <div class="row">
            <div class="input-field col s6">
            	<?php
            	echo form_hidden('profile',$profile);
            	echo form_hidden('user_id',$user->user_id);
					$data = array(
						'name'          => 'username',
						'id'            => 'username',
						'class'     	=> 'validate',
						'required'     	=> 'required',
						'value'			=> stripslashes($user->username),
            'readonly'  => 'true'
					);
					echo form_input($data);
				?>
              <label for="name">Username</label>
            </div>
            <div class="input-field col s6">
            	<?php
					$data = array(
						'name'          => 'password',
						'id'            => 'password',
						'class'     	=> 'validate',
						'required'     	=> 'required',
						'value'			=> stripslashes($user->password)
					);
					echo form_input($data);
				?>
              <label for="name">Password</label>
            </div>
            <?php if($profile != 1){ ?>
              <div class="input-field col s6">
            	<?php
				    $options = array();
				    foreach ($roles as $key => $value) {
				     $options[$value->id] = $value->description;
				    }
				    echo form_dropdown('role', $options,$user->role != 0 ? $user->role : 0,'id=role');
			    ?>
              <label for="name">Role</label>
            </div>

            <div id="agency_id" style="display:none" class="input-field col s6">
            	<?php
				$option_im = array();
				$option_im = array('0'=>'--Select Agencies--');
				foreach ($agencies as $key => $value) {
					$option_im[$value->id] = $value->description;
				}
				echo form_dropdown('agency_id', $option_im,$user->agency_id != 0 ? $user->agency_id : 0);
				?>
              <label for="name">Agency</label>
            </div>
             <div id="division_id" style="display:none" class="input-field col s6">
            	<?php
				$options_d = array();
				$options_d = array('0'=>'--Select Division--');
				foreach ($divisions as $key => $value) {
					$options_d[$value->id] = $value->name;
				}
				echo form_dropdown('division_id', $options_d,$user->division_id != 0 ? $user->division_id : 0);
				?>
              <label for="name">Divisions</label>
            </div>
               <div id="district_id" style="display:none" class="input-field col s6">
            	<?php
				$options_d = array();
				$options_d = array('0'=>'--Select District--');
				foreach ($districts as $key => $value) {
					$options_d[$value->id] = $value->name;
				}
				echo form_dropdown('district_id', $options_d,$user->district_id != 0 ? $user->district_id : 0);
				?>
              <label for="name">Districts</label>
            </div>
              <div  id="level" style="display:none" class="input-field col s6">
            	<?php
				$options_l = array();
				$options_l = array('0'=>'--Select Level--','1'=>'Primary','2'=>'Secondary');
				echo form_dropdown('level', $options_l,$user->level != 0 ? $user->level : 0);
				?>
              <label for="name">Level</label>
            </div>
        <?php 

        }else{
        	echo form_hidden('division_id',$user->division_id);
        	echo form_hidden('agency_id',$user->agency_id);
        	echo form_hidden('district_id',$user->district_id);
        	echo form_hidden('level',$user->level);
        	echo form_hidden('role',$user->role);
        	
        	}

        	?>
            <!-- <div class="input-field col s6">
            	<?php
					$data = array(
						'name'          => 'short_name',
						'id'            => 'short_name',
						'class'     	=> 'validate',
						'required'     	=> 'required',
						'value'			=> stripslashes($user->short_name)
					);
					echo form_input($data);
				?>
              <label for="name">Short Name</label>
            </div> -->
            <div class="input-field col s6">
            	<?php
					$data = array(
						'name'          => 'full_name',
						'id'            => 'full_name',
						'class'     	=> 'validate',
						'required'     	=> 'required',
						'value'			=> stripslashes($user->full_name)
					);
					echo form_input($data);
				?>
              <label for="name">Full Name</label>
            </div>
            <div class="input-field col s6">
            	<?php
					$data = array(
						'name'          => 'email',
						'id'            => 'email',
						'class'     	=> 'validate',
						'required'     	=> 'required',
						'value'			=> stripslashes($user->email)
					);
					echo form_input($data);
				?>
              <label for="name">Email</label>
            </div>
             <div class="input-field col s6">
              <?php
                $data = array(
                  'name'          => 'contact',
                  'id'            => 'contact',
                  'class'       => 'validate',
                  'required'      => 'required',
                  'value'     => stripslashes($user->contact)
                );
                echo form_input($data);
              ?>
              <label for="name">Contact</label>
            </div>

          

          </div>
          <div class="row">
            <div class="col s6">
              <button type="submit" class="waves-effect waves-light blue-grey btn">Submit</button>
            </div>
          </div>
        </div>
        <?php echo form_close();?>
      </div>
                
</div>



<?php include(APPPATH.'views/common/footer.php');?>

<script>
	$(function(){
		$('#role').on('change', function() {
                var a = $("#role").val();
                display(a);
        });


		$(window).load(function() {
                var a = $("#role").val();
                display(a);
        });

		function display(a)
		{
				if(a == 1)
                {
                	$("#agency_id").css("display", "none");
                	$("#division_id").css("display", "none");
                	$("#level").css("display", "none");
                  $("#district_id").css("display", "none");
                }
                if(a == 2)
                {
                	$("#agency_id").css("display", "none");
                	$("#division_id").css("display", "none");
                	$("#level").css("display", "none");
                  $("#district_id").css("display", "none");
                }
                if(a == 3)
                {
                	$("#agency_id").css("display", "block");
                	$("#division_id").css("display", "none");
                	$("#level").css("display", "none");
                  $("#district_id").css("display", "none");
                }
                if(a == 4)
                {
                	$("#agency_id").css("display", "none");
                	$("#division_id").css("display", "none");
                	$("#level").css("display", "block");
                  $("#district_id").css("display", "block");
                }
                if(a == 5)
                {
                	$("#agency_id").css("display", "none");
                	$("#division_id").css("display", "none");
                	$("#level").css("display", "none");
                  $("#district_id").css("display", "none");
                }
                if(a == 6)
                {
                	$("#agency_id").css("display", "none");
                	$("#division_id").css("display", "block");
                	$("#level").css("display", "block");
                  $("#district_id").css("display", "none");
                }
                if(a == 7)
                {
                	$("#agency_id").css("display", "none");
                	$("#division_id").css("display", "none");
                	$("#level").css("display", "none");
                  $("#district_id").css("display", "none");
                }
		}



	});

	
</script>