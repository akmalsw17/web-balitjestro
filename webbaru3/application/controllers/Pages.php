<?php
	class Pages extends CI_Controller{

		public function __construct()
	{
		parent::__construct();
		$this->load->model('bibit_model','bibit');
		$this->load->model('karyawan_model','karyawan');
		include_once("Genetika.php");

	}

		public function view($page = 'home'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}

			$data['title'] = ucfirst($page);
			$data['databibit'] = $this->bibit->tampilBibit()->result();

			$this->load->view('template/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('template/footer');
		}

		function simpan_databibit(){
			$databibit = array(
				'kode_blok' => $this->input->post('kode_blok'),
				'jumlah' => $this->input->post('jumlah'),
				'tanggal' => $this->input->post('tanggal'),
				'fase' => $this->input->post('fase'),
				'varietas' => $this->input->post('varietas'),
				'keterangan' => $this->input->post('keterangan'),);

			$fase =$this->input->post('fase');
			$tglinput =  $this->input->post('tanggal');
			if ($fase == "Semai Benih") {
				$tglfase2 = date('Y-m-d', strtotime('+14 days', strtotime($tglinput)));
				$tglfase3 = date('Y-m-d', strtotime('+2 month', strtotime($tglfase2)));
				$tglfase4 = date('Y-m-d', strtotime('+5 month', strtotime($tglfase3)));
				$tglfase5 = date('Y-m-d', strtotime('+21 days', strtotime($tglfase4)));
				$tglfase6 = date('Y-m-d', strtotime('+30 month', strtotime($tglfase5)));

				$datafase = array(
					'kode_blok' => $this->input->post('kode_blok'),
					'fase1' => $tglinput,
					'fase2' => $tglfase2,
					'fase3' => $tglfase3,
					'fase4' => $tglfase4,
					'fase5' => $tglfase5,
					'fase6' => $tglfase6,
				);
					$insertfase = $this->bibit->tambahDataFase($datafase);
			}else if ($fase == "Tunas Muda") {
				$tglfase3 = date('Y-m-d', strtotime('+2 month', strtotime($tglinput)));
				$tglfase4 = date('Y-m-d', strtotime('+5 month', strtotime($tglfase3)));
				$tglfase5 = date('Y-m-d', strtotime('+21 days', strtotime($tglfase4)));
				$tglfase6 = date('Y-m-d', strtotime('+30 month', strtotime($tglfase5)));

				$datafase = array(
					'kode_blok' => $this->input->post('kode_blok'),
					'fase2' => $tglinput,
					'fase3' => $tglfase3,
					'fase4' => $tglfase4,
					'fase5' => $tglfase5,
					'fase6' => $tglfase6,
				);
					$insertfase = $this->bibit->tambahDataFase($datafase);
			}else if ($fase == "Transplanting") {
				$tglfase4 = date('Y-m-d', strtotime('+5 month', strtotime($tglinput)));
				$tglfase5 = date('Y-m-d', strtotime('+21 days', strtotime($tglfase4)));
				$tglfase6 = date('Y-m-d', strtotime('+30 month', strtotime($tglfase5)));

				$datafase = array(
					'kode_blok' => $this->input->post('kode_blok'),
					'fase3' => $tglinput,
					'fase4' => $tglfase4,
					'fase5' => $tglfase5,
					'fase6' => $tglfase6,
				);
					$insertfase = $this->bibit->tambahDataFase($datafase);
			}else if ($fase == "Okulasi") {
				$tglfase5 = date('Y-m-d', strtotime('+21 days', strtotime($tglinput)));
				$tglfase6 = date('Y-m-d', strtotime('+30 month', strtotime($tglfase5)));

				$datafase = array(
					'kode_blok' => $this->input->post('kode_blok'),
					'fase4' => $tglinput,
					'fase5' => $tglfase5,
					'fase6' => $tglfase6,
				);
					$insertfase = $this->bibit->tambahDataFase($datafase);
			}else if ($fase == "Siap Siar") {
				$tglfase6 = date('Y-m-d', strtotime('+30 month', strtotime($tglinput)));

				$datafase = array(
					'kode_blok' => $this->input->post('kode_blok'),
					'fase5' => $tglinput,
					'fase6' => $tglfase6,
				);
					$insertfase = $this->bibit->tambahDataFase($datafase);
			}else{
				$datafase = array(
					'kode_blok' => $this->input->post('kode_blok'),
					'fase6' => $tglinput,
				);
					$insertfase = $this->bibit->tambahDataFase($datafase);
			}

			$insert = $this->bibit->tambahDataBibit($databibit);
			redirect('rc');
		}

		function get_data_fase($tanggal){
			$result = $this->bibit->tampilFase($tanggal);
			echo json_encode($result);
		}

		function simpan_jadwalpegawai()
		{
			$nama_hari = $this->input->post('hari');
			$hari = $this->karyawan->gethari_by_nama($nama_hari);
			$jam = $this->input->post('jam');
			$nama =  $this->input->post('nama');
			$karyawan = $this->karyawan->getkaryawan_by_nama($nama);
					foreach ($jam as $id_jam) {
						$datapegawai = array(
						'id_karyawan' => $karyawan,
						'id_hari' => $hari,
						'id_jam' => $id_jam,);

						$insert = $this->karyawan->tambahDataKaryawan($datapegawai);
			}
		redirect('rc');
		}

		function Penjadwalan()
		{
			$populasi = 4;
			$crossOver = 0.7;
			$mutasi = 0.5;
			$jumlah_generasi = 2;
/*
			$populasi = ceil($this->input->post('jumlahpopulasi'));
			$crossOver = $this->input->post('cr');
			$mutasi = $this->input->post('mr');
			$jumlah_generasi = 1;
*/
			$individu_awal = array(array(array()));
			$hasil_crossover = array(array(array()));
			$hasil_mutasi = array(array(array()));
			$hasil_kromosom = array(array(array()));

			$genetika = new Genetika();
			$genetika->AmbilData();
			$individu_awal = $genetika->Inisialisasi($populasi);
			$this->karyawan->hapusDataindividu();
			

			for($i = 0;$i < $jumlah_generasi;$i++ ){
					$fitness = $genetika->HitungFitness($populasi, $individu_awal);

					$hasil_crossover = $genetika->StartCrossOver($individu_awal, $populasi, $crossOver);
	
					$hasil_mutasi = $genetika->Mutasi($individu_awal, $populasi, $mutasi);

					$panjang_kromosom = $populasi+count($hasil_crossover)+count($hasil_mutasi);
					
					for ($i=0; $i < $populasi; $i++) {
							$hasil_kromosom [$i] = $individu_awal[$i];
					}
					$index = 0;
					for ($i=$populasi; $i <($populasi+count($hasil_crossover)) ; $i++) {
							$hasil_kromosom[$i] =$hasil_crossover[$index];
							$index++;
					}
					$index1 = 0;
					for ($i=($populasi+count($hasil_crossover)); $i <$panjang_kromosom ; $i++) {
							$hasil_kromosom[$i] =$hasil_mutasi[$index1];
							$index1++;
					}

					$fitness_reproduksi = $genetika->HitungFitness($panjang_kromosom, $hasil_kromosom);

					$kromosom_akhir = $genetika->Seleksi($fitness_reproduksi, $hasil_kromosom,$populasi);
					$fitness_hasil = $genetika->HitungFitness(count($kromosom_akhir), $kromosom_akhir);
					
			}

			
			for ($i = 0; $i < count($kromosom_akhir); $i++) {

            for ($j = 0; $j < count($kromosom_akhir[0]); $j++) {
            	$dataindividu = array(
						'idgen' => $i+1,
						'idpegawai' => $kromosom_akhir[$i][$j][0],
						'id_jam' => $kromosom_akhir[$i][$j][1],
						'id_hari' => $kromosom_akhir[$i][$j][2],
						);
						$insert = $this->karyawan->tambahDataindividu($dataindividu);
            }
      }
      
				foreach ($fitness_hasil as $f) {
						$datafitness = array(
						'nilai' => $f,);
						$insert = $this->karyawan->tambahDatafitness($datafitness);
			}
			redirect('coba');
		}

	}
