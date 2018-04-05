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
        <h5>School's Information</h5>
        <button class="btn-flat waves-effect blue accent-2 white-text right" onclick="location.href='<?php echo base_url();?>index.php/Districts/index/1'">Print</button>
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!--Information Table-->
<div class="row">
    <div class="col s12 m12 l12 waves-effect blue accent-2 white-text center-align flow-text">
      School's Information
    </div>
</div>


<div id="bordered-table">
  <div class="row">
    <div class="col s12 m12 l12">
      <table class="striped">
        <thead>
          <tr>
            <th data-field="id">Semis Code</th>
            <th data-field="name">School Name</th>
            <th data-field="price">District</th>
            <th data-field="id">Tehsil</th>
            <th data-field="name">UCS/Sub Division</th>
            <th data-field="name">Village</th>
            <th data-field="price">Level</th>
            <th data-field="price">Campus</th>
            <th data-field="id">Gender</th>
            <th data-field="id">Medium</th>
            <th data-field="name">Viability Status</th>
            <th data-field="price">Status</th>
          </tr>
        </thead>
        <?php if(!empty($records)): ?>
        <tbody>
          <?php foreach ($records as $key => $value): ?>
          <tr>
            <td><?php echo $value->semis_code; ?></td>
            <td><?php echo $value->school_name; ?></td>
            <td><?php echo $value->district; ?></td>
            <td><?php echo $value->tehsil; ?></td>
            <td><?php echo $value->sub_division; ?></td>
            <td><?php echo $value->village; ?></td>
            <td><?php echo $value->level; ?></td>
            <td><?php echo $value->campus; ?></td>
            <td><?php echo $value->gender; ?></td>
            <td><?php echo $value->medium; ?></td>
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
<!--Information Table ends-->

<div class="divider"></div>

<div class="row">
    <div class="col s12 m12 l12 waves-effect blue accent-2 white-text center-align flow-text">
      Classwise Enrollment Status as on <u>31-03-2018</u> as per School Record
    </div>
</div>

<div class="divider"></div>

