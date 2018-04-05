<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Venue</th>
                            <th>Meeting Date</th>
                            <th>Meeting Time</th>
                            <th>Agenda</th>
                        </tr>
                    </thead>
                 
                    <?php $base = base_url();?>
                    <?php if(!empty($meetings)): ?>
                    <tbody>
                    <?php $snumber = 1; foreach ($meetings as $key => $value): ?>
                        <tr>
                            <td><?php echo $snumber; ?></td>
                            <td><?php echo $value->venue; ?></td>
                            <td><?php echo $value->meeting_date; ?></td> 
                            <td><?php echo $value->meeting_time; ?></td> 
                            <td><?php echo $value->agenda; ?></td> 
                        </tr>
 					<?php $snumber++; endforeach; ?>
                    </tbody>
                <?php endif; ?>
</table>

<script type="text/javascript">
window.onload = function() { window.print(); }
</script>