<head>
    <title>Report Daftar Laporan Cuti Ijin</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        table.items {
            border: 0.1mm solid #000000;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
            border-top: 0.1mm solid #000000;
            border-bottom: 0.1mm solid #000000;
        }

        .items th {
            border-left: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
            border-top: 0.1mm solid #000000;
            border-bottom: 0.1mm solid #000000;
        }

        table thead td {
            background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }
    </style>
</head>

<body>


    <htmlpageheader name="myheader">
        <table width="100%" style="font-size: 9pt; padding-top: 1mm; border-bottom: 1px solid #000000;">
            <tr>
                <td rowspan="2" width="6%" align="center">
                    <img src="<?= base_url() . 'assets/img/logotelkom.png' ?>" height="50" width="100">
                </td>
                <td style="vertical-align: bottom;">
                    <b>TELKOM WITEL BANDUNG</b>
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    Jl. Lembong No.11, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40111
                </td>
            </tr>
        </table>
    </htmlpageheader>

    <htmlpagefooter name="myfooter">
        <div style="border-top: 1px solid #000000; font-size: 12pt; text-align: center; padding-top: 3mm; ">
            Daftar Laporan Cuti Ijin
        </div>
        <br />
    </htmlpagefooter>

    <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
    <sethtmlpagefooter name="myfooter" value="on" />
    <div class="row">
        <table border="1px" table-layout:fixed style="width:100%;" cellspacing="0">
            <tr style="text-align: left;">
                <th>No.</th>
                <th>Nama</th>
                <th>Divisi</th>
                <th>Tipe Cuti/Ijin</th>
                <th>Keterangan</th>
                <th>Awal Cuti/Ijin</th>
                <th>Akhir Cuti/Ijin</th>
                <th>Lama Cuti/Ijin</th>
                <th>Status Cuti/Ijin</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($bulany as $c) : ?>
                <tr>
                    <td><?= $i++; ?>.</td>
                    <td>
                        <?php foreach ($magang as $m) : ?>
                            <?php if ($c['id_nama'] == $m['id']) { ?>
                                <?= $m['username']; ?>
                            <?php } ?>
                        <?php endforeach; ?></td>
                    <td>
                        <?php foreach ($divisi as $d) : ?>
                            <?php if ($c['id_divisi'] == $d['id']) { ?>
                                <?= $d['nama']; ?>
                            <?php } ?>
                        <?php endforeach; ?></td>
                    <td><?php echo $c['tipe'] ?></td>
                    <td><?php echo $c['keterangan'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($c['awl_tgl'])) ?></td>
                    <td><?php echo date('d-m-Y', strtotime($c['akhir_tgl'])) ?></td>
                    <td><?php echo $c['lama_waktu'] ?> hari</td>
                    <td><?php echo $c['status'] ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
        <div width="200px" style="margin-top: 7.5rem; float:right;">
            <p>Bandung, <?php echo date("d M Y") ?></p>
            <br>
            <br>
            <p>______________________</p>
            <p>Pahkruddin Sihaloho</p>
            <br>
            <p style="margin-top: -10px;"><b>Direktur</b></p>
        </div>
    </div>
</body>

</html>