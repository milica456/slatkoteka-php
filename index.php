<?php
include 'konekcija.php';
include 'model/proizvod.php';
include 'model/kategorija.php';

session_start();

$user="";

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
if (isset($_COOKIE["admin"]))
    {
        $user=$_COOKIE["admin"];
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slatkoteka</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="stranica"   >

    <nav class="navbar navbar-expand-lg navbar-light" id="navCont" style="height:100px; ">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav p-lg-0 " style="margin-left: 2%; margin-top:10px;   ">
                    <li><img src="https://merkat.rs/wp-content/uploads/2022/08/Slatkoteka-logo-500-slovima-1.png" alt="navSlika" class="imgNav"> </li>
                    <li><a id="btn-Pocetna" href="index.php" type="button" class="btn btn-success btn-block" style="margin-left:100px" >
                        Pocetna</a></li>
                    <li><a id="btn-Dodaj" type="button" class="btn btn-success btn-block"  style="margin-left:100px" data-toggle="modal" data-target="#my" >
                        Nov proizvod </a></li>
                    <li><a id="btn-Prikazi" href="prikaziProizvode.php" type="button" style="margin-left:100px" class="btn btn-success btn-block">
                        Svi proizvodi</a></li>
                    <li><a id="btn-Pocetna" href="odjava.php" type="button" class="btn btn-success btn-block"  style="margin-left:100px">
                    Odjavi se</a> </li>
                </div>
            </div>
    </nav>

    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <div class="slikeKontejner">
                    <img src="https://slatkoteka.rs/wp-content/uploads/2021/07/cokonaslov.png" alt="pocetna" class="img img-circle">
                    <img src="https://slatkoteka.rs/wp-content/uploads/2020/11/tortaa2.png" alt="pocetna" class="img img-circle">
                    <img src="https://slatkoteka.rs/wp-content/uploads/2020/11/mede.png" alt="pocetna" class="img img-circle">
                    </div>
                    <div style="color:white ; background-color:#f4a9c9; padding:25px; border-radius:25px; margin-top:50px ;margin-left:-200px;  margin-right:-200px">
                        <h2> Dobro došli. Ovo je Slatkoteka priča. Ugasite svetlo i  ušuškajte se, jer ulazite u čarobni svet krofni, slatkiša i iznenađenja.</h2>
                        <br>
                        <h3> Naš sajt je najbolje mesto za online kupovinu najukusnijih krofni u gradu! Uz širok izbor ukusa i jedinstvenih kombinacija, naša ponuda će sigurno zadovoljiti svačiji ukus. Nudimo brzu i jednostavnu online kupovinu, kao i sigurnu dostavu na željenu adresu.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt" style="margin-top:20px; margin-bottom: 200px; ">
    <div id="searchDiv" >
        <label for="pretraga"style="color:white ;font-weight:bold ;font-size:22px; padding-bottom:20px">Pretraga proizvoda na osnovu kategorije</label>
        <select id="pretraga" onchange="pretraga()" class="form-control" style=" font-size:20px ;" >
            <?php
            $rez = $conn->query("SELECT * from kategorija");

            while ($red = $rez->fetch_assoc()) {
            ?>
                <option 
                value="<?php echo $red['kategorijaId'] ?>"> <?php echo $red['imeKategorije'] ?></option>
            <?php   }
            ?>
        </select>
    </div>

    <div id="podaciPretraga"style="font-size:18px ; margin-top:-40px" ></div>
    </div>



    <script>
        function pretraga() {
            $.ajax({
                url: "handler/pretragaProizvoda.php",
                data: {
                    kategorijaId: $("#pretraga").val()
                },
                success: function(html) {
                    $("#podaciPretraga").html(html);
                }
            })
        }
    </script>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>