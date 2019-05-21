<?php
    ?>
    <div class="container-fluid setting_container">
        <div class="row">
            <div class="col-12">
                <form action="./src/main/forget_action.php" class="form-group form_change" method="post">
                    <h1></h1>
                    <div class="form_cont">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="email_adress" aria-describedby="emailHelp" placeholder="Your email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pseudo</label>
                            <input type="text" class="form-control" id="pseudo" pattern="[a-zA-z0-9]{5, 27}" placeholder="Change pseudo" name="pseudo">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
?>