<?php
/**
 *
 */
class Genetika extends CI_Controller {

  private $karyawan = array();
  private $individu = array(array(array()));

  private $jam = array();
  private $hari = array();
  private $induk = array();
  private $idkaryawan = array();
  private $waktu_karyawan = array(array());

    function __construct()
    {        
        parent::__construct();        
        $this->load->model('karyawan_model','karyawanm');
       
    }

  public function AmbilData(){

      $rs_karyawan = $this->karyawanm->getidkaryawan();
      $i      = 0;
      foreach ($rs_karyawan->result() as $data) {
          $this->karyawan[$i] = intval($data->id_karyawan);
          $i++;
        }

      //Fill Array of Jam Variables
        $rs_jam = $this->karyawanm->getjam();
        $i      = 0;
        foreach ($rs_jam->result() as $data) {
            $this->jam[$i] = intval($data->id_jam);
            $i++;
        }

        //Fill Array of Hari Variables
        $rs_hari = $this->karyawanm->gethari();
        $i       = 0;
        foreach ($rs_hari->result() as $data) {
            $this->hari[$i] = intval($data->id_hari);
            $i++;
        }

        $jadwal_karyawan = $this->db->get('jadwal_karyawan');
        $i = 0;
        foreach ($jadwal_karyawan->result() as $data) {
            $this->idkaryawan[$i]         = intval($data->id_karyawan);
            $this->waktu_karyawan[$i][0] = intval($data->id_karyawan);
            $this->waktu_karyawan[$i][1] = $data->id_hari;
            $this->waktu_karyawan[$i][2] = $data->id_jam;
            $i++;
        }
  }

  public function Inisialisasi($populasi){
      $jumlah_karyawan = count($this->karyawan);
      $jumlah_jam = count($this->jam);
      $jumlah_hari = count($this->hari);

      for ($i = 0; $i < $populasi; $i++) {

            for ($j = 0; $j < $jumlah_karyawan; $j++) {

                $this->individu[$i][$j][0] = $j+1;
                $this->individu[$i][$j][1] = mt_rand(1,$jumlah_jam);
                $this->individu[$i][$j][2] = mt_rand(1,$jumlah_hari);
            }
      }

      return $this->individu;
  }

  private function CekFitness($indv, $kromosom){
        $penalty1 = 0;
        $penalty2 = 0;

        $jumlah_karyawan = count($this->karyawan);

        for ($i = 0; $i < $jumlah_karyawan; $i++){
            $jam_a = intval($kromosom[$indv][$i][1]);
            $hari_a = intval($kromosom[$indv][$i][2]);
            $karyawan_a = intval($this->karyawan[$i]);

              for ($j=0; $j <$jumlah_karyawan; $j++) {
                  $jam_b = intval($kromosom[$indv][$j][1]);
                  $hari_b = intval($kromosom[$indv][$j][2]);
                  $karyawan_b = intval($this->karyawan[$j]);


                  if ($i == $j)
                      continue;

                      //Ketika jam, dan hari sama, maka penalty + satu
                    if ($jam_a == $jam_b && $hari_a == $hari_b ){
                        $penalty1 += 1;
                    }
              }

                $jumlah_waktu_tidak_bersedia = count($this->idkaryawan);
                for ($j = 0; $j < $jumlah_waktu_tidak_bersedia; $j++){
                    if ($karyawan_a == $this->idkaryawan[$j]){
                        if ($this->jam[$jam_a] == $this->waktu_karyawan[$j][1] &&
                            $this->hari[$hari_a] == $this->waktu_karyawan[$j][2]){
                            $penalty2 +=1;
                        }
                    }
                }
            }
            $sumpenalty1 = floatval ($penalty1*20);
            $sumpenalty2 = floatval ($penalty2*50);
            $fitness = floatval(1000 / (1 + $sumpenalty1+$sumpenalty2));
            return $fitness;
    }

