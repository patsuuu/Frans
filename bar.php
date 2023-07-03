<?php
session_start();
include "db_conn.php";
$cnt;
if(isset($_POST['SUBMIT'])){
  
  $gender = $_POST['gender'];
 $age = $_POST['AGE'];

//$mcnt = "SELECT SUM(`MALE`) FROM `charut`;";
  if ($gender == "male") {
  $cnt++;
  $sql = "INSERT INTO `charuts`(`MALE`,`AGE`) 
                        VALUES ('$cnt','$age')";

    $result = mysqli_query($conn, $sql, );

    if ($result) {
      header("refresh:0; bar.php");
      echo '<script>alert("Insert Successful"})</script>';
  }else{
    echo '<script>alert("Errorrrrr")</script>';
    header("register:0; register.php");
  }
  
} 
else{
  
  $Fadd++;
  $sql = "INSERT INTO `charuts`(`FEMALE`,`AGE`) 
                          VALUES ('$Fadd','$age')";
  
    $result = mysqli_query($conn, $sql, $query);

    if ($result) {
      header("refresh:0; bar.php");
      echo '<script>alert("Insert Successful")</script>';
  }else{
    echo '<script>alert("Errorrrrr")</script>';
    header("register:0; register.php");
  }
  
}
}


$query = "SELECT * FROM charut"; 
//$mcount = 32;
//$fcount = 12;
$getData = $conn->query($query);

$column_M = mysqli_query($conn, 'SELECT SUM(MALE) AS male_sum FROM charut'); 
$row = mysqli_fetch_assoc($column_M); 
$Msum = $row['male_sum'];

$column_F = mysqli_query($conn, 'SELECT SUM(FEMALE) AS fmale_sum FROM charut'); 
$row = mysqli_fetch_assoc($column_F); 
$Fsum = $row['fmale_sum'];
?>


<!doctype html>
<html lang="en">
<a href="indexx.php" class="btn btn-success btn-sm">Back</a>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<br><br>
<center>
        <form method="post">
  <label for="gender">Gender: </label>
    <select name="gender" id="gen">
        <option value="male">male</option>
        <option value="female">female</option>
    </select>
<br><br>
<label>Age: </label>
<input type="text" name="AGE" placeholder="input ur age.."><br><br>
<input type="submit" name="submit" value="SUMBIT"><br><br>
</form>
    </center>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!--<script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>-->
    <title>charts</title>
    <style> .center-block { display: block;margin-left: auto;margin-right: auto; }</style>
</head>

<body>
    
<div class="container">
    <center>
       <div id="containee"></div>
        <div id="contains"></div>
        
    </center>

 </div>


<style>
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 320px;
    max-width: 660px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>

<script>

const colors = Highcharts.getOptions().colors.map((c, i) =>
    // Start out with a darkened base color (negative brighten), and end
    // up with a much brighter color
    Highcharts.color(Highcharts.getOptions().colors[0])
        .brighten((i - 3) / 7)
        .get()
);

// Build the chart
Highcharts.chart('containee', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Gender'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'GENDER COUNT',
            colorByPoint: true,
            data: [
                
                ["MALE", <?php echo $Msum ?>],["FEMALE", <?php echo $Fsum ?>]
            
            ]
            
        }]
    });

Highcharts.chart('contains', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'bar'
        },
        title: {
            text: 'Age'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.total:.1f}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'AGE COUNT',
            colorByPoint: true,
            data: [
                <?php
                //$agecnt = "SELECT SUM(`AGE`) FROM `charut`;";

                $age = '';
                if ($getData->num_rows>0){
                    while ($row = $getData->fetch_object()){
                        $age.='{ name:"'.$row->AGE.'",y:'.$row->AGE.'},';
                    }
                }
                echo $age;
                ?>
            ]
        }]
    });
</script>
</body>
</html>