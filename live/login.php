<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?PHP echo base_url();?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin-Login</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="resources/template-assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="resources/template-assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="resources/template-assets/css/style.css" rel="stylesheet" />
    <link href="resources/custom-assests/css/style.css" rel="stylesheet" />
    
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
    
    
                    <div class="col-md-12" style="margin-top:5px">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <strong> Admin Login</strong>
                        </div>
                        <div class="panel-body col-md-6">
                            <form id="login_form">

                                <div class="form-group ">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control" id="userid" placeholder="Enter userid" />
                                <span class="err-msg" id="userid_err" > </span>
                                </div>

                                <div class="form-group ">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" />
                                <span class="err-msg" id="pwd_err">  </span>
                                </div>
                                
	                            <button type="button" id="login_btn" class="btn btn-primary">Click Here Login</button>
                            <span id="validate_msg"></span>
                            <!--
                            
                            <input type="text" class="form-control" placeholder="Text input" />
                            <hr />
                            <textarea class="form-control" rows="3" placeholder="Text Area"></textarea>
                            <hr />
                            <div class="checkbox">
                            <label>
                            <input type="checkbox" value="" />
                            Option one is this and that&mdash;be sure to include why it's great
                            </label>
                            </div>
                            <div class="checkbox disabled">
                            <label>
                            <input type="checkbox" value="" disabled />
                            Option two is disabled
                            </label>
                            </div>
                            
                            <div class="radio">
                            <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked />
                            Option one is this and that&mdash;be sure to include why it's great
                            </label>
                            </div>
                            <div class="radio">
                            <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                            Option two can be something else and selecting it will deselect option one
                            </label>
                            </div>
                            <div class="radio disabled">
                            <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled />
                            Option three is disabled
                            </label>
                            </div>
                            -->
                            </form>
                            <hr />
                            </div>
                            
                            
                            </div>
                    </div>

    
    
     </div>
    <!-- /. WRAPPER  -->
   
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    <script>var base_url="<?PHP echo base_url();?>"  </script>
    <script src="resources/template-assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="resources/template-assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="resources/template-assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="resources/template-assets/js/custom.js"></script>
    
    <script src="resources/custom-assests/js/Jquery.js"> </script>
        <script src="resources/custom-assests/js/scripts.js"> </script>


</body>
</html>
