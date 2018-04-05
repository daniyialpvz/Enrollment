<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Deo</th>
                            <th>Case Type</th>
                            <th>Detail Of Assign</th>
                            <th>Num Of Seats</th>
                            <th>Completed Seats</th>
                            <th>Assign Start Date</th>
                            <th>Assign Target Date</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <?php $base = base_url();?>
                    <?php if(!empty($assignments)): ?>
                    <tbody>
                    <?php foreach ($assignments as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['deo']; ?></td>
                            <td><?php echo $value['case_type']; ?></td>
                            <td><?php echo $value['detail_of_assign']; ?></td>
                            <td><?php echo $value['num_of_seats']; ?></td>
                            <td><?php echo $value['completed_seats']; ?></td>
                            <td><?php echo $value['assign_start_date']; ?></td>
                            <td><?php echo $value['assign_target_date']; ?></td>
                            <td><?php echo $value['comment']; ?></td>
                        </tr>
                        
                         
                         

                    <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
</table>

<script type="text/javascript">
window.onload = function() { window.print(); }
</script>