<div id="bordered-table">
  <div class="row">
    <?php 
      if (isset($this->session->userdata['message_display'])) {
      echo "<div class='alert alert-info fade in'>";
        echo $this->session->userdata['message_display'];
        $this->session->unset_userdata('message_display');
      echo "</div>";
    }
      $attributes = array('id' => 'enrollmentData');
    echo form_open_multipart('Enrollments/enrollmentData', $attributes); 

    if (isset($this->session->userdata['errors'])) {
      echo "<div class='alert alert-danger fade in'>";
        echo $this->session->userdata['errors'];
        $this->session->unset_userdata('errors');
      echo "</div>";
    }

    ?>
    <div class="col s12 m12 l12">
      <input type="hidden" name="school_semis_code" value="<?php echo $semisCode; ?>">


      <!--Class wise Enrollment-->
      <table class="striped">
        <?php if(!empty($classes)): ?>
        <thead>
          <tr>
            <th>Gender</th>
            <?php foreach ($classes as $key => $value): ?>
            <th data-field="<?php echo $value->id; ?>"><?php echo $value->class; ?></th>
            <?php endforeach; ?>
            <th>Total</th>
          </tr>
        </thead>
        <?php endif; ?>

        <tbody>
          <tr>
            <td><strong>Boys</strong></td>
            <?php for($x = 0; $x < 13; $x++){ ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'boysEnrollment[]',
                    'id'            => 'boysEnrollment'.$x,
                    'class'       => 'validate',
                    'maxlength'   => 3,
                    'onkeypress'  => 'return isNumberKey(event)'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td> 
            <?php } ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'TotalBoysOld',
                    'id'            => 'TotalBoysOld',
                    'class'       => 'validate',
                    'maxlength'   => 3,
                    'onkeypress'  => 'return isNumberKey(event)',
                    'readonly'    => 'true'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td>
          </tr>

          <tr>
            <td><strong>Girls</strong></td>
            <?php for($x = 0; $x < 13; $x++){ ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'girlsEnrollment[]',
                    'id'            => 'girlsEnrollment'.$x,
                    'class'       => 'validate',
                    'maxlength'   => 3,
                    'onkeypress'  => 'return isNumberKey(event)'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td> 
            <?php } ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'TotalGirlsOld',
                    'id'            => 'TotalGirlsOld',
                    'class'       => 'validate',
                    'maxlength'   => 3,
                    'onkeypress'  => 'return isNumberKey(event)',
                    'readonly'    => 'true'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td>
          </tr>
        </tbody>
        
      </table>
      <!--Class wise Enrollment ends here-->

      <div class="divider"></div>

      <!--New Enrollment-->

      <div class="row">
        <div class="col s12 m12 l12 waves-effect green darken-4 white-text center-align flow-text">
          New Enrollment after <u>1 April 2018</u>
        </div>
      </div>

      <table class="striped">
        <?php if(!empty($classes)): ?>
        <thead>
          <tr>
            <th>Gender</th>
            <?php foreach ($classes as $key => $value): ?>
            <th data-field="<?php echo $value->id; ?>"><?php echo $value->class; ?></th>
            <?php endforeach; ?>
            <th>Total</th>
          </tr>
        </thead>
        <?php endif; ?>

        <tbody>
          <tr>
            <td><strong>Boys</strong></td>
            <?php for($x = 0; $x < 13; $x++){ ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'newBoysEnrollment[]',
                    'id'            => 'newBoysEnrollment'.$x,
                    'class'       => 'validate',
                    'maxlength'   => 3,
                    'onkeypress'  => 'return isNumberKey(event)'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td> 
            <?php } ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'TotalBoysNew',
                    'id'            => 'TotalBoysNew',
                    'class'       => 'validate',
                    'maxlength'   => 3,
                    'onkeypress'  => 'return isNumberKey(event)',
                    'readonly'    => 'true'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td>
          </tr>

          <tr>
            <td><strong>Girls</strong></td>
            <?php for($x = 0; $x < 13; $x++){ ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'newGirlsEnrollment[]',
                    'id'            => 'newGirlsEnrollment'.$x,
                    'class'       => 'validate',
                    'maxlength'   => 3,
                    'onkeypress'  => 'return isNumberKey(event)'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td> 
            <?php } ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'TotalGirlsNew',
                    'id'            => 'TotalGirlsNew',
                    'class'       => 'validate',
                    'maxlength'   => 3,
                    'onkeypress'  => 'return isNumberKey(event)',
                    'readonly'    => 'true'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td>
          </tr>
        </tbody>
        
      </table>

      <!--New Enrollment Ends here-->

      <div class="divider"></div>

      <!--Total Enrollment-->

      <div class="row">
        <div class="col s12 m12 l12 waves-effect green darken-4 white-text center-align flow-text">
          Total School Enrollment
        </div>
      </div>

      <table class="striped">
        <?php if(!empty($classes)): ?>
        <thead>
          <tr>
            <th>Gender</th>
            <?php foreach ($classes as $key => $value): ?>
            <th data-field="<?php echo $value->id; ?>"><?php echo $value->class; ?></th>
            <?php endforeach; ?>
            <th>Total</th>
          </tr>
        </thead>
        <?php endif; ?>

        <tbody>
          <tr>
            <td><strong>Boys</strong></td>
            <?php for($x = 0; $x < 13; $x++){ ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'BoysEnrollmentTotal[]',
                    'id'            => 'BoysEnrollmentTotal'.$x,
                    'class'       => 'validate',
                    'readonly'  => 'true'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td> 
            <?php } ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'TotalBoys',
                    'id'            => 'TotalBoys',
                    'class'       => 'validate',
                    'readonly'  => 'true'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td>
          </tr>

          <tr>
            <td><strong>Girls</strong></td>
            <?php for($x = 0; $x < 13; $x++){ ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'GirlsEnrollmentTotal[]',
                    'id'            => 'GirlsEnrollmentTotal'.$x,
                    'class'       => 'validate',
                    'readonly'  => 'true'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td> 
            <?php } ?>
            <td>
              <div class="input-field">
                <?php
                  $data = array(
                    'name'          => 'TotalGirls',
                    'id'            => 'TotalGirls',
                    'class'       => 'validate',
                    'readonly'  => 'true'
                  );
                  echo form_input($data);
                ?>
              </div>
            </td>
          </tr>
        </tbody>
        
      </table>

      <div class="row">
        <div class="col s6">
          <button type="submit" class="waves-effect waves-light cyan darken-4 btn">Submit</button>
        </div>
      </div>
    </div>
    <?php echo form_close();?>
  </div>
</div>

