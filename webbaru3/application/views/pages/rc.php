<div class="container">
  <div class="jumbotron">
  <h3 style="margin-top: -20px">Balai Penelitian Tanaman Jeruk dan Buah Subtropika</h3>
  <h4>BALITBANGTAN -  KEMENTRIAN PERTANIAN</h4><br>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="pill" href="#home">Input Data Benih</a></li>
    <li><a data-toggle="pill" href="#menu1">Database Benih</a></li>
  </ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade in active"><br>
      <h5>Masukkan data benih sebagai berikut :</h5><br>
      <form class="form-horizontal" action="<?php echo base_url('pages/simpan_databibit')?>" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="kodeblok" >Kode Blok :</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="kodeblok" placeholder="Masukkan Kode Blok Bibit" name="kode_blok">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="jumlah">Jumlah :</label>
      <div class="col-sm-4">
        <input type="number" class="form-control" id="jumlah" placeholder="Masukkan Jumlah Bibit" name="jumlah">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="tanggal">Tanggal :</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" id="tanggal" placeholder="yyyy-mm-dd" name="tanggal">
        <span class="help-block"></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="fase">Fase :</label>
      <div class="col-sm-4">
      <div class="radio">
  <label><input type="radio" name="fase" value="Semai Benih" checked>Semai Benih</label>
</div>
<div class="radio">
  <label><input type="radio" name="fase" value="Tunas Muda">Tunas Muda</label>
</div>
<div class="radio">
  <label><input type="radio" name="fase" value="Transplanting">Transplanting</label>
</div>
<div class="radio">
  <label><input type="radio" name="fase" value="Okulasi">Okulasi</label>
</div><div class="radio">
  <label><input type="radio" name="fase" value="Siap Siar">Siap Siar</label>
</div>
<div class="radio">
  <label><input type="radio" name="fase" value="Panen" >Panen</label>
</div>
    </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Varietas">Varietas :</label>
      <div class="col-sm-4">
      <select name = "varietas" class="form-control" id="varietas">
        <option>Pilih Varietas Jeruk</option>
        <option>Grape Fruit</option>
        <option>Keprok Brastepu</option>
        <option>Keprok Batu 55</option>
        <option>Keprok Borneo Prima</option>
        <option>Keprok Gayo</option>
        <option>Keprok SoE</option>
        <option>Keprok Tejakula</option>
        <option>Lemon</option>
        <option>Lime</option>
        <option>Manis</option>
        <option>Pamelo</option>
        <option>Siam</option>
        <option>Sitrun</option>
          <option>Lemon</option>
      </select>
    </div></div>
    <div class="form-group">
  <label class="control-label col-sm-2" for="keterangan">Keterangan :</label>
  <div class="col-sm-4">
  <textarea class="form-control" rows="4" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan Bibit"></textarea>
</div>
</div>
 <button type="submit" class="btn btn-success" style="margin-left: 175px">Simpan</button>
</div>
  </form>
    <div id="menu1" class="tab-pane fade"><br>
      <h5>Data Seluruh Benih Jeruk :</h5><br>
     <table class="table table-bordered" style="margin-left: 20px margin-right 50px; width: 1000px; text-align: center;" align="center">
    <thead style="font-size: 12px;">
      <tr class="active">
        <th style="text-align: center;">No.</th>
        <th style="text-align: center;">Kode Blok</th>
        <th style="text-align: center;">Jumlah</th>
        <th style="text-align: center;">Tanggal</th>
        <th style="text-align: center;">Fase</th>
        <th style="text-align: center;">Varietas</th>
        <th style="text-align: center;">Keterangan</th>
      </tr>
    </thead>
    <tbody style="font-size: 10px">
      <?php
      foreach ($databibit as $d) {
      echo "<tr>
        <td>$d->nomer</td>
        <td>$d->kode_blok</td>
        <td>$d->jumlah</td>
        <td>$d->tanggal</td>
        <td>$d->fase</td>
        <td>$d->varietas</td>
        <td>$d->keterangan</td>
      </tr>";
      }
      ?>
    </tbody>
  </table>
     </div>
    <div id="menu2" class="tab-pane fade">
      <br>
      <h5>Masukkan Data Pegawai : </h5><br>
      <form class="form-horizontal" action="<?php echo base_url('pages/simpan_jadwalpegawai')?>" method="post">
     <div class="form-group">
      <label class="control-label col-sm-2" for="nama">Nama Pegawai :</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Pegawai" name="nama">
      </div>
    </div>
     <br>
      <h5>Masukkan Jadwal Pegawai : </h5><br>
       <div class="form-group">
      <label class="control-label col-sm-2" for="Varietas">Hari :</label>
      <div class="col-sm-4">
      <select class="form-control" id="hari" name="hari">
        <option>Pilih Hari</option>
        <option>Senin</option>
        <option>Selasa</option>
        <option>Rabu</option>
        <option>Kamis</option>
        <option>Jumat</option>
        <option disabled="">Sabtu</option>
        <option disabled="">Minggu</option>
      </select></div>
  <button type="button" class="btn btn-success" style="margin-left: 5px">+</button>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="Varietas">Waktu :</label>
      <div class="col-sm-4">
    <div class="checkbox">
  <label><input type="checkbox" name="jam[]" value="1">07:30 - 08:30</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="jam[]" value="2">08:30 - 09:30</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="jam[]" value="3">09:30 - 10:30</label>