    public function HitungFitness($jumlah_populasi, $kromosom){

            for ($indv = 0; $indv < $jumlah_populasi; $indv++) {
                $fitness[$indv] = $this->CekFitness($indv, $kromosom);
            }

            return $fitness;
        }

public function StartCrossOver($individu_awal, $jumlah_populasi, $crossOver){
  $individu_crossover = array(array(array()));
  $individu_parent = array(array(array()));
  $individu_baru = array(array(array()));
  $jumlah_karyawan = count($this->karyawan);
  $cr = floatval ($crossOver);
  $offspringCrossover = intval (ceil($jumlah_populasi * $cr));
  $jumlah_parent = $offspringCrossover;

  if ($offspringCrossover % 2 != 0) {
    $jumlah_parent +=1;
  }


  for ($i=0; $i < $jumlah_parent; $i++){
      $indexrandom = mt_rand(0,$jumlah_populasi-1);
      for ($j=0; $j < $jumlah_karyawan; $j++){
              $individu_parent[$i][$j][0] = $individu_awal[$indexrandom][$j][0];
              $individu_parent[$i][$j][1] = $individu_awal[$indexrandom][$j][1];
              $individu_parent[$i][$j][2] = $individu_awal[$indexrandom][$j][2];
      }
  }

  for ($i=0; $i < $jumlah_parent; $i+= 2){
    $cutpoint = mt_rand(0,$jumlah_karyawan-1);
    for ($j=0; $j < $jumlah_karyawan; $j++){
            if ($j >= $cutpoint){
                $individu_baru[$i][$j][0] = $individu_parent[$i+1][$j][0];
                $individu_baru[$i+1][$j][0] = $individu_parent[$i][$j][0];
                $individu_baru[$i][$j][1] = $individu_parent[$i+1][$j][1];
                $individu_baru[$i+1][$j][1] = $individu_parent[$i][$j][1];
                $individu_baru[$i][$j][2] = $individu_parent[$i+1][$j][2];
                $individu_baru[$i+1][$j][2] = $individu_parent[$i][$j][2];
            } else{
              $individu_baru[$i][$j][0] = $individu_parent[$i][$j][0];
              $individu_baru[$i+1][$j][0] = $individu_parent[$i+1][$j][0];
              $individu_baru[$i][$j][1] = $individu_parent[$i][$j][1];
              $individu_baru[$i+1][$j][1] = $individu_parent[$i+1][$j][1];
              $individu_baru[$i][$j][2] = $individu_parent[$i][$j][2];
              $individu_baru[$i+1][$j][2] = $individu_parent[$i+1][$j][2];
            }
    }
  }

  for ($i=0; $i < $offspringCrossover; $i++){
      for ($j=0; $j < $jumlah_karyawan; $j++){
            $individu_crossover[$i][$j][0]=$individu_baru[$i][$j][0];
            $individu_crossover[$i][$j][1]=$individu_baru[$i][$j][1];
            $individu_crossover[$i][$j][2]=$individu_baru[$i][$j][2];
      }
  }
  return $individu_crossover;
}

public function Mutasi($individu_awal, $jumlah_populasi, $mutasi){
  $individu_mutasi = array(array(array()));
  $jumlah_karyawan = count($this->karyawan);
  $mr = floatval ($mutasi);
  $offspringMutasi = intval (ceil($jumlah_populasi * $mr));

  for ($i=0; $i < $offspringMutasi; $i++) {
        $indexrandom = mt_rand(0,$jumlah_populasi-1);
        $xp1 = mt_rand(0, ($jumlah_karyawan-1) / 2);
        $xp2 = (($jumlah_karyawan-1) / 2) +mt_rand(0, ($jumlah_karyawan-1) / 2);
        for ($j=0; $j < $jumlah_karyawan; $j++) {
            if ($j == $xp1) {
                
                    $individu_mutasi [$i][$j][0] =  $individu_awal[$indexrandom][$xp2][0];
                    $individu_mutasi [$i][$j][1] =  $individu_awal[$indexrandom][$xp2][1];
                    $individu_mutasi [$i][$j][2] =  $individu_awal[$indexrandom][$xp2][2];
            } else if ($j == $xp2){
                    $individu_mutasi [$i][$j][$k] =  $individu_awal[$indexrandom][$xp1][0];
                    $individu_mutasi [$i][$j][$k] =  $individu_awal[$indexrandom][$xp1][1];
                    $individu_mutasi [$i][$j][$k] =  $individu_awal[$indexrandom][$xp1][2];
            } else {
                  $individu_mutasi [$i][$j][0] =  $individu_awal[$indexrandom][$j][0];
                  $individu_mutasi [$i][$j][1] =  $individu_awal[$indexrandom][$j][1];
                  $individu_mutasi [$i][$j][2] =  $individu_awal[$indexrandom][$j][2];
            }
        }
  }
  return $individu_mutasi;
}


public function Seleksi($fitness_reproduksi, $hasil_kromosom,$jumlah_populasi){

        $indekshasilseleksi = array(array());
        for ($i = 0; $i<count($hasil_kromosom); $i++) {
            $indekshasilseleksi[$i][0]=$i;
            $indekshasilseleksi[$i][1]=$fitness_reproduksi[$i];
        }
        for ($i = 0; $i<count($indekshasilseleksi); $i++){
            for ($j = 1; $j<count($indekshasilseleksi); $j++){
              if ($indekshasilseleksi[$j-1][1]<$indekshasilseleksi[$j][1]) {
                $temp0 = $indekshasilseleksi[$j-1][0];
                $temp1 = $indekshasilseleksi[$j-1][1];
                $indekshasilseleksi[$j-1][0] = $indekshasilseleksi[$j][0];
                $indekshasilseleksi[$j-1][1] = $indekshasilseleksi[$j][1];
                $indekshasilseleksi[$j][0] = $temp0;
                $indekshasilseleksi[$j][1] = $temp1;
              } 

            }
        }

        $individu_hasil = array(array(array()));
        for ($i=0; $i < $jumlah_populasi; $i++) { 
          $individu_hasil[$i] = $hasil_kromosom[intval($indekshasilseleksi[$i][0])];
        }
        return $individu_hasil;
    }

}
