<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Short Name</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Login Counter</th>
                        </tr>
                    </thead>
                 
                    <?php $base = base_url();?>
                    <?php if(!empty($users)): ?>
                    <tbody>
                    <?php foreach ($users as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['username']; ?></td>
                            <td><?php echo $value['short_name']; ?></td>
                            <td><?php echo $value['full_name']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $value['description']; ?></td> 
                            <td><?php echo $value['counter']; ?></td>
                        </tr>
 					<?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
</table>

<script type="text/javascript">
window.onload = function() { window.print(); }
</script>