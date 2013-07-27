<table>
    <tr>
        <td>User </td>
        <td> : </td>
        <td> <?php echo form_input('username', $this->session->userdata('username'), 'id="username" readonly=1');?></td>
    </tr>

    
    <tr>
        <td>Email </td>
        <td> : </td>
        <td> <?php echo form_input('username', $this->session->userdata('email'), 'id="email"');?></td>
    </tr>
</table>