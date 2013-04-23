<?php
App::uses('AppHelper', 'View/Helper');

class DateHelper extends AppHelper {

    public function getDayName($idx) {
        $hari = array(
            7 => 'Minggu',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu'
        );

        return $hari[intval($idx)];
    }

    public function getMonthName($idx) {
        $bulan = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );

        return $bulan[intval($idx)];
    }

    public function format($date) {
        list($y, $m, $d) = split('[-]', $date);
        $d = intval($d);
        $m = $this->getMonthName($m);
        return "{$d} {$m} {$y}";
    }
}
