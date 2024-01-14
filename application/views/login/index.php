<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIPDS</title>
        <link href="<?= base_url() ?>assets/user/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="<?= base_url() ?>public/css/login.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    </head>
<body>
<?php
        //for warning -> flash_message
        //for info -> success_message
        
        $arr = $this->session->flashdata();
        if(!empty($arr['flash_message'])){
            $html = '<div class="container" style="margin-top: 10px;">';
            $html .= '<div class="alert alert-warning alert-dismissible" role="alert">';
            $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $html .= $arr['flash_message'];
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        }else if (!empty($arr['success_message'])){
            $html = '<div class="container" style="margin-top: 10px;">';
            $html .= '<div class="alert alert-info alert-dismissible" role="alert">';
            $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $html .= $arr['success_message'];
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        }else if (!empty($arr['danger_message'])){
            $html = '<div class="container" style="margin-top: 10px;">';
            $html .= '<div class="alert alert-danger alert-dismissible" role="alert">';
            $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $html .= $arr['danger_message'];
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        }
    ?>
<div class="d-flex justify-content-center align-items-center container-fluid my-5">
    <div class="login justify-content-center d-flex flex-column">
        <div class="judul">
            <p>Sistem Informasi Pengelolaan data Sampel dan Lembar Hasil Uji</p>
            <p>UPTD Laboratorium Lingkungan Kota Palangkaraya</p>
            <img src="<?= base_url() ?>public/image/logo-dlh.png" alt="logo-dlh" class="img-fluid" width="140">
        </div>
        <div class="form-login">
            <?php $fattr = array('class' => 'form-signin');
                echo form_open(site_url().'main/login/', $fattr); 
            ?>
            <div class="form-group">
                <?php echo form_input(array(
                    'name'=>'email', 
                    'id'=> 'email', 
                    'placeholder'=>'username', 
                    'class'=>'form-control mx-auto',  
                    'value'=> set_value('email'))); ?>
                <?php echo form_error('email', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            </div>
            <div class="form-group">
                <?php echo form_password(array(
                    'name'=>'password',
                    'type' => 'password',
                    'id'=> 'password', 
                    'placeholder'=>'Password', 
                    'class'=>'form-control mx-auto', 
                    'placeholder'=>'Password',
                    'value'=> set_value('password'))); ?>
                <?php echo form_error('password', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="showPassword">
                    <label class="form-check-label" for="showPassword">Show Password</label>
                </div>
            </div>
            <?php 
                echo form_submit(array('value'=>'Login', 'class'=>'btn btn-danger mx-auto btn-block')); ?>
            <?php echo form_close(); ?>
        </div>
        <a href="<?= base_url() ?>main/sampel" class="text-center mb-2">Status Sampel</a>
    </div>
</div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>/public/extensions/jquery/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#showPassword').change(function () {
                var passwordField = $('#password');
                if($(this).prop('checked')){
                    passwordField.attr('type', 'text');
                }else{
                    passwordField.attr('type', 'password');
                }
            
            })
        })
    </script>
</body>
</html>


