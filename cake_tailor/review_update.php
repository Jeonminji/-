<?php
    ini_set('display_errors', '0'); //에러 메시지 출력 x
    $db_host = "localhost"; 
    $db_user = "caketailor";
    $db_passwd = "tailorcake12!";
    $db_name = "caketailor";
    header("Content-Type:text/html;charset=utf-8");

    $link = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); //DB 접속

    if(isset($_GET['r_id'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['r_id']);
    } else {
        $filtered_id = mysqli_real_escape_string($link, $_POST['r_id']);        
    }

    $query = "
        SELECT * 
        FROM review 
        WHERE r_id='{$filtered_id}'
    ";    
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>cake reviews</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link href="http://fonts.googleapis.com/earlyaccess/jejugothic.css" rel="stylesheet" >
    <script src="java.js"></script>
    <link rel="stylesheet" href="popup.css">
</head>
<body>
    
    <div class="header">
        <h1>CAKE TAILOR</h1>
    </div>
    
    <div id="topnav">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="market_s1.html">Products</a>
          <!-- <li><a href="products.html">Products</a> -->
            <ul class="sub">
              <li><a href="market_s1.html">O'Bread</a></li>
              <!-- <li><a href="market_s2.html">market2</a></li>
              <li><a href="market_s3.html">market3</a></li>
              <li><a href="market_s4.html">market4</a></li> -->
            </ul>
          </li>
          <li><a href="best.html">Best&nbsp;Sellers</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="help.html">Help&nbsp;Center</a></li>
          <li><a href="join.html">Join</a></li>
          <!-- <li><a href="wish.html" style="float:right">wishlist&nbsp;icon</a></li> -->
        </ul>
      </div>
    <!--product list-->
    <div class="page_title">
        Review
    </div>
    
    <center>
    <form action="review_update_process.php" method="POST">
    <p style="margin: 3%; text-align: left;">
        글 번호&nbsp;&nbsp; <input type="text" name="r_id" value="<?=$row['r_id']?>" readonly style="width: 20px;"><br><br>
        상품명&nbsp;&nbsp;
        <select name="r_product" style="height: 40px;">
            <option value="<?=$row['r_product']?>"><?=$row['r_product']?></option>
            <option value="생과일 케이크">생과일 케이크</option>
            <option value="레터링 케이크">레터링 케이크</option>
            <option value="당근 케이크">당근 케이크</option>
        </select>
        <br><br>
        이름&nbsp;&nbsp;
        <input type="text" name="r_name" placeholder="필수 입력" value="<?=$row['r_name']?>"><br><br>
        비밀번호  &nbsp;&nbsp;
        <input type="password" name="r_password" placeholder="필수 입력" value="<?=$row['r_password']?>"><br><br>
        제목<br>
        <input type="text" name="r_title" placeholder="필수 입력" value="<?=$row['r_title']?>" style="height: 40px; width: 550px;"><br><br>
        내용<br>
        <input type="textarea" name="r_content" placeholder="" value="<?=$row['r_content']?>" style="height: 450px; width: 550px; white-space: pre-wrap; "><br><br>
        <input type="submit" value="Update" class="button">
    </p>
    </form>
    </center>

    <div class="footer">
        <ul style="display: inline; list-style: none; ">
            <li>Policy</li>
            <br>
            <li>Shipping & Returns</li>
            <li>Payment Methods</li>
            <li>FAQ</li>
        </ul>
    </div>

</body>
</html>
