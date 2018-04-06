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
                <h5 class="breadcrumbs-title">Enrollment & Retention Drive</h5>
                <button class="btn-flat waves-effect blue accent-2 white-text right" onclick="location.href='<?php echo base_url();?>index.php/Divisions/index/1'">Print</button>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                    <li><a href="#">Source</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Divisions">List</a></li>
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

                    <div class="input-field col s4">
                        <?php
                            $id = array('id'=>'districtsddl','class'=>'dropdownChangeAction');
                            $options = array();
                            foreach ($districts as $key => $value) {
                             $options[$value->id] = $value->name;
                            }
                            if($district_id == 0){
                                echo form_dropdown('district_id', $options, '',$id);
                            }else{
                                echo form_dropdown('district_id', $options, $district_id ,$id);
                            }
                            
                        ?>
                      <label for="name">Districts</label>
                    </div>

                    <div class="input-field col s4">
                        <?php
                            $id = array('id'=>'levelsddl','class'=>'dropdownChangeAction');
                            $options = array();
                            foreach ($levels as $key => $value) {
                             $options[$value->id] = $value->levels;
                            }
                            echo form_dropdown('level_id', $options, '',$id);
                        ?>
                      <label for="name">Levels</label>
                    </div>

                    <div class="input-field col s4">
                        <?php
                            $id = array('id'=>'gendersddl','class'=>'dropdownChangeAction');
                            $options = array();
                            $options = array(
                                      'Mixed' => 'Mixed',
                                      'Boys' => 'Boys',
                                      'Girls' => 'Girls'
                                    );
                            // if($status == 0){
                            //     echo form_dropdown('status', $options,'',$id);    
                            // }else{
                            //      echo form_dropdown('status', $options,$status,$id);
                            // }
                            echo form_dropdown('gender_id', $options, '',$id);
                        ?>
                        <label for="name">Gender</label>
                    </div>

                    <!-- <div class="input-field col s6">
                        <?php
                            $id = array('id'=>'districtsddl2','class'=>'dropdownChangeAction');
                            $options = array();
                            foreach ($districts as $key => $value) {
                             $options[$value->id] = $value->name;
                            }
                            echo form_dropdown('district_id', $options, '',$id);
                        ?>
                      <label for="name">Gender</label>
                    </div> -->

                    <div class="input-field col s4">
                        <?php
                            $id = array('id'=>'mediumddl','class'=>'dropdownChangeAction');
                            $options = array();
                            $options = array(
                                      'Mixed' => 'Mixed',
                                      'English' => 'English',
                                      'Urdu' => 'Urdu',
                                      'Sindhi' => 'Sindhi'
                                    );
                            // if($status == 0){
                            //     echo form_dropdown('status', $options,'',$id);    
                            // }else{
                            //      echo form_dropdown('status', $options,$status,$id);
                            // }
                            echo form_dropdown('medium_id', $options, '',$id);
                        ?>
                        <label for="name">Medium</label>
                    </div>

                    <div class="input-field col s4">
                        <?php
                            $id = array('id'=>'statusddl','class'=>'dropdownChangeAction');
                            $options = array();
                            $options = array(
                                      'Closed Permanent' => 'Closed Permanent',
                                      'Closed Temporary' => 'Closed Temporary',
                                      'Functional' => 'Functional'
                                    );
                            // if($status == 0){
                            //     echo form_dropdown('status', $options,'',$id);    
                            // }else{
                            //      echo form_dropdown('status', $options,$status,$id);
                            // }
                            echo form_dropdown('status_id', $options, '',$id);
                        ?>
                        <label for="name">Status</label>
                    </div>

                    <div class="input-field col s4">
                        <?php
                            $id = array('id'=>'campusddl','class'=>'dropdownChangeAction');
                            $options = array();
                            $options = array(
                                      'Yes' => 'Yes',
                                      'No' => 'No'
                                    );
                            // if($status == 0){
                            //     echo form_dropdown('status', $options,'',$id);    
                            // }else{
                            //      echo form_dropdown('status', $options,$status,$id);
                            // }
                            echo form_dropdown('campus_id', $options, '',$id);
                        ?>
                        <label for="name">Campus</label>
                    </div>
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Semis Code</th>
                                <th>District</th>
                                <th>Tehsil</th>
                                <th>UCS/Subdivision</th>
                                <th>School Name</th>
                                <th>Level</th>
                                <th>Gender</th>
                                <th>Viability Status</th>
                                <th>Status</th>

                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>Semis Code</th>
                                <th>District</th>
                                <th>Tehsil</th>
                                <th>UCS/Subdivision</th>
                                <th>School Name</th>
                                <th>Level</th>
                                <th>Gender</th>
                                <th>Viability Status</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <?php $base = base_url();?>
                        <?php if(!empty($reportDefaults)): ?>
                            <tbody>
                                <?php foreach ($reportDefaults as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $value->semis_code; ?></td>
                                        <td><?php echo $value->district; ?></td>
                                        <td><?php echo $value->tehsil; ?></td>
                                        <td><?php echo $value->ucs; ?></td>
                                        <td><?php echo $value->school_name; ?></td>
                                        <td><?php echo $value->level; ?></td>
                                        <td><?php echo $value->gender; ?></td>
                                        <td><?php echo $value->viability_status; ?></td>
                                        <td><?php echo $value->status; ?></td>

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

<script type="text/javascript">
    $('.dropdownChangeAction').change(function () {
     var dddl=$('#districtsddl').val();
     var lddl=$('#levelsddl').val();
     // var gddl=$('#gendersddl').val();
     // var mddl=$('#mediumddl').val();
     // var sddl=$('#statusddl').val();
     // var cddl=$('#campusddl').val();
     // alert(dddl);
     // alert(lddl);
     // alert(gddl);
     // alert(mddl);
     // alert(sddl);
     // alert(cddl);
    

     // var status =$('#districtstatus').val();
    // var url ='<?php echo base_url(); ?>'+'index.php/Actions/index/0/'+ddl+'/'+status; 
    var url ='<?php echo base_url(); ?>'+'index.php/Reportings/index/'+dddl+'/'+lddl;
    // alert(url); 
     window.location.href = url;
     });

</script>