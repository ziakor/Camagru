<?php
    ?>
    <div class="container-fluid setting_container">
        <div class="row">
            <div class="col-12">
                <form action="./src/main/settings_action.php" class="form-group form_change" method="post">
                    <h1></h1>
                    <div class="form_cont">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control settings_input" id="email_adress" aria-describedby="emailHelp" placeholder="New email" name="new_email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pseudo</label>
                            <input type="text" class="form-control settings_input" id="pseudo" pattern="[a-zA-z0-9]{5, 27}" placeholder="Change pseudo" name="new_pseudo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Current password</label>
                            <input type="password" class="form-control settings_input" id="current_password" placeholder="Current password"title="salsifi" name="current_passwd" required>
                            <small id="emailHelp" class="form-text text-muted">remplissez, bande de salopes</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">New password</label>
                            <input type="password" class="form-control settings_input" id="new_password1" placeholder="Change password" pattern="[a-zA-z0-9]{7,}" name="new_passwd">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password Confirmation</label>
                            <input type="password" class="form-control settings_input" id="new_password2" placeholder="Confirm password" pattern="[a-zA-z0-9]{7,}" name="new_passwd2">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label mail_receive" for="defaultCheck1">
                                receive mail:
                            </label>

                            <?php
                                if ($_SESSION['receive_mail'] == true) {
                                    echo '<input class="form-check-input" id="input_receive_mail" type="checkbox" value="true" name="check_mail" onclick="change_check()" checked>';
                                } else {
                                    echo '<input class="form-check-input" id="input_receive_mail" type="checkbox" value="false" name="check_mail" onclick="change_check()">';
                                }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
?>