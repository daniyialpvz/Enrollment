<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Division Name</th>
                        </tr>
                    </thead>
                 
                    <?php $base = base_url();?>
                    <?php if(!empty($divisions)): ?>
                    <tbody>
                    <?php foreach ($divisions as $key => $value): ?>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->name; ?></td>
                        </tr>
 					<?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
</table>

<script type="text/javascript">
window.onload = function() { window.print(); }
</script>