<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="baner1">
        <img src="zad5.png" alt="logo lotnisko">
    </div>
    <div id="baner2">
        <h1>Przyloty</h1>
    </div>
    <div id="baner3">
        <h3>przydatne linki</h3>
        <a href="Kwerendy.txt" target="_blank" >Pobierz...</a>
    </div>
    <div id="glowny">
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php 
            skrypt1();
            ?>
        </table>
    </div>
    <div id="stopka1">
        <?php skrypt2(); ?>
    </div>
    <div id="stopka2">
        AUTOR : blazej Plewnia
    </div>


</body>

</html>
<?php
    function skrypt1(){
        $conn=mysqli_connect("localhost","root","","lotnisko");
        $sql="Select czas,kierunek,nr_rejsu,status_lotu from przyloty order by czas;"; 
        $wynik=mysqli_query($conn,$sql);
        
        while($row=mysqli_fetch_assoc($wynik)){
            ?>
            <tr>
                <td><?php echo $row["czas"];?></td>
                <td><?php echo $row["kierunek"];?></td>
                <td><?php echo $row["nr_rejsu"];?></td>
                <td><?php echo $row["status_lotu"];?></td>
            </tr>
            <?php
        }
        mysqli_close($conn);
    }

    function skrypt2(){
        $odwiedzony=0;
        $odwiedzony1=1;
        setcookie($odwiedzony,$odwiedzony1,time()+7200);

        if(isset($_COOKIE[$odwiedzony])){
            ?>
                <p>
                    <b>
                        <?php echo "Witaj ponownie na stronie lotniska"; ?>
                    </b>
                </p>

            <?php
        }
        else{
            ?>
                <p>
                    <b>
                        <?php echo "Dzień dobry! strona lotniska używa ciasteczek"; ?>
                    </b>
                </p>

            <?php
        }

    }

?>