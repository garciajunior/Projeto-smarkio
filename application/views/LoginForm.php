<html>


<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/style.css') ?>">



</head>

<body class="register">
    <div class="container"  >
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel card" >
                <div div class="panel-heading">

                    <?php
                    if (isset($logout_message)) {                        
                        echo "<div class='alert alert-success' role='alert'>". $logout_message ."</div>";                      
                    }
                    ?>
                    <?php
                    if (isset($message_display)) {
                        echo "<div class='message'>";
                        echo $message_display;
                        echo "</div>";
                    }
                    ?>
                
                <div class="panel-title card-header">
                    <div id="login">
                        <h3>Login</h3>
                     
                        <?php echo form_open('userAuth/user_login_process');
            echo "</div>";
                    echo "</div>";
                echo "</div>";

                        echo "<div class='error_msg'>";
                            if (isset($error_message)) {
                                echo "<div class='alert alert-danger' role='alert'>". $error_message ."</div>";
                            }
                        echo validation_errors();
                        echo "</div>";
                echo "  <div style='padding-top:30px' class='panel-body text_color'  >";
                    echo "<div style='margin-bottom: 25px' class='input-group'>";

                        echo form_label('Email: ');
                        echo "<br/>";
                        $data = array(
                            'type' => 'email',
                            'name' => 'email_value',
                            'placeholder' => 'example@email.com'
                        );
                        echo "<div style='color: black'>";
                             echo form_input($data);
                        echo "</div>";
                        echo "<br/>";
                        echo "<br/>";
                    echo "</div>";
                    echo "<div style='margin-bottom: 25px' class='input-group'>";
                        echo form_label('Password : ');
                        echo "<br/>";
                        echo "<div style='color: black'>";
                            echo form_password('password');
                        echo "</div>";
                    echo "</div>";
                        echo "<br/>";
                       
                    echo " <div class='col-sm-12 controls'>";
                        echo form_submit('submit', 'Login', "class='btn btn-block login_btn'");
                    echo "</div>";
                        ?>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style=" padding-top:15px; font-size:100%">
                                    Não posssui uma conta! 
                    </br>   
                                    <a href="<?php echo base_url() ?>register" class = "links">Inscrever-se </a>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>


</body>

</html>