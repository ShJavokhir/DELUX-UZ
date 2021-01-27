<?php 
  session_start();
  if (!isset($_SESSION['u_id'])) {
    header('Location: /login.php?status=noentered');
    exit();
  }
  ?>
<?php 
    include("db_functions.php");
    if(isset($_GET['tests'])){
    $testno = $_GET['tests'];
    }
    if(isset($_GET['question'])){
     $question=$item1=$item2=$item3=$trueitem=$test_num = "";
                $question = strtocode($_GET['question']);
                $item1 = strtocode($_GET['item1']);
                $item2 = strtocode($_GET['item2']);
                $item3 = strtocode($_GET['item3']);
                $trueitem = strtocode($_GET['trueitem']);
                $test_num = $_GET['test_num'];
                $sorov = "UPDATE tests set question='".$question."',item1='".$item1."',item2='".$item2."',item3='".$item3."',trueitem='".$trueitem."',test_num='".$test_num."' where id = ".$testno."";
  }

 ?> 