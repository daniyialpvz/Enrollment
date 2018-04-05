<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Roles</th>
                            <!-- <th>Status</th> -->
                        </tr>
                    </thead>
                 
                    <?php $base = base_url();?>
                    <?php if(!empty($roles)): ?>
                    <tbody>
                    <?php foreach ($roles as $key => $value): ?>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->description; ?></td>
                            <!-- <td><?php echo $value->status; ?></td> -->
                        </tr>
 					<?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
</table>

<script type="text/javascript">
window.onload = function() { window.print(); }
</script>

