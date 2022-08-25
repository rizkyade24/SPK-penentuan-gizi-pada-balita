<?php
error_reporting(0);

$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "balita";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    // cek koneksi
    die("Tidak bisa terkoneksi ke database");
};

if (isset($_GET['NIK'])) {
    $NIK    = $_GET['NIK'];
} else {
    die("Error. No ID Selected!");
}

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>user profile details - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <div style="margin-left: 500px; margin-top: 200px;">
    <div>
        <h1>PILIH TANGGAL PENGUKURAN</h1>
    </div>
    <div class="input-group mb-3 dropdown" style="margin-left: 160px">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                pilih tanggal pengukuran
                                </button>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php
                        $sql1 = "select * from hasil_gizi where NIK='$NIK'";
                        $result1 = mysqli_query($koneksi, $sql1);
                        if ($result1) {
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $NIK = $row['NIK'];
                                $tgl_pengukuran = $row['tgl_pengukuran'];
                                echo '
                                    <a class="dropdown-item" href="detail1.php?NIK=' . $NIK . '&tgl_pengukuran=' . $tgl_pengukuran . '">' . $tgl_pengukuran . '</a>
                                ';
                            }
                        }
                        ?>
                        
                        </div>
                </div>
    </div>
    <style type="text/css">
        body {
            font-size: 16px;
            color: #6f6f6f;
            font-weight: 400;
            line-height: 28px;
            letter-spacing: 0.8px;
            margin-top: 20px;
        }

        .font-size38 {
            font-size: 38px;
        }

        .team-single-text .section-heading h4,
        .section-heading h5 {
            font-size: 36px
        }

        .team-single-text .section-heading.half {
            margin-bottom: 20px
        }

        @media screen and (max-width: 1199px) {

            .team-single-text .section-heading h4,
            .section-heading h5 {
                font-size: 32px
            }

            .team-single-text .section-heading.half {
                margin-bottom: 15px
            }
        }

        @media screen and (max-width: 991px) {

            .team-single-text .section-heading h4,
            .section-heading h5 {
                font-size: 28px
            }

            .team-single-text .section-heading.half {
                margin-bottom: 10px
            }
        }

        @media screen and (max-width: 767px) {

            .team-single-text .section-heading h4,
            .section-heading h5 {
                font-size: 24px
            }
        }


        .team-single-icons ul li {
            display: inline-block;
            border: 1px solid #02c2c7;
            border-radius: 50%;
            color: #86bc42;
            margin-right: 8px;
            margin-bottom: 5px;
            -webkit-transition-duration: .3s;
            transition-duration: .3s
        }

        .team-single-icons ul li a {
            color: #02c2c7;
            display: block;
            font-size: 14px;
            height: 25px;
            line-height: 26px;
            text-align: center;
            width: 25px
        }

        .team-single-icons ul li:hover {
            background: #02c2c7;
            border-color: #02c2c7
        }

        .team-single-icons ul li:hover a {
            color: #fff
        }

        .team-social-icon li {
            display: inline-block;
            margin-right: 5px
        }

        .team-social-icon li:last-child {
            margin-right: 0
        }

        .team-social-icon i {
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            font-size: 15px;
            border-radius: 50px
        }

        .padding-30px-all {
            padding: 30px;
        }

        .bg-light-gray {
            background-color: #f7f7f7;
        }

        .text-center {
            text-align: center !important;
        }

        img {
            max-width: 100%;
            height: auto;
        }


        .list-style9 {
            list-style: none;
            padding: 0
        }

        .list-style9 li {
            position: relative;
            padding: 0 0 15px 0;
            margin: 0 0 15px 0;
            border-bottom: 1px dashed rgba(0, 0, 0, 0.1)
        }

        .list-style9 li:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0
        }


        .text-sky {
            color: #02c2c7
        }

        .text-orange {
            color: #e95601
        }

        .text-green {
            color: #5bbd2a
        }

        .text-yellow {
            color: #f0d001
        }

        .text-pink {
            color: #ff48a4
        }

        .text-purple {
            color: #9d60ff
        }

        .text-lightred {
            color: #ff5722
        }

        a.text-sky:hover {
            opacity: 0.8;
            color: #02c2c7
        }

        a.text-orange:hover {
            opacity: 0.8;
            color: #e95601
        }

        a.text-green:hover {
            opacity: 0.8;
            color: #5bbd2a
        }

        a.text-yellow:hover {
            opacity: 0.8;
            color: #f0d001
        }

        a.text-pink:hover {
            opacity: 0.8;
            color: #ff48a4
        }

        a.text-purple:hover {
            opacity: 0.8;
            color: #9d60ff
        }

        a.text-lightred:hover {
            opacity: 0.8;
            color: #ff5722
        }

        .custom-progress {
            height: 10px;
            border-radius: 50px;
            box-shadow: none;
            margin-bottom: 25px;
        }

        .progress {
            display: -ms-flexbox;
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            background-color: #e9ecef;
            border-radius: .25rem;
        }


        .bg-sky {
            background-color: #02c2c7
        }

        .bg-orange {
            background-color: #e95601
        }

        .bg-green {
            background-color: #5bbd2a
        }

        .bg-yellow {
            background-color: #f0d001
        }

        .bg-pink {
            background-color: #ff48a4
        }

        .bg-purple {
            background-color: #9d60ff
        }

        .bg-lightred {
            background-color: #ff5722
        }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>