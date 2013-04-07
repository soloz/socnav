<p id="bigHeader"> My Profile</p>

<div align="center">

    <div id="flashdata" align="center">

        <?php
        if ($this->session->flashdata('updateSuccess')) {
            echo $this->session->flashdata('updateSuccess');
        }

        if ($this->session->flashdata('updateFailure')) {
            echo $this->session->flashdata('updateFailure');
        }

        echo validation_errors();
        ?>
    </div>

    <?php echo form_open('/updateprofile'); ?>
    <table>
        <tr>
            <td>&nbsp;</td>
            <td>Personal Information</td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
        </tr>
        <tr><td width="133">First Name:</td>
            <td width="164">
                <?php echo form_input('firstname', set_value('firstname', $user_details['firstname'])); ?>
            </td>
            <td width="271"></td>
        </tr>

        <tr><td>Last Name:</td>
            <td><?php echo form_input('lastname', set_value('lastname', $user_details['lastname'])); ?>
            </td>
            <td></td>
        </tr> 

        <tr><td>Username:</td>
            <td><?php echo form_input('username', set_value('username', $user_details['username'])); ?></td>
            <td></td>
        </tr> 

        <tr><td>Gender:</td>
            <td><?php
                $gender = array('NULL' => '-select-', 'FEMALE' => 'FEMALE', 'MALE' => 'MALE');
                echo form_dropdown('gender', $gender, $user_details['gender']);
                ?>
            </td>
            <td></td>
        </tr> 
        
        <tr><td>Your Phone:</td>
            <?php
                $data = array(
                    'name' => 'phone', 
                    'maxlength'=> '13', 
                    'value' => set_value('phone', $user_details['phonenumber'])
                    );      
            ?>
            <td><?php echo form_input($data); ?></td>
            <td></td>
        </tr> 
        

        <tr><td>Your City:</td>
            <td><?php echo form_input('locationid', set_value('city', $user_details['locationid'])); ?></td>
            <td></td>
        </tr> 

        <tr><td>Your Birthday:</td>
            <td>
                <?php
                /* $day = array('1' => '1', '2' => '2', '3' => '3'); 
                  $month = array('Jan' => 'Jan', 'Feb' => 'Feb', 'Mar' => 'Mar');
                  $year = array('1980' => '1980', '1981' => '1981', '1982' => '1982');

                  echo form_dropdown('day', '$day', '');
                  echo form_dropdown('month', '$month','');
                  echo form_dropdown('year', '$year','');
                 * 
                 */
                ?>        </td>
            <td></td>
        </tr> 

        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="37">Your Email:</td><td><?php echo $user_details['email']; ?></td>
            <td><div align="right">change your email address</div></td>
        </tr>


        <tr>
            <td height="40">Password:</td>
            <td>****************</td>
            <td><div align="right">change your password</div></td>
        </tr>


    </table>
    <hr>
    Optional Preferences : Recieve our alerts for new tickets!
    <hr>


    <?php
    echo br(2);

    //get the preferences out for this user id
    //if a preference exist, set its checked to TRUE

    $prefrences = $user_details['photourl'];
    $pref_selected = explode(',', $prefrences);

    // var_dump($pref_selected);
    // echo "--";
    // var_dump($all_pref);

    echo br(3);

    echo form_submit('submit', 'Update Your Profile');
    echo form_close();
    ?>
</div>