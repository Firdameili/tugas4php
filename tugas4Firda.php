<?php
class Pegawai {
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;
    const PT = "PT. Frd Meila Hendriana";
    static $no = 1;

    public function __construct($nip, $nama, $jabatan, $agama, $status)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
    }
    public function setGapok(){
        switch ($this->jabatan) {
            case 'Manager':
                $gapok = 15000000;
                break;
            case 'Asisten Manager':
                $gapok = 1000000;
                break;
            case 'Kabag':
                $gapok = 7000000;
                break;
            case 'Staff':
                $gapok = 4000000;
                break;
            
            default:
                break;
        }
        return $gapok;
    }
    public function setTunjab(){
        $tunjab = $this->setGapok() * 20 / 100;
        return $tunjab;
    }
    public function setTunkel(){
        $tunkel = ($this->status == "Menikah") ? $this->setGapok() * 10 / 100 : 0;
        return $tunkel;
    }
    public function setGator(){
        $gator = $this->setGapok() + $this->setTunjab() + $this->setTunkel();
        return $gator;
    }
    public function setZakat(){
        $zakat = ($this->agama == "Islam" && $this->setGator() >= 6000000) ? $this->setGator() * 2.5 / 100 : 0;
        return $zakat;
    }
    public function setGaber(){
        $gaber = $this->setGator()- $this->setZakat();
        return $gaber;
    }public function setCetak(){
        echo '
        <div class="col mb-5">
            <div class="card" style"width:19rem;">
                <div class="card-body">
                    No: '.self::$no++.'<br>
                    Nip:'.$this->nip.' <br>
                    Nama:'.$this->nama.' <br>
                    Agama:'.$this->agama.' <br>
                    Jabatan:'.$this->jabatan.' <br>

                    Gaji Pokok:Rp'.number_format($this->setGapok()).' <br>
                    Tunjangan Jabatan:'.number_format($this->setTunjab()).' <br>
                    Tunjangan Keluarga:'.number_format($this->setTunkel()).' <br>
                    Profesi:'.number_format($this->setZakat()).' <br>
                    Gaji Kotor:'.number_format($this->setGator()).' <br>
                    Gaji Bersih:'.number_format($this->setGaber()).' <br>
                </div>
            </div>
        </div>
        
        ';
    }
}


?>