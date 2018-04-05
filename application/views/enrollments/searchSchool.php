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
		<h3>Enrollment & Retention Drive</h3>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
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
     	$attributes = array('id' => 'searchSchool');
		echo form_open_multipart('Enrollments/searchSchool', $attributes); 

		if (isset($this->session->userdata['errors'])) {
			echo "<div class='alert alert-danger fade in'>";
				echo $this->session->userdata['errors'];
				$this->session->unset_userdata('errors');
			echo "</div>";
		}

		?>
        

        <div class="col s12">
          	<div class="row">
	            <div class="col s6 m8 l9 card-panel  blue lighten-5">
	            	<div class="input-field col s6">
			            	<?php
								$data = array(
									'name'          => 'semiscode',
									'id'            => 'semiscode',
									'class'     	=> 'validate',
									'required'     	=> 'required',
									'maxlength'		=> 9,
									'onkeypress'	=> 'return isNumberKey(event)'
								);
								echo form_input($data);
							?>
			              <label for="name"><strong>Kindly enter the Semis Code:</strong></label>
			            </div> 
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

<script type="text/javascript">
	function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>