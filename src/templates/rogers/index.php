<?php defined( '_JEXEC' ) or die( 'Restricted access' );

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;
$app = JFactory::getApplication();
$logo = $this->params->get('logoFile');
$sitename = $app->getCfg('sitename');
$baseURL = JURI::root();

$contenSpanWidth = 12;
$leftColumnSpanWidth = 4;
$rightColumnSpanWidth = 4;
if ($this->countModules('left')){
	$contenSpanWidth = $contenSpanWidth - $leftColumnSpanWidth;
}
if ($this->countModules('right')){
	$contenSpanWidth = $contenSpanWidth - $rightColumnSpanWidth;
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Joomla! system CSS-->
		<link rel="stylesheet" href="<?php echo $baseURL ?>templates/system/css/system.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $baseURL ?>templates/system/css/general.css" type="text/css" />
		<!-- Bootstrap CSS-->
		<link rel="stylesheet" href="<?php echo $baseURL ?>templates/<?php echo $this->template; ?>/css/bootstrap.css" type="text/css" />
		<!-- Template CSS-->
		<link rel="stylesheet" href="<?php echo $baseURL ?>templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $baseURL ?>templates/<?php echo $this->template; ?>/css/prettyPhoto.css" type="text/css" />
		<!-- Bootstrap JavaScript-->
		<script src="<?php echo $baseURL ?>templates/<?php echo $this->template; ?>/js/jquery-1.9.1.js"></script>
		<script src="<?php echo $baseURL ?>templates/<?php echo $this->template; ?>/js/bootstrap.js"></script>
		<script src="<?php echo $baseURL ?>templates/<?php echo $this->template; ?>/js/jquery.prettyPhoto.js"></script>
		<!--Favicons-->
		<link rel="shortcut icon" href="<?php echo $baseURL ?>/templates/<?php echo $this->template; ?>/img/favicon.ico" type="image/x-icon" />
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});
			});
		</script>
		<jdoc:include type="head" />
	</head>
	<body>
        <!-- Tirei porque tava dando um espaço em cima do menu quando o Bootstrap ativava o responsive
        <jdoc:include type="message" />
        -->
        <!-- Incluindo a Logo do cabeçalho -->
        <img id="pageBackground" src="<?php echo $baseURL . $this->params->get('logoFile'); ?>" alt="<?php echo $sitename;?>"/>
        <?php if(isset($logo)):?>
            <div class="container" id="headerImage">
                <img src="<?php echo $baseURL . $this->params->get('logoFile'); ?>" alt="<?php echo $sitename;?>"/>
            </div>
        <?php endif;?>
        <?php if ($this->countModules('top')): ?>
            <nav class="navbar navbar-inverse navbar-default navbar-static-top navbar-scardt">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand navbarLogoAnchor" href="#"><?php echo $sitename;?></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <jdoc:include type="modules" name="top" />
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.navbar-collapse -->
            </nav>
        <?php endif; ?>
		<div class="container">
			<jdoc:include type="modules" name="breadcrumb" />
			<div class="row">
				<?php if ($this->countModules('left')): ?>
					<div class="col-md-<?php echo $leftColumnSpanWidth;?> well">
						<jdoc:include type="modules" name="left" />
					</div>
				<?php endif; ?>
				<div class="col-md-<?php echo $contenSpanWidth;?>">
					<jdoc:include type="component" />
				</div>
				<?php if ($this->countModules('right')): ?>
					<div class="col-md-<?php echo $rightColumnSpanWidth;?> well">
						<jdoc:include type="modules" name="right" />
					</div>
				<?php endif; ?>
			</div>
			<!-- Rodape do site -->
			<?php if ($this->countModules('footer')): ?>
				<jdoc:include type="modules" name="footer" />
			<?php endif; ?>
			<jdoc:include type="modules" name="debug" />
		</div>
	</body>
    <script type="text/javascript">
        (function($){
        jQuery(document).ready(function(){
            $('#bs-example-navbar-collapse-1 ul.nav').addClass('navbar-nav');
            $('.parent').addClass('dropdown');
            $('.parent > a').addClass('dropdown-toggle');
            $('.parent > a').attr('data-toggle', 'dropdown');
            $('.parent > a').attr('href','#');
            $('.parent > a').append('<span class="caret"></span>');
            $('.parent > ul').addClass('dropdown-menu');
        });
        })(jQuery);
    </script>
</html>
