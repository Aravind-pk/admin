<?php
    require_once('config.php');
    require_once('database.php');
   
     
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ISTE TKMCE PAYMENT</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
        <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="../reg/css/opensans-font.css">
    <link rel="stylesheet" type="text/css"
        href="reg/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../reg/css/style.css" />
        <style>
            .razorpay-payment-button{
                 background:#6c5ce7;
                 color:whitesmoke;
                 font-size:0.8rem;
                 text-transform:uppercase;
                 letter-spacing:1;
                 display:block;
                 width:15vw;
                 height:8vh;
                 border:none;
                 padding:0.3rem 0.3rem;
            }
            .img_size{
                 margin:0 auto;
                 width:180px;
                 height:180px;
            }
            figcaption{
                 text-align:center;
                 letter-spacing:1;
            }
            .card-body{
                 font-size:0.8rem;
                 font-weight:bold;
            }
        </style>
        
    <style>
        .fa,
        .fas {
            color: rgb(47, 56, 65);
        }

        .btn {
            background: #3e4061;
            color: white;


        }
    </style>
    </head>
    <body style="background-color: aqua;">
        <div class="page-content">
        <div class="form-v1-content">
            <div class="wizard-form">
                    <div id="form-total">

                        <h2 style="padding-top: 10px; color:purple; text-align: center;">
                            <img style="text-align: left; width:90px; height : 90px;" src="../iste.png">
                            <!-- <p class="step-icon"><span>01</span></p> -->
                            <span class="step-text">ISTE TKMCE</span>
                        </h2>
                        <br>
                        <h4 style="color:purple; text-align: center;">
                             <p style="font-size:20px; color:red; text-align: center;">(The email provided for registration must be used for payment)</p> 
                            <!--<span class="step-text">(The email provided for registration must be used for payment)</span>-->
                        </h4>
                        <div style="text-align:center;">
                            <p
                                style="text-align: center; color:rgb(109, 111, 216); padding: 10px;" "font-size:small;font-weight:500;font-family:sans-serif d-flex text-align-justify">
                                Registration amount : 400/- <br> Razerpay amount : 15/- <br> ___________________ <br>
                                Total
                                amount :
                                415/-
                                <br> </p>
                        </div>
                        <div style="margin-bottom:20px; text-align:center;"> <a href="javascript:void(0)" class="pt-1 pb-1 btn btn-lg btn-primary buy_now" data-amount="415" data-id="5">Pay Now</a></div></div>
                    
                    </div>
                    
            </div>
        </div>
    </div>

               </div>
         </div>

       </div>
        
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

  $('body').on('click', '.buy_now', function(e){
     var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    var contact_number = $("#contact").attr("value");
    var options = {
    "key": "rzp_live_ykPL0KfoECSN6h",
    "amount": totalAmount * 100, // 2000 paise = INR 20
    "name": "ISTE TKMCE",
    "description": "Registration Fees",
    "currency":"INR",
    "image": "./iste.png",
    "handler": function (response){
            $.ajax({
            url: 'razorPaySuccess.php',
            type: 'post',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
            }, 
            success: function (msg) {
               
                window.location.href = 'thankyou.php';
            }
        });
      
    },
 
    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
   rzp1.open();
  e.preventDefault();
  });
 
</script>
    </body>
</html>