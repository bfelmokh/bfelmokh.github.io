<html>
<head>
<title> Planner </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            var arr = new Array();
            $("select[multiple]").change(function() {
                $(this).find("option:selected")
				if (this.name.substr(0,1)== "W" || this.name.substr(0,1)== "N"){
					limit=1;
				}
				else{
					limit=2;
				}
                if ($(this).find("option:selected").length > limit) {
                    $(this).find("option").removeAttr("selected");
                    $(this).val(arr);
                }
                else {
                    arr = new Array();
                    $(this).find("option:selected").each(function(index, item) {
                        arr.push($(item).val());
                    });
                }
            });
        });
    </script>
<style>
.table td {
		text-align:center;
		vertical-align:middle;
	}
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color:  #C50414;
   color:white}
</style>
</head>
<body>
<?php
$supervisorlist=array("Akram","Amir","Anis","Benbli","Baha","chroudi","Elmokhtar","Imen","Maroua","Maryam","Mayssa","Wissem","Zitouni");
function getsupvervisor($supervisorlist,$S,$W) {
$dpm=array("Elmokhtar","Wissem","chroudi","Amir");
	?> <select name="<?php echo $S.$W; ?>" id="<?php echo $S.$W; ?>" class="custom-select" multiple >
<?php 

  for ($i=0;$i<13;$i++){
$class="";	  
	if ($S=="E"){
		for ($sup=0;$sup<4;$sup++){
				if (strcmp($dpm[$sup],$supervisorlist[$i] )== 0)
					$class="badge-warning";
				
		}
	}
  echo "<option class='",$class,"' value=",$supervisorlist[$i],">",$supervisorlist[$i],"</option>";
  }
echo "</select>";
}
function showsupvervisor($supervisorlist,$S,$W) {
	?> <div name="<?php echo "R".$S.$W; ?>" id="<?php echo "R".$S.$W; ?>" class="div" >
<?php echo "</div>";
}
?>
<center><h1>Planner</h1></center>
<div class="table-responsive-lg">
	<table class="table">
		<tr>
		<th>Shifts</th>
			<?php
				$week_start = new DateTime();
				for($i=1;$i<8;$i++){
					$week_start->setISODate(date('Y'),date('W'),$i);
					echo "<th>",$week_start->format('D d M Y'),"</th>";
				}
			?>	
		</tr>
		<tr>
			<th>Early <br/><span class="badge badge-pill badge-warning">DPM</span></th>
			<?php
				for($i=0;$i<5;$i++){
					echo "<td>";
					getsupvervisor($supervisorlist,'E',$i);
					echo "</td>";
				}
			?>
			<?php
				for($i=5;$i<7;$i++){
					echo "<td rowspan='0'>";
					getsupvervisor($supervisorlist,'W',$i);
					echo "</td>";
				}
			?>			
		</tr>
		<tr>
			<th>Late</th>
			<?php
				for($i=0;$i<5;$i++){
					echo "<td>";
					getsupvervisor($supervisorlist,'L',$i);
					echo "</td>";
				}
			?>	
		</tr>
		<tr>
			<th>Night</th>
			<?php
				for($i=0;$i<5;$i++){
					echo "<td>";
					getsupvervisor($supervisorlist,'N',$i);
					echo "</td>";
				}
			?>	
		</tr>
		
		
</table>
</div>
<center>  <h1 class="final"> FINAL </h1></center>
<div class="table-responsive-lg">
	<table class="table table-bordered table-striped">
			<tr>
		<th>Shifts</th>
			<?php
				$week_start = new DateTime();
				for($i=1;$i<8;$i++){
					$week_start->setISODate(date('Y'),date('W'),$i);
					echo "<th>",$week_start->format('D d M Y'),"</th>";
				}
			?>	
		</tr>
		<tr>
			<th>Early <br/><span class="badge badge-pill badge-warning">DPM</span></th>
			<?php
				for($i=0;$i<5;$i++){
					echo "<td>";
					showsupvervisor($supervisorlist,'E',$i);
					echo "</td>";
				}
			?>
			<?php
				for($i=5;$i<7;$i++){
					echo "<td rowspan='0'>";
					showsupvervisor($supervisorlist,'W',$i);
					echo "</td>";
				}
			?>			
		</tr>
		<tr>
			<th>Late</th>
			<?php
				for($i=0;$i<5;$i++){
					echo "<td>";
					showsupvervisor($supervisorlist,'L',$i);
					echo "</td>";
				}
			?>	
		</tr>
		<tr>
			<th>Night</th>
			<?php
				for($i=0;$i<5;$i++){
					echo "<td>";
					showsupvervisor($supervisorlist,'N',$i);
					echo "</td>";
				}
			?>	
		</tr>
	</table>
<div>



