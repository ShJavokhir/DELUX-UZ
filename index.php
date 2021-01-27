<?php
   session_start();
   include("db_functions.php");
   $query = "UPDATE stat set visits=visits+1 WHERE id=1";
   queryMysql($query);
 ?>
<!DOCTYPE html>

<html lang="en">
  <?php
    include("header.php");
   ?>
   <div align="center" class="container">
<div class="row">
  <div class="col-sm-12" id="start"><h1 >Ro'yhatdan o'ting va ilk testlaringizni joylashtiring !</h1>
  <br>
 <form  action="umumiy_t.php">
<button  type="submit" class="btn btn-outline-success btn-lg mb-2 ">Umumiy test topshirish</button>
</form>
<form action="ichki_t.php" >
<button  type="submit" class="btn btn-outline-success btn-lg ">Ichki test topshirish</button>
</form>
</div>
  </div>
</div>
<br>
 <div align="center" class="container">
<div class="row">

  <!-- Natijalar-->
  <a class="img-fluid mb-0 d-block mx-auto" href="/posts">
<img align="center" class="img-fluid mb-5 d-block mx-auto" src = "assets/img/centerBanner2.png"></a>
  <div id="res" class="table-responsive">
    <h2 align="center" >Umumiy test natijalari</h2>

  <table class="table table-hover">
  <tr>
    <th>Ism familiyasi</th>
    <th>Test mavzusi</th>
    <th>Testlar soni</th>
    <th>To'g'ri belgilanganlar</th>
    <th>Noto'g'ri belgilanganlar</th>
    <th>Foiz</th>
    <th>Ball</th>
  </tr>
  <?php
    include_once("db_functions.php");
    $query = "SELECT * FROM u_user_taken_test order by id DESC LIMIT 12";
    $result = queryMysql($query);
    while($row=mysqli_fetch_assoc($result)){
      if($row['tests_number']!=0){
      echo "<tr>";
      echo "<td>".$row['name']." ".$row['surname']."</td>";
    echo "<td>".$row['test_name']."</td>";
      echo "<td>".$row['tests_number']."</td>";
      echo "<td>".$row['correct_test']."</td>";
      $mistakes = $row['tests_number']-$row['correct_test'];
      echo "<td>".$mistakes."</td>";
      $persent = round(100/$row['tests_number']*$row['correct_test']);
      echo "<td>".$persent." %</td>";
      echo "<td>".$row['ball']."</td>";
      echo "</tr>";
    }
    }
   ?>
  </table>
 </div>
</div>
<div class="container-fluid text-center text-md-left">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="my-4">Sayt sizga qanday qulayliklar yaratadi ?</h2>
    </div>
    <div class="col-lg-4 col-sm-6 text-center mb-4">
      <img class="rounded-circle img-fluid d-block mx-auto" src="/assets/img/happy1.png" width="40%" alt="">
<br>


      <p>Avvalambor sayt orqali o'z bilimlaringizni mustahkamlay olasiz !</p>
    </div>
    <div class="col-lg-4 col-sm-6 text-center mb-4">
      <img class="rounded-circle img-fluid d-block mx-auto" src="/assets/img/happy2.png" width="40%" alt="">
<br>
      <p>Istalgan joyingda test ishla !
      Ya'ni test tashkilotchisi oldindan saytga testlarni joylaydi va topshiruvchilarga testga kirish kalitini berishadi.Shundan so'ng ular testlarni bemalol ishlay olishadi.Aytgancha tashkilotchilar ularni kuzatib turishlari mumkin</p>
    </div>
    <div class="col-lg-4 col-sm-6 text-center mb-4">
      <img class="rounded-circle img-fluid d-block mx-auto" src="/assets/img/happy3.png" width="40%" alt="">
      <br>
      <p>Eng muhim narsalardan bittasi saytning yangi darslar bo'limi. Bu bo'limda siz ma'lum fanlardan darslarni o'qib borishiz mumkin!</p>
    </div>
        <h2 class="my-4">Sayt sizga qanday qulayliklar yaratadi ?</h2>

    <iframe id="doc" class="img-fluid mb-5 d-block mx-auto" width="640" height="360" src="https://mover.uz/video/embed/Tfz4qS8m/" frameborder="2" allowfullscreen></iframe>

</div>

  <!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">©IntelectSoft 2019 Copyright:
      <a href="https://Delux.uz/"> Delux.uz (BETA)</a>
            <a href="https://t.me/junior_coder"> Telegram : @Junior_Coder</a>
<!-- UzRating -->
<script language="javascript"><!--
Mid=5139;Mw=window;Md=document;Mnv=navigator;Mjs='1.0';Mrn=Math.random();
Md.cookie='c=1';Mck=Md.cookie?'y':'n';Mtm=(new Date()).getTimezoneOffset();
//--></script><script language="javascript1.1"><!--
Mjs='1.1';Mja=Mnv.javaEnabled()?'y':'n';
//--></script><script language="javascript1.2"><!--
Mjs='1.2';Ms=screen;Mpx=Mnv.appName.substring(0,2)=="Mi"?Ms.colorDepth:Ms.pixelDepth;
Msw=Ms.width+'x'+Ms.height;
//--></script><script language="javascript1.3"><!--
Mjs='1.3';//--></script><script language="javascript"><!--
Mrf=escape(Md.referrer);Murl='http://www.uzrating.com/';
My='<a href="'+Murl+'" target="_blank">';My+='<img src="'+Murl+'cgi-bin/count.fgi?rn='+
Mrn+'&id='+Mid+'&ck='+Mck+'&js='+Mjs+'&ja='+Mja+'&tm='+Mtm+'&px='+Mpx+'&sw='+Msw+
'&rf='+Mrf+'" alt="UzRating" border="0" width="88" height="31">';My+='</a>';Md.write(My);
//--></script><noscript><a href="http://www.uzrating.com/" target="_blank">
<img src="http://www.uzrating.com/cgi-bin/count.fgi?id=5139" alt="UzRating" border="0" width="88" height="31">
</a></noscript>
<!-- /UzRating -->
      </div>
    <!-- Copyright -->
    <!-- Bootstrap core JavaScript -->
    <script src="Homepage/vendor/jquery/jquery.min.js"></script>
    <script src="Homepage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>