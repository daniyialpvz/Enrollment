<table align="center" width="70%" border="1px solid" id="data-table-simple" class="responsive-table display" cellspacing="0">

    <thead>
        <tr>
            <th>Donor Name</th>
            <th>Acronym</th>
            <th>Website</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Phone</th>
            <th>Fax</th>
            <th>Email</th>
            <th>Twitter</th>
            <th>President</th>
            <th>President Phone</th>
        </tr>
    </thead>
    <?php if(!empty($donors)): ?>
    <tbody>
        <?php foreach ($donors as $key => $value): ?>
        <tr>
            <td><?php echo $value->devPartnerName; ?></td>
            <td><?php echo $value->acronym; ?></td>
            <td><?php echo $value->website; ?></td>
            <td><?php echo $value->address; ?></td>
            <td><?php echo $value->city; ?></td>
            <td><?php echo $value->postalcode; ?></td>
            <td><?php echo $value->phone; ?></td>
            <td><?php echo $value->fax; ?></td>
            <td><?php echo $value->email; ?></td>
            <td><?php echo $value->twitter; ?></td>
            <td><?php echo $value->president; ?></td>
            <td><?php echo $value->presidentPhone; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <?php endif; ?>

</table>

<script type="text/javascript">
    window.onload = function() { window.print(); }
</script>