</div>

<div class="checkbox">
  <label><input type="checkbox" name="jam[]" value="4">10:30 - 11:30</label>
</div>

<div class="checkbox">
  <label><input type="checkbox" name="jam[]" value="5">11:30 - 12:30</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="jam[]" value="6">12:30 - 13:30</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="jam[]" value="7">13:30 - 14:30</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="jam[]" value="8">14:30 - 15:30</label>
</div>
</div>
</div>
 <br>
      <h5>Jadwal Pegawai : </h5><br>
       <table class="table table-bordered" style="margin-left: 20px margin-right 50px; width: 1000px; text-align: center;" align="center">
    <thead style="font-size: 12px;">
      <tr class="active">
        <th style="text-align: center;">No.</th>
        <th style="text-align: center;">Senin</th>
        <th style="text-align: center;">Selasa</th>
        <th style="text-align: center;">Rabu</th>
        <th style="text-align: center;">Kamis</th>
        <th style="text-align: center;">Jumat</th>
        <th style="text-align: center;">Sabtu</th>
        <th style="text-align: center;">Minggu</th>
      </tr>
    </thead>
    <tbody style="font-size: 10px">
      <tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
      </tr>
    </tbody>
  </table>
   <button type="submit" class="btn btn-success btn-block" style="width: 1000px; margin-left:10px">Simpan</button>
 </form>
</div>

<div id="menu3" class="tab-pane fade"><br>
  <h5>Masukkan Parameter :</h5><br>
 <form class="form-horizontal" action="<?php echo base_url('pages/Penjadwalan')?>" method="post">
<div class="form-group">
  <label class="control-label col-sm-2" for="jumlahpopulasi">Jumlah Populasi :</label>
  <div class="col-sm-4">
    <input type="number" class="form-control" id="jumlahpopulasi" placeholder="Masukkan Jumlah Populasi" name="jumlahpopulasi">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="cr">Crossover Rate :</label>
  <div class="col-sm-4">
    <input type="text" class="form-control" id="cr" placeholder="Masukkan Crossover Rate" name="cr">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="mr">Mutation Rate :</label>
  <div class="col-sm-4">
    <input type="text" class="form-control" id="mr" placeholder="Masukkan Mutation Rate" name="mr">
  </div>
</div>
<button type="submit" class="btn btn-success" style="margin-left: 430px">Mulai</button>
</div>

    <div id="menu4" class="tab-pane fade"><br>
      <h5>Hasil Penjadwalan Pegawai Wisata Petik Jeruk :</h5><br>
      <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Pilih Hari  <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="#">Senin</a></li>
      <li><a href="#">Selasa</a></li>
      <li><a href="#">Rabu</a></li>
      <li><a href="#">Kamis</a></li>
      <li><a href="#">Jumat</a></li>
      <li  class="disabled"><a href="#">Sabtu</a></li>
      <li  class="disabled"><a href="#">Minggu</a></li>
    </ul>
  </div><br><br>
  <table class="table table-bordered" style="width: 1020px; text-align: center; margin-left: -3px" align="center">
    <thead style="font-size: 12px;">
      <tr class="active">
        <th style="text-align: center;">07:30 - 08:30</th>
        <th style="text-align: center;">08:30 - 09:30</th>
        <th style="text-align: center;">09:30 - 10:30</th>
        <th style="text-align: center;">10:30 - 11:30</th>
        <th style="text-align: center;">11:30 - 12:30</th>
        <th style="text-align: center;">12:30 - 13:30</th>
        <th style="text-align: center;">13:30 - 14:30</th>
        <th style="text-align: center;">14:30 - 15:30</th>
      </tr>
    </thead>
    <tbody style="font-size: 10px">
      <tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
      </tr>
    </tbody>
  </table>
    </div>
  </div>
</div>
