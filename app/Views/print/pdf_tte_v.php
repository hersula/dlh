<?php 

 $img_encode = $qc;
 $imageContent = file_get_contents($img_encode);
 $path = tempnam(sys_get_temp_dir(), 'prefix');
 file_put_contents ($path, $imageContent);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Dinas Lingkungan Hidup Kabupaten Bekasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background: white;
        }

        page[size="A4"] {
            background: white;
            width: 21cm;
            height: 29.7cm;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }
        .logo {
            text-align: center;
        }
        .logo-img{
            width: 150px;
            height: 100px;
        }
        .text-logo {
            text-transform: uppercase;
            font-weight: bold;
            line-height:6px;
            font-size: 12px;
        }

        .border {
            border:1px solid black;
            padding:10px;
        }
        .border tr  {
            border: 1px solid black;
            
        }
        .body-tr {
            line-height: 5px;
        }
    </style>
</head>

<body>
<page size="A4">
    <table class="border" cellspacing="0">
        <tr>
            <td class="logo">
                <img class="logo-img" src="<?= base_url('')?>/assets/img/logo.png" alt="">
                <p class="text-logo">Tanda Terima Elektronik</p>
                <p class="text-logo">Sistem Informasi Pelaporan Elektronik</p>
                <p class="text-logo">Dinas Lingkungan Hidup Kabupaten Bekasi</p>
            </td>
        </tr>
        
        <tr class="body-tr">
            <td colspan="3"></td>
        </tr>
        <tr style="margin-top:30px; " class="body-tr">
            <td style="width: 150px; border-top:1px solid black;">ID TTE</td>
            <td style="width: 25px; border-top:1px solid black; ">:</td>
            <td style="border-top:1px solid black">2202102321</td>
        </tr>
        <tr style="margin-top:30px;" class="body-tr">
            <td >Periode TTE</td>
            <td >:</td>
            <td>2021-06-01 s/d 2021-09-01</td>
        </tr>
        
        <tr style="margin-top:30px;" class="body-tr">
            <td >Waktu Cetak TTE</td>
            <td >:</td>
            <td>2021-06-01 </td>
        </tr>
        <!-- detail perusahaan -->
        <tr class="body-tr">
            <td colspan="3"></td>
        </tr>
        <tr style="margin-top:30px; " class="body-tr">
            <td style="width: 150px; border-top:1px solid black;">Nama Perusahaan</td>
            <td style="width: 25px; border-top:1px solid black; ">:</td>
            <td style="border-top:1px solid black">PT.INDUSTRI A (WWTP-01)</td>
        </tr>
        <tr style="margin-top:30px;" class="body-tr">
            <td >ID Perusahaan</td>
            <td >:</td>
            <td>1518</td>
        </tr>
        
        <tr style="margin-top:30px;">
            <td >Alamat</td>
            <td >:</td>
            <td  >Jl. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam cumque esse </td>
        </tr>
    </table>
    <table class="border" cellspacing="0">
        <!-- STATUS LAPORAN -->
        <tr style="margin-top:30px;border:1px solid black; text-align:center" class="body-tr">
            <td style="border:1px solid black;">Laporan Harian</td>
            <td style="border:1px solid black;">Laporan Analisa</td>
        </tr>
        <tr style="margin-top:30px;border:1px solid black; text-align:center" class="body-tr">
            <td style="border:1px solid black;">Sudah Lapor</td>
            <td style="border:1px solid black;">Sudah Lapor</td>
        </tr>
    </table>
    <table class="border" cellspacing="0">
        <!-- STATUS LAPORAN -->
        <tr style="margin-top:30px;border:1px solid black; text-align:center" class="">
            <td style="border:1px solid black;">
            <img class="logo-img" src="<?= $path?>" height="180px">
            </td>
            <td style="border:1px solid black;">
                <p> Dokumen ini diterbitkan secara eletronik melalu platform pelaporan Dinas Lingkungan Hidup Kabupaten Bekasi sehingga tidak memerlukan cap dan tanda tangan basah. </p>
                <p> Terimakasih telah menyampaikan laporan pengelolan dan pemantauan air limbah lingkungan. </p>
                <p class="text-logo" style="font-size:10px">TIM DLH KABUPATEN BEKASI</p>
        
            </td>
        </tr>
        
    </table>
</page>
</body>

</html>