<?php
include 'header.php';
include("koneksi.php");
?>

<div class="container"> 
	<div class="well well-small"> 
  <script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
  <style type='text/css'>
    
  </style>
  


<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$("div.btn-input").live('click', function(){
    var btn = $(this),
        container = btn.parent(),
        name = btn.data('toggle-name'),
        hidden = container.find('input[name="' + name + '"]'),
        value = btn.attr('value');
 
    hidden.val(value);
    container.find(".btn-input").removeClass('active btn-primary');
    btn.addClass('active btn-primary');
});
});//]]>  

</script>


</head>



		<?php 
		if(!isset($_GET['idpertanyaan'])){
		//tampilkan pertanyaan pertama
			$sqlp = "select * from anjing where mulai='Y'";
			$rs=mysql_query($sqlp);

			$data=mysql_fetch_array($rs);error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		//bentuk pertanyaan	echo "<form>";
			
		echo "<form>";
			echo "<legend>Diagnosa Penyakit Anjing Peliharaan </legend>";
			echo "<center>";
			echo "<h1>".$data['solusi_dan_pertanyaan']."</h1></center><br>";
			

			echo '
				<div class="span5"> <div class="alert alert-info">
				<div class="control-group "> 
				<label class="control-label" style="width:120px;">Jawaban</label>
				<div class="controls" style="margin-left:150px;">
				';

				echo "<input type='radio' name='idpertanyaan' value='".$data['bila_benar']."'> 
				<h3>Ya</h3> <br>";
				echo '
				</div>
				</div>
				</div>
				</div>
				<div class="span5"> <div class="alert alert-error">
				<div class="control-group "> 
				<label class="control-label" style="width:120px;">Jawaban</label>
				<div class="controls" style="margin-left:150px;">
				';
				echo "<input type='radio' name='idpertanyaan' value='".$data['bila_salah']."'> <h3>Tidak</h3> <br>";
				echo '
				</div>
				</div>
				</div>
				</div>';
			
				echo "<input type='submit' class='btn btn-success btn-block btn-large' value='Lanjut ' >";		
			}else{
		// }else{ 
		//tampilkan pertanyaan pertama

			$idsolusi=$_GET['idpertanyaan'];
			$sqlp = "select * from anjing where id_anjing=$idsolusi";
			
			$rs=mysql_query($sqlp);

			$data=mysql_fetch_array($rs);
			
		echo "<form>";
			echo "<legend>Diagnosa Penyakit Anjing Peliharaan </legend>";
			echo "<center>";
			echo "<h1>".$data['solusi_dan_pertanyaan']."</h1></center><br>";
			
			// echo "<a href='' class='btn btn-success btn-large btn-block' /> Kembali Melakukan Diagnosa </a>";

			if($data['selesai']!="Y"){
				echo '
				<div class="span5"> <div class="alert alert-info">
				<div class="control-group "> 
				<label class="control-label" style="width:120px;">Jawaban</label>
				<div class="controls" style="margin-left:150px;">
				';

				echo "<input type='radio' name='idpertanyaan' value='".$data['bila_benar']."'>
				<h3>Ya</h3><br>";
				echo '
				</div>
				</div>
				</div>
				</div>
				<div class="span5"> <div class="alert alert-error">
				<div class="control-group "> 
				<label class="control-label" style="width:120px;">Jawaban</label>
				<div class="controls" style="margin-left:150px;">
				';
				echo "<input type='radio' name='idpertanyaan' value='".$data['bila_salah']."'><h3>Tidak</h3><br>";
				echo '
				</div>
				</div>
				</div>
				</div>';
			
				echo "<input type='submit' class='btn btn-success btn-block btn-large' value= 'Lanjut ' >";		
			}else{
			//jika ingin menambah pertanyaan
			}
			echo "</form>";		
			}
		?>
	</div>

