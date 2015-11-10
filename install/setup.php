<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Template de base</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
    
    
<div class="page-container">
  
	<!-- top navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
       <div class="container">
    	<div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <div class="navbar-brand">Setup</div>
    	</div>
        
       </div>
       
    </div>
      
    <div class="container">
      <div class="row">
        
  	
        <!-- main area -->
        <div class="col-lg-10">
            
            <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
        <div class="progress" id="progress1">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
            </div>
            <span class="progress-type">Commencement</span>
            <span class="progress-completed">20%</span>
        </div>
    </div>
    <div class="row">
        <div class="row step"><!--
            <div id="div1" class="col-md-2" onclick="">
                <span class="fa fa-cloud-download"></span>
                <p></p>
            </div>-->
            <div class="col-md-2 activestep" onclick="javascript: resetActive(event, 25, 'step-2');">
                <span class="fa fa-pencil"></span>
                <p>Commencement</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 50, 'step-3');">
                <span class="fa fa-refresh"></span>
                <p>Identification</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 75, 'step-4');">
                <span class="fa fa-dollar"></span>
                <p>Votre site</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 100, 'step-5');">
                <span class="fa fa-dollar"></span>
                <p>Récaptitulatif</p>
            </div>
        </div>
    </div>
    <div class="row setup-content step activeStepInfo" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h3>Ce que vous allez faire</h3>
                - Vos identifiants afin de vous connecter à votre site <br />
                - Les configurations de votre site <br />
                - Eventuelles options du site <br />
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>ETAPE 1</h1>
                <h3 class="underline">Vos identifiants</h3>
                
                <br />
                
                <center>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Votre Pseudo">
                </div>
                <br />
                <div class="input-group">
                  <input type="password" class="form-control" placeholder="Votre mot de passe">
                </div>
                
                </center>

            </div>
        </div>
    </div>
                
    <div class="row setup-content step hiddenStepInfo" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>ETAPE 2</h1>
                <h3 class="underline">Configuration du site</h3>
                
                <br />
                
                <center>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Titre du site">
                </div>
                <br />
                <div class="input-group">
                  <input type="password" class="form-control" placeholder="Description du site (255 caractères max.)">
                </div>
                
                <br />
                <div class="input-group">
                  <input type="password" class="form-control" placeholder="votre @ mail">
                </div>
                
                </center> 
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>ETAPE 3</h1>
                <h3 class="underline">Récapitulatif</h3>
                
                <br /><br /><br />
                 <br /><br /><br />
                <button type="button" class="btn btn-primary">Continuer</button>
            </div>
        </div>
    </div>
</div>

<style>
.hiddenStepInfo {
    display: none;
}

.activeStepInfo {
    display: block !important;
}

.underline {
    text-decoration: underline;
}

.step {
    margin-top: 27px;
}

.progress {
    position: relative;
    height: 25px;
}

.progress > .progress-type {
    position: absolute;
    left: 0px;
    font-weight: 800;
    padding: 3px 30px 2px 10px;
    color: rgb(255, 255, 255);
    background-color: rgba(25, 25, 25, 0.2);
}

.progress > .progress-completed {
    position: absolute;
    right: 0px;
    font-weight: 800;
    padding: 3px 10px 2px;
}

.step {
    text-align: center;
}

.step .col-md-2 {
    background-color: #fff;
    border: 1px solid #C0C0C0;
    border-right: none;
}

.step .col-md-2:last-child {
    border: 1px solid #C0C0C0;
}

.step .col-md-2:first-child {
    border-radius: 5px 0 0 5px;
}

.step .col-md-2:last-child {
    border-radius: 0 5px 5px 0;
}

.step .col-md-2:hover {
    color: #F58723;
    cursor: pointer;
}

.step .activestep {
    color: #F58723;
    height: 100px;
    margin-top: -7px;
    padding-top: 7px;
    border-left: 6px solid #5CB85C !important;
    border-right: 6px solid #5CB85C !important;
    border-top: 3px solid #5CB85C !important;
    border-bottom: 3px solid #5CB85C !important;
    vertical-align: central;
}

.step .fa {
    padding-top: 15px;
    font-size: 40px;
}
</style>

<script type="text/javascript">
    function resetActive(event, percent, step) {
        $(".progress-bar").css("width", percent + "%").attr("aria-valuenow", percent);
        $(".progress-completed").text(percent + "%");

        $("div").each(function () {
            if ($(this).hasClass("activestep")) {
                $(this).removeClass("activestep");
            }
        });

        if (event.target.className == "col-md-2") {
            $(event.target).addClass("activestep");
        }
        else {
            $(event.target.parentNode).addClass("activestep");
        }

        hideSteps();
        showCurrentStepInfo(step);
    }

    function hideSteps() {
        $("div").each(function () {
            if ($(this).hasClass("activeStepInfo")) {
                $(this).removeClass("activeStepInfo");
                $(this).addClass("hiddenStepInfo");
            }
        });
    }

    function showCurrentStepInfo(step) {        
        var id = "#" + step;
        $(id).addClass("activeStepInfo");
    }
</script>
          
        </div><!-- /.col-xs-12 main -->
    </div><!--/.row-->
  </div><!--/.container-->
</div><!--/.page-container-->
	<!-- script references -->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/scripts.js"></script>
	</body>
</html>