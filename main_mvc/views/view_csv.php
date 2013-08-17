<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
            <td width = "20%">Matric Number</td>
            <td width = "20%">Password</td>
            <td width = "30%">User type</td>
          
    </tr>

            <?php foreach($csvData as $field){?>
                <tr>
                    <td><?php echo $field['matric_no']?></td>
                    <td><?php echo $field['password']?></td>
                    <td><?php echo $field['admin_users_id']?></td>
                    
                </tr>
            <?php }?>
</table>