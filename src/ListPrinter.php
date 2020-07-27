<?php


namespace App;


class ListPrinter
{
    private $header;
    private $footer;
    private $content="";

    public function __construct()
    {
        $this->header='<!DOCTYPE html>
                        <html lang="pl">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Lista zadań</title>
                            <style>
                                * {margin:0; padding:0; font-family:Arial; font-size:10pt; color:#000;}

                                body {width:100%; font-family:Arial; font-size:10pt; margin:0; padding:0;}

                                .page {height:297mm; width:210mm; page-break-after:always;}

                                table {border-left: 1px solid #ccc; border-top: 1px solid #ccc; border-spacing:0; border-collapse: collapse;}

                                table th {border-right: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 2mm;}

                                table.heading {height:50mm;}

                                h1.heading {font-size:14pt; color:#000; font-weight:normal; text-align:center;}

                                #table-print {height: 1em; width:100%;}

                                #table-print table {width:100%; border-left: 1px solid #ccc; border-top: 1px solid #ccc; border-spacing:0; border-collapse: collapse; margin-top:5mm;}

                                #table-print table td {text-align:center; font-size:10pt; border-right: 1px solid #ccc; border-bottom: 1px solid #ccc; padding:2mm 0;}

                                table td .mono {font-family:monospace; text-align:right; padding-right:3mm; font-size:10pt;}

                                table th {width:20%; text-align:center; font-size:10pt; border-right: 1px solid #ccc; border-bottom: 1px solid #ccc;}
                            </style>
                        </head>
                        <body>
                        
                        <p><h1 style="text-align:center; font-weight:bold; padding-top:5mm; color:#111;">LISTA ZADAŃ</h1></p>
                        <br />

                        <div id="table-print" style="width:80%; margin:auto; text-align:center">
                            <table>
                                <tr style="background:#eee;">
                                    <th style="width:5%;"><b>#</b></th>
                                    <th><b>Zadanie</b></th>
                                    <th style="width:20%;"><b>Data wykonania</b></th>
                                </tr>

                                <tbody>';
        $this->footer='
        <div style="position:absolute; bottom:30px;">
            <img src="../layouts/img/logo-print.png" style="height:30px; margin-left:20%; opacity:0.8;" />
        </div>
                        </body>
                        </html>';
    }

    public function printTheList($list)
    {
        $i=1;
        foreach ($list as $item)
        {
            $this->content.=
            '<tr>
                <td style="width:5%;">'.$i.'</td>
                <td style="text-align:left; padding-left:10px;">'.$item['task'].'</td>
                <td class="mono" style="width:20%;">'.$item['date'].'</td>
            </tr>';
            $i++;
        }
        $this->content.=
        '</tbody>
         </table>
         </div>';
        return $htmlList=$this->header.$this->content.$this->footer;
    }
}