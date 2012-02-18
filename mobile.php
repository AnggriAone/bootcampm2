<?php
session_start();
$_getuser = $_SESSION['user'];
if ($_getuser == '') {
    header("Location: localhost/bootcampm2/");
    exit(1);
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <title>Your Application Name</title>

        <link href="js/dojox/mobile/themes/iphone/iphone.css" rel="stylesheet"></link>
        <!-- <link href="js/dojox/mobile/themes/android/android.css" rel="stylesheet"></link> -->

        <!-- stylesheet will go here -->
        <script src="js/dojo/dojo.js" data-dojo-config="isDebug: true, parseOnLoad: true"></script>

        <!-- dojo/javascript will go here -->
        <script>
            // Load the widget parser
            dojo.require("dojox.mobile.parser");
            // Load the base lib
            dojo.require("dojox.mobile");		
            // If not a WebKit-based client, load compat
            dojo.requireIf(!dojo.isWebKit, "dojox.mobile.compat");

            dojo.require("dojox.mobile.Button");
            dojo.require("dojox.mobile.TextBox");
            dojo.require("dijit.form.Form");

        </script>

    </head>
    <body>

        <!-- application will go here -->
        <!-- the view or "page"; select it as the "home" screen -->
        <div id="settings" dojoType="dojox.mobile.View" selected="true">

            <!-- a sample heading -->
            <h1 dojoType="dojox.mobile.Heading">"Homepage" View</h1>

            <!-- a rounded rectangle list container -->
            <ul dojoType="dojox.mobile.RoundRectList">

                <li dojoType="dojox.mobile.ListItem" icon="i-icon-1.png" rightText="InputData" moveTo="inputData">
				Input Data
                </li>

                <!-- list item with an icon containing a switch -->
                <li dojoType="dojox.mobile.ListItem" icon="i-icon-1.png">
				Airplane Mode
                    <!-- the switch -->
                    <div class="mblItemSwitch" dojoType="dojox.mobile.Switch"></div>
                </li>

                <!-- list item with an icon that slides this view away and then loads another page -->
                <li dojoType="dojox.mobile.ListItem" icon="i-icon-1.png" rightText="mac">
				Wi-Fi
                </li>

                <!-- list item with an icon that slides to a view called "general" -->
                <li dojoType="dojox.mobile.ListItem" icon="i-icon-1.png" rightText="AcmePhone" moveTo="general">
				Carrier
                </li>

                <li dojoType="dojox.mobile.ListItem">
                    <div align="left">
                        <button 
                            id="btnLogin"
                            data-dojo-type="dojox.mobile.Button"
                            data-dojo-props=" type: 'button', showLabel:true,
								onClick:function(){ 
								  console.log('Logout clicked');
								  window.location.href='dologin.php?a=logout'
								}">
							Logout
                        </button>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Input data sub-page -->
        <div id="inputData" dojoType="dojox.mobile.View">
            <form id="formInputData" data-dojo-type="dijit.form.Form" method="post" action="simpandata.php">
                <script type="dojo/method" event="onSubmit">
				var dataForm = dojo.formToObject("formInputData");
				console.log(dataForm);
				console.log(dojo.toJson(dataForm, true));

				if (!this.validate()) {
		    		alert('Semua field harus diisi');
		    		return false;
				}
				else
				    return true;

                </script>

                <h1 dojoType="dojox.mobile.Heading" back="Home" moveTo="settings">Input Data</h1>

                <!-- a rounded rectangle list container -->
                <ul dojoType="dojox.mobile.RoundRectList">
                    <li dojoType="dojox.mobile.ListItem">
				   Kode
                        <input 
                            type="text"
                            id="kode" name="kode"
                            data-dojo-type="dojox.mobile.TextBox" 
                            data-dojo-props="required: true, invalidMessage: 'Harus diisi', placeHolder: 'Kode'"
                            />
                    </li>
                    <li dojoType="dojox.mobile.ListItem">
				   Nama
                        <input 
                            type="text"
                            id="nama" name="nama"
                            data-dojo-type="dojox.mobile.TextBox" 
                            data-dojo-props="required: true, invalidMessage: 'Harus diisi', placeHolder: 'Nama'"
                            />
                    </li>
                    <li dojoType="dojox.mobile.ListItem">
				   Tipe
                        <input 
                            type="text"
                            id="tipe" name="tipe"
                            data-dojo-type="dojox.mobile.TextBox" 
                            data-dojo-props="required: true, invalidMessage: 'Harus diisi', placeHolder: 'Tipe'"
                            />
                    </li>
                    <li dojoType="dojox.mobile.ListItem">
				   Merk
                        <input 
                            type="text"
                            id="merk" name="merk"
                            data-dojo-type="dojox.mobile.TextBox" 
                            data-dojo-props="required: true, invalidMessage: 'Harus diisi', placeHolder: 'Merk'"
                            />
                    </li>

                    <li dojoType="dojox.mobile.ListItem">
                        <div align="center">
                            <button 
                                id="btnSubmit"
                                data-dojo-type="dojox.mobile.Button"
                                data-dojo-props=" type: 'submit', showLabel:true,
								onClick:function(){ 
								  console.log('Submit clicked');
								}">
							Submit
                            </button>

                            <button id="btnBack"
                                    data-dojo-type="dojox.mobile.Button"
                                    data-dojo-props=" type: 'button', showLabel:true,
								onClick:function(){ 
								  console.log('Back clicked');
								  dijit.byId('settings').show();
								  return false;
								}">
								Back
                            </button>
                        </div>
                    </li>
                </ul>
        </div>

        <!-- The "General" sub-page -->
        <div id="general" dojoType="dojox.mobile.View" selected="false">
            <!-- a sample heading -->
            <h1 dojoType="dojox.mobile.Heading" back="Settings" moveTo="settings">General View</h1>
            <!-- a rounded rectangle list container -->
            <ul dojoType="dojox.mobile.RoundRectList">
                <li dojoType="dojox.mobile.ListItem" moveTo="about">
			About
                </li>
                <li dojoType="dojox.mobile.ListItem" rightText="2h 40m" moveTo="about">
			Usage
                </li>
            </ul>
        </div>

        <!-- And let's add another view "About" -->
        <div id="about" dojoType="dojox.mobile.View">
            <!-- Main view heading -->
            <h1 dojoType="dojox.mobile.Heading" back="General" moveTo="general">About</h1>
            <!-- subheading -->
            <h2 dojoType="dojox.mobile.RoundRectCategory">Generic Mobile Device</h2>
            <!-- a rounded rectangle list container -->
            <ul dojoType="dojox.mobile.RoundRectList">
                <li dojoType="dojox.mobile.ListItem" rightText="AcmePhone">
			Network                                           
                </li>                                               
                <li dojoType="dojox.mobile.ListItem" rightText="AcmePhone">
			Line
                </li>
                <li dojoType="dojox.mobile.ListItem" rightText="1024">
			Songs
                </li>
                <li dojoType="dojox.mobile.ListItem" rightText="10">
			Videos
                </li>
            </ul>
        </div>

        <!-- application will go here -->

    </body>
</html>