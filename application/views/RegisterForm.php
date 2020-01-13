<html>


<head>
    <title>Registration Form</title>
    
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
  
     <link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css') ?>">
     <link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/style.css') ?>">
</head>

<body class="register ">
    <div  class="login">
<div class="container  login-container" >
    <div class="row">
        <div class="container-fluid">
            <!-- <div class="row centered-form"> -->
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                    <div class="panel  card">
                        <div class="panel-heading card-header">
                            <h3 class="panel-title ">Registre-se</h3>
                            <hr />                                
                            <div class="panel-body text_color">
                                <?php
                                    echo "<div class='error_msg'>";
                                        echo validation_errors();
                                        if (isset($message_display)) {
                                            echo "<div class='alert alert-danger' role='alert'>". $message_display ."</div>";
                                        }
                                    echo "</div>"; //classe_error

                                    echo form_open('userAuth/new_user_registration');
                                    echo "<div class='form-group'>";
                                        echo form_label('Nome: ');
                                        echo "<br/>";
                                        echo "<div style='color: black'>";
                                             echo form_input('username');
                                        echo "</div>";
                                        echo "<br/>";
                                    echo "</div>"; // class form-group

                                    echo "	<div class='form-group'>";
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
                                    echo "</div>"; //class form-group
                                    echo "	<div class='form-group'>";
                                        echo form_label('Senha: ');
                                        echo "<br/>";
                                        echo "<div style='color: black'>";
                                             echo form_password('password');
                                        echo "</div>";
                                        echo "<br/>";
                                        echo "<br/>";
                                    echo "</div>"; // class form-group
                                        
                                    echo form_submit('submit', 'Sign Up', "class='btn  btn-block login_btn'");
                                    echo form_close();
                                ?>
                                    <a href="<?php echo base_url() ?>" class = "links"  >Login</a>
                            </div> <!--panel body -->                            
                        </div>  <!-- panel-heading -->
                    </div>  <!--panel panel-info -->
                </div> <!--col-xs-12 -->
        </div> <!-- class="container-fluid"-->
    </div> <!-- class="row"-->
</div> <!-- class="container"-->
</div>
</body>


</html>