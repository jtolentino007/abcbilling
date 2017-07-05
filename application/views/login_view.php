<!DOCTYPE html>
<html lang="en" class="coming-soon">
<head>
    <meta charset="utf-8">
    <title>LOGIN - AB&amp;C</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="author" content="">
    <?php echo $_def_css_files; ?>
    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-blessed3ef7a.css">
    <style>
	    .ui-pnotify-title {
	    	color: white !important;
	    }
        .login-background {
            background: #d5f2fe; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(top, #edfcf3, #04bd52); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(top, #edfcf3, #04bd52); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(top, #edfcf3, #04bd52); /* For Firefox 3.6 to 15 */
            background: linear-gradient(top, #edfcf3, #04bd52); /* Standard syntax */
        }
	    html {
	    	zoom: 100%!important;
	    	overflow-x: hidden;
	    	overflow-y: hidden;
	    }
	    .input-group-addon {
	    	border: 1px solid #aaa;
	    	border-right: none;
	    }
	    @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }
        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }
    </style>
    <style>
	    /* Smartphones (portrait and landscape) ----------- */
		@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
	    	.wrapper { 
	    		left: -10px;
		  		width: 100px;
	    	}
	    	form input { 
    		  appearance: none;
			  outline: 0;
			  border: 1px solid rgba(255, 255, 255, 1);
			  background-color: rgba(255, 255, 255, 1);
			  width: 320px;
			  border-radius: 6px;
			  padding: 10px 10px;
			  margin: 0 auto 10px auto;
			  display: block;
			  text-align: center;
			  font-size: 14px;
			  /*color: white;*/
			  transition-duration: 0.25s;
			  font-weight: 300;
	    	}
	    	.login-button {
				margin-top: 10px;
				width: 320px;
				height: 40px;
			}
	    	.img-company {
	    		margin-left: 70px;
	    	}
	    }
	    /* iPads (portrait and landscape) ----------- */
		@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
			.wrapper { 
	    		left: 1000px;
	    	}
	    	form input { 
    		  appearance: none;
			  outline: 0;
			  border: 1px solid rgba(255, 255, 255, 1);
			  background-color: rgba(255, 255, 255, 1);
			  width: 320px;
			  border-radius: 6px;
			  padding: 10px 10px;
			  margin: 0 auto 10px auto;
			  display: block;
			  text-align: center;
			  font-size: 14px;
			  /*color: white;*/
			  transition-duration: 0.25s;
			  font-weight: 300;
	    	}
	    	.login-button {
				margin-top: 10px;
				width: 320px;
				height: 40px;
			}
	    	.img-company {
	    		margin-left: 0px;
	    	}
		}
    </style>
    <style>
    	/* Desktops and laptops ----------- */
		@media only screen and (min-width : 1224px) {
			.wrapper {
			  background: rgba(76, 175, 80, .4);
			  /*
			  background: -webkit-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
			  background: -moz-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
			  background: -o-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
			  background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);*/
			  padding-top: 60px;
			  position: absolute;
			  /*top: 50%;*/
			  left: 34%;
			  width: 30%;
			  height: 10000px;
			  overflow: hidden;
			}
			.login-button {
				margin-top: 10px;
				width: 300px;
				height: 40px;
			}
			form input {
			  appearance: none;
			  outline: 0;
			  border: 1px solid rgba(255, 255, 255, 1);
			  background-color: rgba(255, 255, 255, 1);
			  width: 290px;
			  border-radius: 6px;
			  padding: 10px 10px;
			  margin: 0 auto 10px auto;
			  display: block;
			  text-align: center;
			  font-size: 14px;
			  /*color: white;*/
			  transition-duration: 0.25s;
			  font-weight: 300;
			}
		}
		.wrapper.form-success .container h1 {
		  transform: translateY(85px);
		}
		.container-cp {
		  max-width: 600px;
		  margin: 0 auto;
		  padding: 80px 0;
		  height: 400px;
		  text-align: center;
		}
		.container-cp h1 {
		  font-size: 40px;
		  transition-duration: 1s;
		  transition-timing-function: ease-in-put;
		  font-weight: 200;
		}
		form {
		  padding: 20px 0;
		  position: relative;
		  z-index: 2;
		}
		form input:hover {
		  background-color: rgba(255, 255, 255, 0.8);
		}
		form input:focus {
		  background-color: white;
		  width: 300px;
		  color: black;
		}
		/*form button {
		  appearance: none;
		  outline: 0;
		  background-color: white;
		  border: 0;
		  padding: 10px 15px;
		  color: #53e3a6;
		  border-radius: 3px;
		  width: 250px;
		  cursor: pointer;
		  font-size: 18px;
		  transition-duration: 0.25s;
		}
		form button:hover {
		  background-color: #f5f7f9;
		}*/
		.bg-bubbles {
		  position: absolute;
		  top: 0;
		  left: 0;
		  width: 100%;
		  height: 100%;
		  z-index: -9999999;
		}
		.bg-bubbles li {
		  position: absolute;
		  list-style: none;
		  display: block;
		  width: 40px;
		  height: 40px;
		  background-color: rgba(255, 255, 255, 0.15);
		  bottom: -160px;
		  -webkit-animation: square 25s infinite;
		  animation: square 25s infinite;
		  -webkit-transition-timing-function: linear;
		  transition-timing-function: linear;
		}
		.bg-bubbles li:nth-child(1) {
		  left: 10%;
		}
		.bg-bubbles li:nth-child(2) {
		  left: 20%;
		  width: 80px;
		  height: 80px;
		  -webkit-animation-delay: 2s;
		  animation-delay: 2s;
		  -webkit-animation-duration: 17s;
		  animation-duration: 17s;
		}
		.bg-bubbles li:nth-child(3) {
		  left: 25%;
		  -webkit-animation-delay: 4s;
		  animation-delay: 4s;
		}
		.bg-bubbles li:nth-child(4) {
		  left: 40%;
		  width: 60px;
		  height: 60px;
		  -webkit-animation-duration: 22s;
		  animation-duration: 22s;
		  background-color: rgba(255, 255, 255, 0.25);
		}
		.bg-bubbles li:nth-child(5) {
		  left: 70%;
		}
		.bg-bubbles li:nth-child(6) {
		  left: 80%;
		  width: 120px;
		  height: 120px;
		  -webkit-animation-delay: 3s;
		  animation-delay: 3s;
		  background-color: rgba(255, 255, 255, 0.2);
		}
		.bg-bubbles li:nth-child(7) {
		  left: 32%;
		  width: 160px;
		  height: 160px;
		  -webkit-animation-delay: 7s;
		  animation-delay: 7s;
		}
		.bg-bubbles li:nth-child(8) {
		  left: 55%;
		  width: 20px;
		  height: 20px;
		  -webkit-animation-delay: 15s;
		  animation-delay: 15s;
		  -webkit-animation-duration: 40s;
		  animation-duration: 40s;
		}
		.bg-bubbles li:nth-child(9) {
		  left: 25%;
		  width: 10px;
		  height: 10px;
		  -webkit-animation-delay: 2s;
		  animation-delay: 2s;
		  -webkit-animation-duration: 40s;
		  animation-duration: 20s;
		  background-color: rgba(255, 255, 255, 0.3);
		}
		.bg-bubbles li:nth-child(10) {
		  left: 90%;
		  width: 160px;
		  height: 160px;
		  -webkit-animation-delay: 11s;
		  animation-delay: 11s;
		}
		@-webkit-keyframes square {
		  0% {
		    -webkit-transform: translateY(0);
		    transform: translateY(0);
		  }
		  100% {
		    -webkit-transform: translateY(-700px) rotate(600deg);
		    transform: translateY(-700px) rotate(600deg);
		  }
		}
		@keyframes square {
		  0% {
		    -webkit-transform: translateY(0);
		    transform: translateY(0);
		  }
		  100% {
		    -webkit-transform: translateY(-700px) rotate(600deg);
		    transform: translateY(-700px) rotate(600deg);
		  }
		}
    </style>
    </head>
