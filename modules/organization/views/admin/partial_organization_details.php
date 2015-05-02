<table class="table table-condensed">
    <tr>
        <td width="20%"><?php echo lang('code')?></th>
        <th><?php echo $organization['code']; ?></th>
    </tr>
    <tr>
        <td><?php echo lang('organization_name')?></th>
        <th><?php echo $organization['organization_name']; ?></th>
    </tr>
    <tr>
        <td><?php echo lang('specialization')?></th>
        <th><?php echo $organization['specialization']; ?></th>
    </tr>
    <tr>
        <td><?php echo lang('total_volunteer')?></th>
        <th><?php echo $organization['total_volunteer']; ?></th>
    </tr>
    <tr>
        <td><?php echo lang('start_date')?></th>
        <th><?php echo date('Y M d', strtotime($organization['start_date'])); ?></th>
    </tr>
    
    <tr>
        <td><?php echo lang('end_date')?></th>
        <th><?php echo date('Y M d', strtotime($organization['end_date'])); ?></th>
    </tr>
    <tr>
        <td><?php echo lang('country')?></th>
        <th><?php echo $organization['country']; ?></th>
    </tr>
    <tr>
        <td><?php echo lang('contact_name')?></th>
        <th><?php echo $organization['contact_name']; ?></th>
    </tr>
    <tr>
        <td><?php echo lang('contact_phone')?></th>
        <th><?php echo $organization['contact_phone']; ?></th>
    </tr>
    <tr>
        <td><?php echo lang('contact_email')?></th>
        <th><?php echo $organization['contact_email']; ?></th>
    </tr>

               
</table>