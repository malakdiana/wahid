<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Mypdf
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function generate($view, $data = array(), $filemame = 'Laporan Rekapitulasi', $paper = 'A4', $orientation='portait'){
        $dompdf = new Dompdf();

        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();
        ob_clean();
        $f;
        $l;
        if(headers_sent($f,$l))
        {
            echo $f,'<br/>',$l,'<br/>';
            die('now detect line');
        }
        $dompdf->stream($filemame . ".pdf", array("Attachment" => FALSE));

    }

}
