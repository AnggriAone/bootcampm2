<?php
	
	session_start();
	$_getuser = $_SESSION['user'];
	if ($_getuser!='') {
		header("Location: http://localhost/mobile/mobile.php");
		exit(1);
	}
	   
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>Login</title>
	
	<link href="js/dojox/mobile/themes/iphone/iphone.css" rel="stylesheet"></link>

    <!-- stylesheet will go here -->
	<script src="js/dojo/dojo.js" data-dojo-config="isDebug: true, parseOnLoad: true"></script>

    <!-- dojo/javascript will go here http://livedocs.dojotoolkit.org/dojox/mobile -->
	<script>
		// Load the widget parser
		dojo.require("dojox.mobile.parser");
		// Load the base lib
		dojo.require("dojox.mobile");		
		// If not a WebKit-based client, load compat
		dojo.requireIf(!dojo.isWebKit, "dojox.mobile.compat");

		dojo.require("dojox.mobile.TextBox");
		dojo.require("dojox.mobile.Button");
		
		dojo.require("dijit.form.Form");
		
		dojo.ready(function() {
			console.log("Dojo version " + dojo.version + " is loaded");
		});

	</script>
 
    </head>
    <body>
 
    <!-- application will go here -->
	<div id="home" dojoType="dojox.mobile.View" selected="true">	 
		<!-- title heading -->
		<h1 dojoType="dojox.mobile.Heading">LOGIN</h1>
		
		<form id="formLogin" data-dojo-type="dijit.form.Form" method="post" action="dologin.php">
			<script type="dojo/method" event="onSubmit">
				var dataForm = dojo.formToObject("formLogin");
				console.log(dataForm);
				console.log(dojo.toJson(dataForm, true));
				
				if (!this.validate()) {
		    		alert('Semua field harus diisi');
		    		return false;
				}
				else
				    return true;

			</script>

			<!-- a rounded rectangle list container -->
			<ul dojoType="dojox.mobile.RoundRectList">	 
				<li dojoType="dojox.mobile.ListItem">
					Username
					<input 
						type="text"
						id="username" name="username"
						data-dojo-type="dojox.mobile.TextBox" 
						data-dojo-props="required: true, invalidMessage: 'Harus diisi', placeHolder: 'Username'"
						/>
				</li>
				<li dojoType="dojox.mobile.ListItem">
					Password
					<input 
						type="password"
						id="password" name="password"
						data-dojo-type="dojox.mobile.TextBox" 
						data-dojo-props="required: true, invalidMessage: 'Harus diisi', placeHolder: 'Password'" 
						/>
				</li>

				<li dojoType="dojox.mobile.ListItem">
					<div align="center">
						<button 
							id="btnLogin"
							data-dojo-type="dojox.mobile.Button"
							data-dojo-props=" type: 'submit', showLabel:true,
								onClick:function(){ 
								  console.log('Login clicked');
								}">
							Login
						</button>

						<button id="btnExit"
							data-dojo-type="dojox.mobile.Button"
							data-dojo-props=" type: 'button', showLabel:true,
								onClick:function(){ 
								  console.log('Exit clicked');
								  dijit.byId('formLogin').reset();
								}">
								Exit
						</button>
					</div>
				</li>
			</ul>
		</form>

	</div>
	<!-- application will go here -->

    </body>
</html>
