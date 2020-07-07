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
                            <title>Document</title>
                        </head>
                        <body>
                            <div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Zadanie</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
        $this->footer='</body>
                        </html>';
    }

    public function printTheList($list)
    {
        foreach ($list as $item)
        {
            $this->content.=
            '<tr>
                <th scope="row">'.$item['id'].'</th>
                <td>'.$item['task'].'</td>
                <td>'.$item['date'].'</td>
            </tr>';
        }
        $this->content.=
        '</tbody>
         </table>
         </div>';
        return $htmlList=$this->header.$this->content.$this->footer;
    }
}