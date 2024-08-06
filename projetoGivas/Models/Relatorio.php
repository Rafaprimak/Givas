<?php
namespace Models;
use Knp\Snappy\Pdf;

class Relatorio
{
    public static function adiconarRelatorio(){    
        $snappy = new Pdf('"C:/Program Files/wkhtmltopdf/bin/wkhtmltopdf.exe"');
        $myslq = new \MySql();
        $nome = date('Y-m-d');
        $pdfText = '<h1>Relatorio de vendas</h1>';
        $info = $myslq->Select('pedidos','preco','','');
        $pdfText .= '<h3>Tiveram '.count($info).' pedidos</h3>';
        $soma = 0;
        foreach ($info as $key => $value) {
            $pdfText .= '<p>R$: '.$value['preco'].'</p>';
            $soma += $value['preco'];
        };
        
        $pdfText .= '<h2>R$ Total: '.$soma.'</h2>';

        $snappy->generateFromHtml($pdfText, INCLUDE_DIR.'/assets/pdf/'.$nome.'.pdf',[],true);
        $myslq -> Insert('relatorios',['nome'], [$nome]);
        
    }

    public static function pegarRelatorio() {
        $myslq = new \MySql();
        return $myslq->Select('relatorios','*','','');
    }
}

?>