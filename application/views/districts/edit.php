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
		<h5 class="breadcrumbs-title">Districts</h5>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/Districts">List</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/Districts/edit">Edit</a></li>
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
     	$attributes = array('id' => 'districtId');
		echo form_open_multipart('Districts/update', $attributes); 

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
            	echo form_hidden('id',$district->id);
					$data = array(
						'name'          => 'name',
						'id'            => 'name',
						'class'     	=> 'validate',
						'required'     	=> 'required',
						'value'			=> stripslashes($district->name)
					);
					echo form_input($data);
				?>
              <label for="name">District Name</label>
            </div>
			<div class="input-field col s6">
            	<?php
				    $options = array();
				    foreach ($divisions as $key => $value) {
				     $options[$value->id] = $value->name;
				    }
				    echo form_dropdown('division_id', $options , $district->division_id);
			    ?>
              <label for="name">Division Name</label>
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