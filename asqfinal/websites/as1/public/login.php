<?php
session_start();
include 'userheader.php';

if (isset($_POST['userkologinkolagi'])){
    $usekolaafnaiemailho=$_POST['userkoemailidhohai'];
    $userkoaafnaipasswordho=$_POST['userkopasswordhohai'];
    if(empty($usekolaafnaiemailho) || empty($userkoaafnaipasswordho)){
        echo"<main>Please check your username and password the value is not added</main>";
    }else{
        include 'connectiondb.php';
        $teidatabasekoqueryhai=$pdo->prepare("SELECT * FROM  users WHERE email=:Userkoemailyeiho LIMIT 1");
        $crieteria=["Userkoemailyeiho"=>$usekolaafnaiemailho]; 
        $teidatabasekoqueryhai->execute($crieteria);
        $userkodatafetchhandeko=$teidatabasekoqueryhai->fetch();
        if($userkodatafetchhandeko){
            
            if( $userkodatafetchhandeko['password']===$userkoaafnaipasswordho){
                
                if($userkodatafetchhandeko['access_level']=='admin'){
                    echo "<script>window.location.href = 'adminheader.php';</script>";
                    exit();
                }
                if($userkodatafetchhandeko['access_level']=='user'){
                    echo "<script>window.location.href = 'auctionadmin.php';</script>";
                    exit();
                }
            }
        }
    }
}
?>

<main>
<center>
<h1>Login</h1></center>
<form action="login.php" method="POST">
   <label>Email</label> <input type="email"  name="userkoemailidhohai"  />
   <label>Password</label> <input type="password" name="userkopasswordhohai"  />
   <input type="submit" value="Login" name="userkologinkolagi" />
</form>
<center><a href="register.php.">Registration</a></center>
</main>

<?php
include 'footer.php';
?>
