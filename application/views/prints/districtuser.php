<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>District Name</th>
                            <th>Level</th>
                            <th>Name of Deo</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                 
                    <?php $base = base_url();?>
                    <?php if(!empty($districtuser)): ?>
                    <tbody>
                    <?php foreach ($districtuser as $key => $value): ?>
                        <tr>
                            <td><?php echo $value->district; ?></td>
                            <td><?php echo $value->level == 1  ? "Primary" : "Secondary"; ?></td>
                            <td><?php echo $value->deo; ?></td>
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