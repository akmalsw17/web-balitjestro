<div class="container" id="1">
  <div class="jumbotron">
  <h3 style="margin-top: -20px">Balai Penelitian Tanaman Jeruk dan Buah Subtropika</h3>
  <h4>BALITBANGTAN -  KEMENTRIAN PERTANIAN</h4><br>
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active"><a href="wisata">
        <image src="<?php echo base_url('assets/img/slider1.png');?>" width="4163px" height="1515px"><a href="wisata"></a>
      </div>

      <div class="item">
        <a href="kalender">
       <image src="<?php echo base_url('assets/img/slider2.png');?>" width="4163px" height="1515px"></a>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<br>
<div class="container2">
<h1 align="center">Kalender Perbenihan</h1><hr>
<div class="media">
    <div class="media-left">
      <img src="<?php echo base_url('assets/img/wisata_2.jpg');?>" width="200px" height="200px" class="media-object img-circle" class="" style="margin-left: 50px">
    </div>
    <div class="media-body">
     <p align="justify" style="margin-left: 20px; margin-right: 50px; text-indent: 0.5in">Kalender Perbenihan merupakan salah satu layanan terbaru yang diberikan oleh Balitjestro untuk mempermudah penyampaian informasi kepada masyarakat mengenai tahapan budidaya tanaman jeruk yang sedang berlangsung di Balitjestro. Melalui layanan ini, masyarakat dapat mengetahui agenda perbenihan yang dikerjakan oleh Balitjestro mulai dari penyemaian benih hingga masa panen. Sehingga masyarakat dapat memperoleh pengetahuan lebih mengenai budidaya tanaman jeruk.</p>
     <h5 align="left" style="margin-left: 20px">Tahapan Budidaya Tanaman Jeruk :</h5><br>
      <image src="<?php echo base_url('assets/img/wisata_3.jpg');?>" width="516px" height="99px" class="" align="center" style="margin-left: 150px; margin-right: 50px; text-indent: 0.5in; text-align: center;"></p>
    </div><br>
 <div class="form-group" style="margin-left: 250px">
      <label class="control-label col-sm-2" for="exampleInputEmail1">Pilih Tanggal :</label>
      <div class="col-sm-6">
<input data-format="yyyy-MM-dd" type="text" id="tanggal_fase" class="form-control datepick">
  </div>
  <button class="btn btn-success" onclick="getDataFase()">Search</button>
  </div>
        <br><br><br><br>
        <div id="google_chart">
        </div>
</div><hr>
  </div>
  <script>

    $(document).ready(function(){
        google.charts.load("current", {packages:["timeline"]});
    })

    function getDataFase(){
      var tanggal_fase = $('#tanggal_fase').val();
      var fase = ['Semai Benih', 'Tunas Baru', 'Transplanting', 'Okulasi', 'Siap Siar', 'Panen'];
      $.ajax({
        url: 'pages/get_data_fase/'+tanggal_fase,
        dataType: 'json',
        success: function(result){

          google.charts.setOnLoadCallback(drawChart(result));
        },
        error: function(){

        },
        timeout: 15000
      })
    }

    function drawChart(result){
        var google_c = $('#google_chart');
        var fase = result.length;
        for (var i = 0; i < fase; i++) {
        google_c.append(' <label> Varietas : '+"\t"+result[i]['varietas']+'</label><br>')
        google_c.append(' <label> Kode Blok : '+result[i]['kode_blok']+'</label>')
        google_c.append('<div id="gc'+i+'"></div>');

        var container = document.getElementById('gc'+i);
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();


        dataTable.addColumn({ type: 'string', id: 'Fase' });
        dataTable.addColumn({ type: 'string', id: 'Name' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });

        dataTable.addRows([
          [ 'Semai Benih', result[i]['fase1']+' - '+result[i]['fase2'], new Date(getYear(result[i]['fase1']),getMonth(result[i]['fase1']),getDay(result[i]['fase1'])),new Date(getYear(result[i]['fase2']), getMonth(result[i]['fase2']),getDay(result[i]['fase2']))
          ],[ 'Tunas Baru', result[i]['fase2']+' - '+result[i]['fase3'], new Date(getYear(result[i]['fase2']),getMonth(result[i]['fase2']),getDay(result[i]['fase2'])),new Date(getYear(result[i]['fase3']), getMonth(result[i]['fase3']),getDay(result[i]['fase3']))
          ],[ 'Transplanting', result[i]['fase3']+' - '+result[i]['fase4'], new Date(getYear(result[i]['fase3']),getMonth(result[i]['fase3']),getDay(result[i]['fase3'])),new Date(getYear(result[i]['fase4']), getMonth(result[i]['fase4']),getDay(result[i]['fase4']))
          ],[ 'Okulasi', result[i]['fase4']+' - '+result[i]['fase5'], new Date(getYear(result[i]['fase4']),getMonth(result[i]['fase4']),getDay(result[i]['fase4'])),new Date(getYear(result[i]['fase5']), getMonth(result[i]['fase5']),getDay(result[i]['fase5']))
          ],[ 'Siap Siar', result[i]['fase5']+' - '+result[i]['fase6'], new Date(getYear(result[i]['fase5']),getMonth(result[i]['fase5']),getDay(result[i]['fase5'])),new Date(getYear(result[i]['fase6']), getMonth(result[i]['fase6']),getDay(result[i]['fase6']))
          ],[ 'Panen', result[i]['fase6'], new Date(getYear(result[i]['fase6']),getMonth(result[i]['fase6']),getDay(result[i]['fase6'])),new Date(getYear(result[i]['fase6']), getMonth(result[i]['fase6']),getDay(result[i]['fase6']))
          ]]);

        var options = { 'title' : result[i]['varietas'],
                       'height':300
                     };

        chart.draw(dataTable, options);
}
    }

    function getYear(fase){
      var data = fase.split('-');
      return parseInt(data[0]);
    }
    function getMonth(fase){
      var data = fase.split('-');
      return parseInt(data[1])-1;
    }
    function getDay(fase){
      var data = fase.split('-');
      return parseInt(data[2]);
    }
  </script>
