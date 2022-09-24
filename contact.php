<?php require('top.php');
?>
<body><br>  
  <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/contact.png) 
  no-repeat scroll center; background-size :50%vw">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php"><b>Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><b>Contact Us</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                        <div class="map-contacts--2">
                        <h2 class="title__line--6">LOCATION</h2>
                            <div id="googleMap">
                            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.9158318483264!2d70.77298831442879!3d22.281177949220467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959ca376a04a5cf%3A0x3cd2a63573f9a83a!2sSynergy%20Party%20Sales(Tupperware%20Distributor)!5e0!3m2!1sen!2sin!4v1655919437732!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 440px;" allowfullscreen></iframe>
             
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="title__line--6">CONTACT US</h2>
                        <div class="address">
                            <div class="address__icon">
                                <i class="icon-location-pin icons"></i>
                            </div>
                            <div class="address__details">
                                <h2 class="ct__title">our address</h2>
                                <p>"KARM", 1st Floor, Opp. Imperial heights, 150ft Ring Road, Rajkot.</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address__icon">
                                <i class="icon-envelope icons"></i>
                            </div>
                            <div class="address__details">
                                <h2 class="ct__title">openning hour</h2>
                                <p>10.00 AM to 7.30 PM </p>
                            </div>
                        </div>

                        <div class="address">
                            <div class="address__icon">
                                <i class="icon-phone icons"></i>
                            </div>
                            <div class="address__details">
                                <h2 class="ct__title">Phone Number</h2>
                                <p>9033058889</p>
                            </div>
                        </div>
                    </div>      
                </div>
                <div class="row">
                    <div class="contact-form-wrap mt--60">
                        <div class="col-xs-12">
                            <div class="contact-title">
                                <h2 class="title__line--6">SEND FEEDBACK</h2>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <form id="contact-form" action="" method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" id="name" name="name" placeholder="Enter Your Name">
                                        <input type="email" id="email" name="email" placeholder="Enter Your Email">
                                        <input type="text" id="mobile" name="mobile" maxlength='10' placeholder="Enter Your Contact Number">
                                    </div>
                                </div>
                                
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                    </div>
                                </div>

                                <div class="contact-btn">
                                    <button type="button" href="contact.php" onclick="send_message()" class="fv-btn">Send MESSAGE</button>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
        <!-- <script>
            function send_message()
            {
                var name=jQuery("#name").val();
                var email=jQuery("#email").val();
                var mobile=jQuery("#mobile").val();
                var message=jQuery("#message").val();
                    
                if(name==""){
                    alert('Please enter name');
                }else if(email==""){
                    alert('Please enter email');
                }else if(mobile==""){
                    alert('Please enter mobile number');
                }else if(message==""){
                    alert('Please enter message');
                }else{
                    jQuery.ajax({
                        url:'send_message.php',
                        type:'post',
                        data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
                        success:function(result){
                            alert(result);
                        }
                    });
                }
            }
        </script> -->
        </body>
        
<?php require('footer.php') ?>
