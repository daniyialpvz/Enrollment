<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Sector Name</th>
                            <th>Outcome</th>
                            <th>Outputs</th>
                            <th>Description</th>
                            <th>Indicators</th>
                            <th>Targets</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <?php $base = base_url();?>
                    <?php if(!empty($actions)): ?>
                    <tbody>
                    <?php $snumber = 1; foreach ($actions as $key => $value): ?>
                        <tr>
                            <td><?php echo $snumber; ?></td>
                            <td><?php echo $value['sector_name']; ?></td>
                            <td><?php echo $value['outcome']; ?></td>
                            <td><?php echo $value['outputs']; ?></td>
                            <td><?php echo $value['description']; ?></td>
                            <td><?php echo $value['indicators']; ?></td>
                            <td><?php echo $value['targets']; ?></td>
                            <td>
                                <?php if($value['status'] == 1){
                              echo "In Progress";
                              }else if($value['status'] == 2){
                                echo "Complete";
                                }else if($value['status'] == 3){
                                echo "Incomplete";
                                }else{
                                  echo "No status";
                                  } ?>
                            </td>
                        </tr>

 					<?php $snumber++; endforeach; ?>
                    </tbody>
                <?php endif; ?>
</table>

<script type="text/javascript">
window.onload = function() { window.print(); }
</script>