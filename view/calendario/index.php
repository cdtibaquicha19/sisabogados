<?php 
	include('includes/loader.php'); 
	$_SESSION['token'] = time();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Calendario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ajax Full Featured Calendar 2">
    <meta name="author" content="Paulo Regina">

    <!-- styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="css/fullcalendar.print.css" media="print" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="lib/spectrum/spectrum.css" rel="stylesheet">    
    <link href="lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">
	    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>
  	
    <!---------------------------------------------- CALENDAR MODALs ---------------------------------------------->
    
    <!-- Calendar Modal -->
    <div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          	<h4 id="details-body-title"></h4>
          </div>
          <div class="modal-body">
            
            <div class="loadingDiv"></div>
            
            <!-- QuickSave/Edit FORM -->
          	<form id="modal-form-body">
            	<p>
            		<label>Titulo: </label>
                	<input class="form-control" name="title" value="" type="text">
                </p>
                <p>
                	<label>Descripcion: </label>
                	<textarea class="form-control" name="description"></textarea>
                </p>
                <p>
                    <label>Categoria: </label>
                    <select name="categorie" class="form-control">
                        <?php 
							foreach($calendar->getCategories() as $categorie) 
							{
								echo '<option value="'.$categorie.'">'.$categorie.'</option>';
							}
                        ?>
                    </select>
                </p>
                <p>
                	 <label>Color del evento :</label>
                	 <input type="text" class="form-control input-sm" value="#587ca3" name="color" id="colorp">
                </p>
                <div class="pull-left mr-10">
                	<p id="repeat-type-select">
                	<label>Repetir:</label>
                	<select id="repeat_select" name="repeat_method" class="form-control">
                        <option value="no" selected>No</option>
                        <option value="every_day">Cada dia </option>
                        <option value="every_week">Cada semana </option>
                        <option value="every_month">Cada mes </option>
                	</select>
                    </p>
                </div>
                <div class="pull-left">
                	<p id="repeat-type-selected">
                	<label>Veces:</label>
                	<select id="repeat_times" name="repeat_times" class="form-control">
                    	<option value="1" selected>1</option>
						<?php
                            for($i = 2; $i <= 30; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';		
                            }
                        ?>
                	</select>
                    </p>
                </div>
                <div class="clearfix"></div>
                <p id="event-type-select">
                    <label>Tipo: </label>
                    <select id="event-type" name="all-day" class="form-control">
                        <option value="true">Hacer evento 24H (todo el d??a)</option>
                        <option value="false">Hacer evento como deseo</option>
                    </select>
                </p>
                <div id="event-type-selected">
                	<div class="pull-left mr-10">
                    	<p>
                    	<label>Fecha de inicio:</label>
                    	<input type="text" name="start_date" class="form-control input-sm" placeholder="Y-M-D" id="startDate">
                        </p>
                    </div>
                    <div class="pull-left">
                    	<p>
                   		<label>Hora de inicio:</label>
                    	<input type="text" class="form-control input-sm" name="start_time" placeholder="HH:MM" id="startTime">
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="pull-left mr-10">
                    	<p>
                    	<label>Fecha final:</label>
                    	<input type="text" class="form-control input-sm" name="end_date" placeholder="Y-M-D" id="endDate">
                        </p>
                    </div>
                    <div class="pull-left">
                    	<p>
                    	<label>Hora de finalizaci??n:</label>
                    	<input type="text" class="form-control input-sm" name="end_time" placeholder="HH:MM" id="endTime">
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
				<div class="custom-fields">
				<?php
					$form->generate();
				?>
				</div>
            </form>
            
            <!-- Modal Details -->
            <div id="details-body">
                <div id="details-body-content"></div>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" id="export-event" class="btn btn-warning">Exportar</button>
            <button type="button" id="delete-event" class="btn btn-danger">Eliminar</button>
            <button type="button" id="edit-event" class="btn btn-info">Editar</button>
            <button type="button" id="add-event" class="btn btn-primary">A??adir</button>
            <button type="button" id="save-changes" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal Delete Prompt -->
    <div id="cal_prompt" class="modal fade">
    	<div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
        	<a href="#" class="btn btn-danger" data-option="remove-this">Borrar esto</a>
            <a href="#" class="btn btn-danger" data-option="remove-repetitives">Eliminar todos</a>
        	<a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        </div>
        </div>
        </div>
    </div>
    
    <!-- Modal Edit Prompt -->
    <div id="cal_edit_prompt_save" class="modal fade">
    	<div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body-custom"></div>
        <div class="modal-footer">
        	<a href="#" class="btn btn-info" data-option="save-this">Guarda esto</a>
            <a href="#" class="btn btn-info" data-option="save-repetitives">Salvar a todos</a>
        	<a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        </div>
        </div>
        </div>
    </div>
    
    <!-- Import Modal -->
    <div id="cal_import" class="modal fade">
    	<div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body-import" style="white-space: normal;">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Importar Evento</h4>
            
        	<p class="help-block">Copie y pegue el c??digo del evento de su archivo .ics, ??bralo usando un editor de texto</p>
            <textarea class="form-control" rows="10" id="import_content" style="margin-bottom: 10px;"></textarea>
            <input type="button" class="pull-right btn btn-info" onClick="calendar.calendarImport()" value="Import" />
        </div>
        </div>
        </div>
    </div>
    
    <input type="hidden" name="cal_token" id="cal_token" value="<?php echo $_SESSION['token']; ?>" />
    
    <!---------------------------------------------- THEME ---------------------------------------------->
    
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="navbar-brand" href="index.php"></a>
				<!-- search (required if you want to have search) -->
				<form class="pull-right form-inline" style="margin-top: 8px; margin-left: 20px;" id="search">
					<div class="form-group">
						<input class="form-control" type="text">
						<button class="btn" type="button">Buscar</button>
					</div>
				</form>
			</div>
		</div>
	</div><!-- .navbar -->
  	
	<div  style="margin-top: 80px;">
		
      <a href="export.php" class="btn btn-warning pull-right" style="margin-right: 10px;">Exportar</a> 
      <a href="#cal_import" class="btn btn-info pull-right" data-toggle="modal" style="margin-right: 10px;">Importar</a> 
       
      <div class="clearfix"></div>
      
      <!-- Filter by Category (required if you want to have categories filtering) -->
      <?php if($calendar->getCategories() !== false) { ?>
      <div id="cat-holder">
      <form id="filter-category">
          <select class="form-control input-sm" style="width: auto;">
          	<?php
				$selected = (isset($_SESSION['filter']) && $_SESSION['filter'] == 'all-fields' ? 'selected' : '');
				echo '<option '.$selected.' value="all-fields">All</option>';
				foreach($calendar->getCategories() as $categorie) 
				{
					$selectedLoop = (isset($_SESSION['filter']) && $_SESSION['filter'] == $categorie ? 'selected' : '');
					echo '<option '.$selectedLoop.' value="'.$categorie.'">'.$categorie.'</option>';	
				}
			?>
          </select>
      </form>
      </div>
      <?php } ?>
        
      <div class="box">
        <div class="header"><h4>Calendario</h4></div>
        <div class="content"> 
            <div id="calendar"></div>
        </div> 
    </div>

    </div> <!-- /container -->
  
	<script src="lib/moment.js"></script>
    <script src="lib/jquery.js"></script>
    <script src="lib/jquery-ui.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="js/lang-all.js"></script>
    <script src="js/jquery.calendar.js"></script>
	<script src="lib/spectrum/spectrum.js"></script>
    
    <script src="lib/timepicker/jquery-ui-sliderAccess.js"></script>
    <script src="lib/timepicker/jquery-ui-timepicker-addon.min.js"></script>
    
    <script src="js/custom.js"></script>
    
	<script src="js/g.map.js"></script>
    <script src="http://maps.google.com/maps/api/js" defer></script>
	
    <!-- call calendar plugin -->
    <script type="text/javascript">
		$().FullCalendarExt({
			calendarSelector: '#calendar',
			lang: 'es'
		});
	</script>
    
</body>
</html>