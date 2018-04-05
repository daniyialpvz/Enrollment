<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sector</th>
                            <th>Short</th>
                        </tr>
                    </thead>
                 
                    <?php $base = base_url();?>
                    <?php if(!empty($sectors)): ?>
                    <tbody>
                    <?php foreach ($sectors as $key => $value): ?>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->description; ?></td>
                            <td><?php echo $value->short; ?></td>
                        </tr>
 					<?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
</table>

<script type="text/javascript">
window.onload = function() { window.print(); }
</script>