<body class="focused-form animated-content login-background">
<div class="container" id="login-form">
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper">
					<div class="container-cp">
						<!-- <h1 style="color: white; font-weight: 200; font-family: 'Segoe UI',sans-serif;">Welcome</h1> -->

						<img class="img-company" style="min-height: 100px; min-width: 100px; max-width: 240px; max-height: 100px; margin-bottom: 15px;" src="<?php echo (file_exists($company_info->logo_path) ? $company_info->logo_path : 'assets/img/jdev-logo.png'); ?>">
							<form class="form">
								<input name="user_name" type="text" placeholder="Username" data-parsley-minlength="20" placeholder="At least 6 characters" required>
								<input name="user_pword" type="password" id="exampleInputPassword1" placeholder="Password">

								<button type="button" id="btn_login" class="btn login-button" style="background: #4caf50; color: white; border:2px solid #ffffff;"><span class=""></span>&nbsp;Login</button>
							</form>
					</div>
				</div>
<!--
				<div class="text-center">
					<a href="#" class="btn btn-label btn-social btn-facebook mb-md"><i class="ti ti-facebook"></i>Connect with Facebook</a>
					<a href="#" class="btn btn-label btn-social btn-twitter mb-md"><i class="ti ti-twitter"></i>Connect with Twitter</a>
				</div>
-->
			</div>
		</div>
</div>
<ul class="bg-bubbles">
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
</ul>
<?php echo $_def_js_files; ?>
<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>
    <script>
        $(document).ready(function(){
            var bindEventHandlers=(function(){
                $('#btn_login').click(function(){
                    // var l = Ladda.create(this);
                    // l.start();
                    validateUser().done(function(response){
                        showNotification(response);
                        if(response.stat=="success"){
                            setTimeout(function(){
                                window.location.href = "dashboard";
                            },600);
                        }
                    }).always(function(){
                        // l.stop();
                        showSpinningProgress($('#btn_login'));
                    });
                });
                $('input').keypress(function(evt){
                    if(evt.keyCode==13){ $('#btn_login').click(); }
                });
            })();
            var validateUser=(function(){
                var _data={uname : $('input[name="user_name"]').val() , pword : $('input[name="user_pword"]').val()};
                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Login/transaction/validate",
                    "data" : _data,
                    "beforeSend": function(){
                    	showSpinningProgress($('#btn_login'));
                    }
                });
            });
            var showSpinningProgress=function(e){
	            $(e).toggleClass('disabled');
	            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
	        };
            var showNotification=function(obj){
                PNotify.removeAll(); //remove all notifications
                new PNotify({
                    title:  obj.title,
                    text:  obj.msg,
                    type:  obj.stat
                });
            };
        });
    </script>
</body>
<!-- Mirrored from avenxo.kaijuthemes.com/extras-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:14:53 GMT -->
</html>
