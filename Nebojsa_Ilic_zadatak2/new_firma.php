<html>
    <center>
        <input type="button" id="show_singup" value="Show Singup">
        <div class="user_register">
            <div id="singup_form">
                <form action="Include/add_firma.php" method="post" name="reg">                       
                    <div class="form-group">
                        <div id="registration-form">
                            <label>Naziv Firme:</label> 
                            <input class="form-control" id="naziv" type="text" minlength="3" maxlength="15" name="naziv_firme" autocomplete="off" id="naziv_firme" required="" /> <span id="user-result"></span> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Drzava:</label>
                        <input class="form-control" id="drzava" type="text" name="drzava" required="" />
                    </div>
                    <div class="form-group">
                        <label>Broj zaposlenih:</label>
                        <input class="form-control" id="br_zap" type="number" name="br_zap" required="" />
                    </div>
                    <div class="form-group">
                        <label>Kreator:</label>
                        <input class="form-control" id="kreator" type="text" name="kreator" value="<?php $user->get_username($id); ?>" disabled="" />
                    </div>
                    <h3 class="text-center">Naziv firme mora biti unikatan!</h1>
                        <button class="btn btn-primary" type="submit" name="register_firma">Register</button>
                        <br>
                        <input type = "button" id="close_singup" value="Close">
                        </form>
                        </div>
                        <br>
                        </div>
                        </div>
                        </center>
                        </html>