<?php include(APPPATH.'views/common/footer.php');?>

<script type="text/javascript">

  // $('#boysEnrollment0, #boysEnrollment1, #boysEnrollment2, #boysEnrollment3, #boysEnrollment4, #boysEnrollment5, #boysEnrollment6, #boysEnrollment7, #boysEnrollment8, #boysEnrollment9, #boysEnrollment10, #boysEnrollment11, #boysEnrollment12 ').keyup(function(e){
  //   var sumOldBoys = 0;
  //   var oldBoys0 = +$('#boysEnrollment0').val();
  //   var oldBoys1 = +$('#boysEnrollment1').val();
  //   var oldBoys2 = +$('#boysEnrollment2').val();
  //   var oldBoys3 = +$('#boysEnrollment3').val();
  //   var oldBoys4 = +$('#boysEnrollment4').val();
  //   var oldBoys5 = +$('#boysEnrollment5').val();
  //   var oldBoys6 = +$('#boysEnrollment6').val();
  //   var oldBoys7 = +$('#boysEnrollment7').val();
  //   var oldBoys8 = +$('#boysEnrollment8').val();
  //   var oldBoys9 = +$('#boysEnrollment9').val();
  //   var oldBoys10 = +$('#boysEnrollment10').val();
  //   var oldBoys11 = +$('#boysEnrollment11').val();
  //   var oldBoys12 = +$('#boysEnrollment12').val();

  //   sumOldBoys = sumOldBoys + (oldBoys0 + oldBoys1 + oldBoys2 + oldBoys3 + oldBoys4 + oldBoys5 + oldBoys6 + oldBoys7 + oldBoys8 + oldBoys9 + oldBoys10 + oldBoys11 + oldBoys12);

  //     $('#TotalBoysOld').val(sumOldBoys);

  //   });

  // $('#girlsEnrollment0, #girlsEnrollment1, #girlsEnrollment2, #girlsEnrollment3, #girlsEnrollment4, #girlsEnrollment5, #girlsEnrollment6, #girlsEnrollment7, #girlsEnrollment8, #girlsEnrollment9, #girlsEnrollment10, #girlsEnrollment11, #girlsEnrollment12 ').keyup(function(e){
  //   var sumOldGirls = 0;
  //   var oldGirls0 = +$('#girlsEnrollment0').val();
  //   var oldGirls1 = +$('#girlsEnrollment1').val();
  //   var oldGirls2 = +$('#girlsEnrollment2').val();
  //   var oldGirls3 = +$('#girlsEnrollment3').val();
  //   var oldGirls4 = +$('#girlsEnrollment4').val();
  //   var oldGirls5 = +$('#girlsEnrollment5').val();
  //   var oldGirls6 = +$('#girlsEnrollment6').val();
  //   var oldGirls7 = +$('#girlsEnrollment7').val();
  //   var oldGirls8 = +$('#girlsEnrollment8').val();
  //   var oldGirls9 = +$('#girlsEnrollment9').val();
  //   var oldGirls10 = +$('#girlsEnrollment10').val();
  //   var oldGirls11 = +$('#girlsEnrollment11').val();
  //   var oldGirls12 = +$('#girlsEnrollment12').val();

  //   sumOldGirls = sumOldGirls + (oldGirls0 + oldGirls1 + oldGirls2 + oldGirls3 + oldGirls4 + oldGirls5 + oldGirls6 + oldGirls7 + oldGirls8 + oldGirls9 + oldGirls10 + oldGirls11 + oldGirls12);

  //     $('#TotalGirlsOld').val(sumOldGirls);

  //   });

  // $('#newBoysEnrollment0, #newBoysEnrollment1, #newBoysEnrollment2, #newBoysEnrollment3, #newBoysEnrollment4, #newBoysEnrollment5, #newBoysEnrollment6, #newBoysEnrollment7, #newBoysEnrollment8, #newBoysEnrollment9, #newBoysEnrollment10, #newBoysEnrollment11, #newBoysEnrollment12 ').keyup(function(e){
  //   var sumNewBoys = 0;
  //   var newBoys0 = +$('#newBoysEnrollment0').val();
  //   var newBoys1 = +$('#newBoysEnrollment1').val();
  //   var newBoys2 = +$('#newBoysEnrollment2').val();
  //   var newBoys3 = +$('#newBoysEnrollment3').val();
  //   var newBoys4 = +$('#newBoysEnrollment4').val();
  //   var newBoys5 = +$('#newBoysEnrollment5').val();
  //   var newBoys6 = +$('#newBoysEnrollment6').val();
  //   var newBoys7 = +$('#newBoysEnrollment7').val();
  //   var newBoys8 = +$('#newBoysEnrollment8').val();
  //   var newBoys9 = +$('#newBoysEnrollment9').val();
  //   var newBoys10 = +$('#newBoysEnrollment10').val();
  //   var newBoys11 = +$('#newBoysEnrollment11').val();
  //   var newBoys12 = +$('#newBoysEnrollment12').val();

  //   sumNewBoys = sumNewBoys + (newBoys0 + newBoys1 + newBoys2 + newBoys3 + newBoys4 + newBoys5 + newBoys6 + newBoys7 + newBoys8 + newBoys9 + newBoys10 + newBoys11 + newBoys12);

  //     $('#TotalBoysNew').val(sumNewBoys);

  //   });

  // $('#newGirlsEnrollment0, #newGirlsEnrollment1, #newGirlsEnrollment2, #newGirlsEnrollment3, #newGirlsEnrollment4, #newGirlsEnrollment5, #newGirlsEnrollment6, #newGirlsEnrollment7, #newGirlsEnrollment8, #newGirlsEnrollment9, #newGirlsEnrollment10, #newGirlsEnrollment11, #newGirlsEnrollment12 ').keyup(function(e){
  //   var sumNewGirls = 0;
  //   var newGirls0 = +$('#newGirlsEnrollment0').val();
  //   var newGirls1 = +$('#newGirlsEnrollment1').val();
  //   var newGirls2 = +$('#newGirlsEnrollment2').val();
  //   var newGirls3 = +$('#newGirlsEnrollment3').val();
  //   var newGirls4 = +$('#newGirlsEnrollment4').val();
  //   var newGirls5 = +$('#newGirlsEnrollment5').val();
  //   var newGirls6 = +$('#newGirlsEnrollment6').val();
  //   var newGirls7 = +$('#newGirlsEnrollment7').val();
  //   var newGirls8 = +$('#newGirlsEnrollment8').val();
  //   var newGirls9 = +$('#newGirlsEnrollment9').val();
  //   var newGirls10 = +$('#newGirlsEnrollment10').val();
  //   var newGirls11 = +$('#newGirlsEnrollment11').val();
  //   var newGirls12 = +$('#newGirlsEnrollment12').val();

  //   sumNewGirls = sumNewGirls + (newGirls0 + newGirls1 + newGirls2 + newGirls3 + newGirls4 + newGirls5 + newGirls6 + newGirls7 + newGirls8 + newGirls9 + newGirls10 + newGirls11 + newGirls12);

  //     $('#TotalGirlsNew').val(sumNewGirls);

  //   });

  function isNumberKey(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

     return true;
  }

  $('#boysEnrollment0, #boysEnrollment1, #boysEnrollment2, #boysEnrollment3, #boysEnrollment4, #boysEnrollment5, #boysEnrollment6, #boysEnrollment7, #boysEnrollment8, #boysEnrollment9, #boysEnrollment10, #boysEnrollment11, #boysEnrollment12, #girlsEnrollment0, #girlsEnrollment1, #girlsEnrollment2, #girlsEnrollment3, #girlsEnrollment4, #girlsEnrollment5, #girlsEnrollment6, #girlsEnrollment7, #girlsEnrollment8, #girlsEnrollment9, #girlsEnrollment10, #girlsEnrollment11, #girlsEnrollment12, #newBoysEnrollment0, #newBoysEnrollment1, #newBoysEnrollment2, #newBoysEnrollment3, #newBoysEnrollment4, #newBoysEnrollment5, #newBoysEnrollment6, #newBoysEnrollment7, #newBoysEnrollment8, #newBoysEnrollment9, #newBoysEnrollment10, #newBoysEnrollment11, #newBoysEnrollment12, #newGirlsEnrollment0, #newGirlsEnrollment1, #newGirlsEnrollment2, #newGirlsEnrollment3, #newGirlsEnrollment4, #newGirlsEnrollment5, #newGirlsEnrollment6, #newGirlsEnrollment7, #newGirlsEnrollment8, #newGirlsEnrollment9, #newGirlsEnrollment10, #newGirlsEnrollment11, #newGirlsEnrollment12').keyup(function(e){

    var sumOldBoys = 0;
    var sumOldGirls = 0;
    var sumNewBoys = 0;
    var sumNewGirls = 0;

    var sumGrandTotalBoys = 0;
    var sumGrandTotalGirls = 0;

    var totalKatchiBoys = 0;
    var totalKatchiGirls = 0;
    var totalClassOneBoys = 0;
    var totalClassOneGirls = 0;
    var totalClassTwoBoys = 0;
    var totalClassTwoGirls = 0;
    var totalClassThreeBoys = 0;
    var totalClassThreeGirls = 0;
    var totalClassFourBoys = 0;
    var totalClassFourGirls = 0;
    var totalClassFiveBoys = 0;
    var totalClassFiveGirls = 0;
    var totalClassSixBoys = 0;
    var totalClassSixGirls = 0;
    var totalClassSevenBoys = 0;
    var totalClassSevenGirls = 0;
    var totalClassEightBoys = 0;
    var totalClassEightGirls = 0;
    var totalClassNineBoys = 0;
    var totalClassNineGirls = 0;
    var totalClassTenBoys = 0;
    var totalClassTenGirls = 0;
    var totalClassElevenBoys = 0;
    var totalClassElevenGirls = 0;
    var totalClassTwelveBoys = 0;
    var totalClassTwelveGirls = 0;

    var oldBoys0 = +$('#boysEnrollment0').val();
    var oldBoys1 = +$('#boysEnrollment1').val();
    var oldBoys2 = +$('#boysEnrollment2').val();
    var oldBoys3 = +$('#boysEnrollment3').val();
    var oldBoys4 = +$('#boysEnrollment4').val();
    var oldBoys5 = +$('#boysEnrollment5').val();
    var oldBoys6 = +$('#boysEnrollment6').val();
    var oldBoys7 = +$('#boysEnrollment7').val();
    var oldBoys8 = +$('#boysEnrollment8').val();
    var oldBoys9 = +$('#boysEnrollment9').val();
    var oldBoys10 = +$('#boysEnrollment10').val();
    var oldBoys11 = +$('#boysEnrollment11').val();
    var oldBoys12 = +$('#boysEnrollment12').val();

    var oldGirls0 = +$('#girlsEnrollment0').val();
    var oldGirls1 = +$('#girlsEnrollment1').val();
    var oldGirls2 = +$('#girlsEnrollment2').val();
    var oldGirls3 = +$('#girlsEnrollment3').val();
    var oldGirls4 = +$('#girlsEnrollment4').val();
    var oldGirls5 = +$('#girlsEnrollment5').val();
    var oldGirls6 = +$('#girlsEnrollment6').val();
    var oldGirls7 = +$('#girlsEnrollment7').val();
    var oldGirls8 = +$('#girlsEnrollment8').val();
    var oldGirls9 = +$('#girlsEnrollment9').val();
    var oldGirls10 = +$('#girlsEnrollment10').val();
    var oldGirls11 = +$('#girlsEnrollment11').val();
    var oldGirls12 = +$('#girlsEnrollment12').val();

    var newBoys0 = +$('#newBoysEnrollment0').val();
    var newBoys1 = +$('#newBoysEnrollment1').val();
    var newBoys2 = +$('#newBoysEnrollment2').val();
    var newBoys3 = +$('#newBoysEnrollment3').val();
    var newBoys4 = +$('#newBoysEnrollment4').val();
    var newBoys5 = +$('#newBoysEnrollment5').val();
    var newBoys6 = +$('#newBoysEnrollment6').val();
    var newBoys7 = +$('#newBoysEnrollment7').val();
    var newBoys8 = +$('#newBoysEnrollment8').val();
    var newBoys9 = +$('#newBoysEnrollment9').val();
    var newBoys10 = +$('#newBoysEnrollment10').val();
    var newBoys11 = +$('#newBoysEnrollment11').val();
    var newBoys12 = +$('#newBoysEnrollment12').val();

    var newGirls0 = +$('#newGirlsEnrollment0').val();
    var newGirls1 = +$('#newGirlsEnrollment1').val();
    var newGirls2 = +$('#newGirlsEnrollment2').val();
    var newGirls3 = +$('#newGirlsEnrollment3').val();
    var newGirls4 = +$('#newGirlsEnrollment4').val();
    var newGirls5 = +$('#newGirlsEnrollment5').val();
    var newGirls6 = +$('#newGirlsEnrollment6').val();
    var newGirls7 = +$('#newGirlsEnrollment7').val();
    var newGirls8 = +$('#newGirlsEnrollment8').val();
    var newGirls9 = +$('#newGirlsEnrollment9').val();
    var newGirls10 = +$('#newGirlsEnrollment10').val();
    var newGirls11 = +$('#newGirlsEnrollment11').val();
    var newGirls12 = +$('#newGirlsEnrollment12').val();


    sumOldBoys = sumOldBoys + (oldBoys0 + oldBoys1 + oldBoys2 + oldBoys3 + oldBoys4 + oldBoys5 + oldBoys6 + oldBoys7 + oldBoys8 + oldBoys9 + oldBoys10 + oldBoys11 + oldBoys12);

    sumOldGirls = sumOldGirls + (oldGirls0 + oldGirls1 + oldGirls2 + oldGirls3 + oldGirls4 + oldGirls5 + oldGirls6 + oldGirls7 + oldGirls8 + oldGirls9 + oldGirls10 + oldGirls11 + oldGirls12);

    sumNewBoys = sumNewBoys + (newBoys0 + newBoys1 + newBoys2 + newBoys3 + newBoys4 + newBoys5 + newBoys6 + newBoys7 + newBoys8 + newBoys9 + newBoys10 + newBoys11 + newBoys12);

    sumNewGirls = sumNewGirls + (newGirls0 + newGirls1 + newGirls2 + newGirls3 + newGirls4 + newGirls5 + newGirls6 + newGirls7 + newGirls8 + newGirls9 + newGirls10 + newGirls11 + newGirls12);

      $('#TotalBoysOld').val(sumOldBoys);
      $('#TotalGirlsOld').val(sumOldGirls);
      $('#TotalBoysNew').val(sumNewBoys);
      $('#TotalGirlsNew').val(sumNewGirls);

      totalKatchiBoys = totalKatchiBoys + (oldBoys0 + newBoys0);
      totalKatchiGirls = totalKatchiGirls + (oldGirls0 + newGirls0);
      totalClassOneBoys = totalClassOneBoys + (oldBoys1 + newBoys1);
      totalClassOneGirls = totalClassOneGirls + (oldGirls1 + newGirls1);
      totalClassTwoBoys = totalClassTwoBoys + (oldBoys2 + newBoys2);
      totalClassTwoGirls = totalClassTwoGirls + (oldGirls2 + newGirls2);
      totalClassThreeBoys = totalClassThreeBoys + (oldBoys3 + newBoys3);
      totalClassThreeGirls = totalClassThreeGirls + (oldGirls3 + newGirls3);
      totalClassFourBoys = totalClassFourBoys + (oldBoys4 + newBoys4);
      totalClassFourGirls = totalClassFourGirls + (oldGirls4 + newGirls4);
      totalClassFiveBoys = totalClassFiveBoys + (oldBoys5 + newBoys5);
      totalClassFiveGirls = totalClassFiveGirls + (oldGirls5 + newGirls5);
      totalClassSixBoys = totalClassSixBoys + (oldBoys6 + newBoys6);
      totalClassSixGirls = totalClassSixGirls + (oldGirls6 + newGirls6);
      totalClassSevenBoys = totalClassSevenBoys + (oldBoys7 + newBoys7);
      totalClassSevenGirls = totalClassSevenGirls + (oldGirls7 + newGirls7);
      totalClassEightBoys = totalClassEightBoys + (oldBoys8 + newBoys8);
      totalClassEightGirls = totalClassEightGirls + (oldGirls8 + newGirls8);
      totalClassNineBoys = totalClassNineBoys + (oldBoys9 + newBoys9);
      totalClassNineGirls = totalClassNineGirls + (oldGirls9 + newGirls9);
      totalClassTenBoys = totalClassTenBoys + (oldBoys10 + newBoys10);
      totalClassTenGirls = totalClassTenGirls + (oldGirls10 + newGirls10);
      totalClassElevenBoys = totalClassElevenBoys + (oldBoys11 + newBoys11);
      totalClassElevenGirls = totalClassElevenGirls + (oldGirls11 + newGirls11);
      totalClassTwelveBoys = totalClassTwelveBoys + (oldBoys12 + newBoys12);
      totalClassTwelveGirls = totalClassTwelveGirls + (oldGirls12 + newGirls12);

      $('#BoysEnrollmentTotal0').val(totalKatchiBoys); 
      $('#GirlsEnrollmentTotal0').val(totalKatchiGirls);
      $('#BoysEnrollmentTotal1').val(totalClassOneBoys); 
      $('#GirlsEnrollmentTotal1').val(totalClassOneGirls);
      $('#BoysEnrollmentTotal2').val(totalClassTwoBoys); 
      $('#GirlsEnrollmentTotal2').val(totalClassTwoGirls);
      $('#BoysEnrollmentTotal3').val(totalClassThreeBoys); 
      $('#GirlsEnrollmentTotal3').val(totalClassThreeGirls);
      $('#BoysEnrollmentTotal4').val(totalClassFourBoys); 
      $('#GirlsEnrollmentTotal4').val(totalClassFourGirls);
      $('#BoysEnrollmentTotal5').val(totalClassFiveBoys); 
      $('#GirlsEnrollmentTotal5').val(totalClassFiveGirls);
      $('#BoysEnrollmentTotal6').val(totalClassSixBoys); 
      $('#GirlsEnrollmentTotal6').val(totalClassSixGirls);
      $('#BoysEnrollmentTotal7').val(totalClassSevenBoys); 
      $('#GirlsEnrollmentTotal7').val(totalClassSevenGirls);
      $('#BoysEnrollmentTotal8').val(totalClassEightBoys); 
      $('#GirlsEnrollmentTotal8').val(totalClassEightGirls);
      $('#BoysEnrollmentTotal9').val(totalClassNineBoys); 
      $('#GirlsEnrollmentTotal9').val(totalClassNineGirls);
      $('#BoysEnrollmentTotal10').val(totalClassTenBoys); 
      $('#GirlsEnrollmentTotal10').val(totalClassTenGirls);
      $('#BoysEnrollmentTotal11').val(totalClassElevenBoys); 
      $('#GirlsEnrollmentTotal11').val(totalClassElevenGirls);
      $('#BoysEnrollmentTotal12').val(totalClassTwelveBoys); 
      $('#GirlsEnrollmentTotal12').val(totalClassTwelveGirls);

      sumGrandTotalBoys = sumGrandTotalBoys + (totalKatchiBoys + totalClassOneBoys + totalClassTwoBoys + totalClassThreeBoys + totalClassFourBoys + totalClassFiveBoys + totalClassSixBoys + totalClassSevenBoys + totalClassEightBoys + totalClassNineBoys + totalClassTenBoys + totalClassElevenBoys + totalClassTwelveBoys);

      sumGrandTotalGirls = sumGrandTotalGirls + (totalKatchiGirls + totalClassOneGirls + totalClassTwoGirls + totalClassThreeGirls + totalClassFourGirls + totalClassFiveGirls + totalClassSixGirls + totalClassSevenGirls + totalClassEightGirls + totalClassNineGirls + totalClassTenGirls + totalClassElevenGirls + totalClassTwelveGirls);

      $('#TotalBoys').val(sumGrandTotalBoys); 
      $('#TotalGirls').val(sumGrandTotalGirls);
  });

    $("form").submit(function(){

        var inps_b = document.getElementsByName('boysEnrollment[]');
        for (var i = 0; i <inps_b.length; i++) {
          var inp_b = inps_b[i];
            if(inp_b.value == ""){
              inp_b.value = 0;
            }
        }

        var inps_g = document.getElementsByName('girlsEnrollment[]');
        for (var i = 0; i <inps_g.length; i++) {
          var inp_g = inps_g[i];
            if(inp_g.value == ""){
              inp_g.value = 0;
            }
        }

        var inps_nb = document.getElementsByName('newBoysEnrollment[]');
        for (var i = 0; i <inps_nb.length; i++) {
          var inp_nb = inps_nb[i];
            if(inp_nb.value == ""){
              inp_nb.value = 0;
            }
        }

        var inps_ng = document.getElementsByName('newGirlsEnrollment[]');
        for (var i = 0; i <inps_ng.length; i++) {
          var inp_ng = inps_ng[i];
            if(inp_ng.value == ""){
              inp_ng.value = 0;
            }
        }

    });

</script>