<script>
function updateFromWeekEnd(selectedSupervisor,day){
			resultID="#RW"+day
			$(resultID).text(selectedSupervisor);
}
function updateFromEarly(selectedSupervisor,day){
			sup1="#L"+day+" option[value='"+selectedSupervisor[0]+"']";
			sup2="#L"+day+" option[value='"+selectedSupervisor[1]+"']";
			$(sup1).remove();
			$(sup2).remove();
			sup1="#N"+day+" option[value='"+selectedSupervisor[0]+"']";
			sup2="#N"+day+" option[value='"+selectedSupervisor[1]+"']";
			$(sup1).remove();
			$(sup2).remove();
			resultID="#RE"+day
			$(resultID).text(selectedSupervisor);
}
function updateFromLate(selectedSupervisor,day){
			sup1="#E"+day+" option[value='"+selectedSupervisor[0]+"']";
			sup2="#E"+day+" option[value='"+selectedSupervisor[1]+"']";
			$(sup1).remove();
			$(sup2).remove();
			sup1="#N"+day+" option[value='"+selectedSupervisor[0]+"']";
			sup2="#N"+day+" option[value='"+selectedSupervisor[1]+"']";
			$(sup1).remove();
			$(sup2).remove();
			resultID="#RL"+day
			$(resultID).text(selectedSupervisor);
}
function updateFromNight(selectedSupervisor,day){
			sup1="#E"+day+" option[value='"+selectedSupervisor[0]+"']";
			sup2="#L"+day+" option[value='"+selectedSupervisor[0]+"']";
			$(sup1).remove();
			$(sup2).remove();
if ( day == 4 ) {			
			sup1="#W5 option[value='"+selectedSupervisor[0]+"']";
			$(sup1).remove();
			sup1="#W6 option[value='"+selectedSupervisor[0]+"']";
			$(sup1).remove();
}
			resultID="#RN"+day
			$(resultID).text(selectedSupervisor);
}
function validEarly(){
	dpm=["Elmokhtar","Wissem","chroudi","Amir"];
	valid=true;
	vvdpm=true;
	for (i=0;i<5;i++){
		vdpm=false;
		sup = "#E"+i;
		limit = $(sup).find("option:selected").length;
		 if (limit != 2){
			valid=false;
		}else{
				// Check DPM
			for (d=0;d<4;d++){
				if(! (($(sup).children("option:selected").toArray().map(item => item.value)[0]!=dpm[d]) && ($(sup).children("option:selected").toArray().map(item => item.value)[1]!=dpm[d]))){
					vdpm=true;
				}
			}
		}
		if (vdpm=false) {
			vvdpm=false;
		}
	}
	for (j=0;j<5;j++){
			sup1="#L"+j;
			sup2="#N"+j;
			if ((valid == true) && (vvdpm == true)){
				$(sup1).attr("disabled",false);
			}else{
				$(sup1).attr("disabled",true);
				$(sup2).attr("disabled",true);
			}
		} 
}
function validLate(){
	valid=true;
	for (i=0;i<5;i++){
		sup = "#L"+i;
		limit = $(sup).find("option:selected").length;
		 if (limit != 2){
			valid=false;
		}
	}
	for (j=0;j<5;j++){
			sup2="#N"+j;
			if (valid == true){
				$(sup2).attr("disabled",false);
			}else{
				$(sup2).attr("disabled",true);
			}
		} 
}
$('body').ready(function(){
		validEarly();
});
</script>
<script >
	$('select').on('mouseleave', function() {
		var shift = this.name.substr(0,1);
		var day = this.name.substr(1,1);
		if ( shift == 'E' ) {
			var selectedSupervisor = $(this).children("option:selected").toArray().map(item => item.value);
			updateFromEarly(selectedSupervisor,day);
			validEarly();
		}
		else if ( shift == 'L' ) {
			var selectedSupervisor = $(this).children("option:selected").toArray().map(item => item.value);
			updateFromLate(selectedSupervisor,day);
			validLate();
		}
		else if ( shift == 'N' ) {
			var selectedSupervisor = $(this).children("option:selected").toArray().map(item => item.value);
			updateFromNight(selectedSupervisor,day)
		}else if ( shift == 'W' ) {
			var selectedSupervisor = $(this).children("option:selected").toArray().map(item => item.value);
			updateFromWeekEnd(selectedSupervisor,day)
		}
	});
	$('select').on('mouseover', function() {
		var shift = this.name.substr(0,1);
		var day = this.name.substr(1,1);
		if ( shift == 'E' ) {
			var selectedSupervisor = $(this).children("option:selected").toArray().map(item => item.value);
			updateEarly(selectedSupervisor,day);
		}
		else if ( shift == 'L' ) {
			var selectedSupervisor = $(this).children("option:selected").toArray().map(item => item.value);
			updateLate(selectedSupervisor,day);
		}
		else if ( shift == 'N' ) {
			var selectedSupervisor = $(this).children("option:selected").toArray().map(item => item.value);
			updateNight(selectedSupervisor,day)
		}else if ( shift == 'W' ) {
			var selectedSupervisor = $(this).children("option:selected").toArray().map(item => item.value);
			//updateWeekEnd(selectedSupervisor,day)
		}
	});
	
	$('.final').on('mouseover', function() {
			tab=[];
			shiftsnames=["E","L","N"];
			colsp=[];
			for (s=0;s<3;s++ ){
			colsplength=1;
			lastcolsp=0;
			indicecolsp=0;
				for (i=0;i<5;i++){
					RWID="#R"+shiftsnames[s]+i;
					tab[i] = $(RWID).text();
					if (i>0){
						if (tab[lastcolsp]==tab[i]){
							colsplength++;
							$(RWID).parent().hide();
							RWIDTMP="#R"+shiftsnames[s]+lastcolsp;
							$(RWIDTMP).parent().attr("colspan",colsplength);
						}else{
							$(RWID).parent().show();
							indicecolsp++;
							lastcolsp=i;
							colsplength=1;
						}
					}else{
							RWIDTMP="#R"+shiftsnames[s]+lastcolsp;
							$(RWIDTMP).parent().attr("colspan",colsplength);
					}
					
				}
			}
		RWID="#RW6";
		RWIDTMP="#RW5";
		if ( $(RWID).text() == $(RWIDTMP).text() ){
			$(RWID).parent().hide();
			$(RWIDTMP).parent().attr("colspan",2);
		} else{
			$(RWID).parent().show();
			$(RWIDTMP).parent().attr("colspan",1);
		}
		
		
	});
</script>
</body>
</html>