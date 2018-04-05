<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>District Name</th>
                            <th>Focus Area</th>
                            <th>Objective</th>
                            <th>Activities</th>
                            <th>Strategies</th>
                            <th>Target Years</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                 
                    <?php $base = base_url();?>
                    <?php if(!empty($districtInfos)): ?>
                    <tbody>
                    <?php foreach ($districtInfos as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['district_name']; ?></td>
                            <td><?php echo $value['sector_name']; ?></td>
                            <td><?php echo $value['objective']; ?></td>
                            <td>
                                <table>
                                <?php foreach ($value['districtActivity'] as $key_activity => $activity): ?>
                                <tr>    
                                <td><?php echo $activity->description; ?></td>
                                <!-- <td><?php echo $activity->total_cost; ?></td> -->
                                </tr>
                                <?php endforeach; ?>
                                </table>
                            </td>
                            <td><?php echo $value['strategies']; ?></td>
                            <td>
                                <table>
                                <tr>    
                                <?php foreach ($value['targetYears'] as $key_targetYear => $targetYear): ?>
                                <td><?php echo $targetYear->description; ?></td>
                                <?php endforeach; ?>
                                </tr>
                                </table>
                            </td>
                            <td><?php echo $value['total_cost']; ?></td>
                            <td>
                                <?php if ($value['status'] == 1){
                                        echo "In Progress";
                            }elseif($value['status'] == 2){
                                        echo "Complete";
                            }elseif($value['status'] == 3){
                                        echo "In Complete";
                            }else{
                                        echo "No Record Found!";
                            }
                                ?>
                            </td>
                        </tr>
                         

 					<?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
</table>

<script type="text/javascript">
window.onload = function() { window.print(); }
</script>