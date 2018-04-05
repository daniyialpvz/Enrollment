<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>District Name</th>
                            <th>Taluka Name</th>
                            <th>Level</th>
                            <th>TEO Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                 
                    <?php $base = base_url();?>
                    <?php if(!empty($talukauser)): ?>
                    <tbody>
                    <?php foreach ($talukauser as $key => $value): ?>
                        <tr>
                            <td><?php echo $value->district_name; ?></td>
                            <td><?php echo $value->taluka_name; ?></td>
                            <td><?php echo $value->level == 1  ? "Primary" : "Secondary"; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->gender; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->contact; ?></td>
                        </tr>
 					<?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
</table>

<script type="text/javascript">
window.onload = function() { window.print(); }
</script>