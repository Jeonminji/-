<?php
    ini_set('display_errors', '0'); //에러 메시지 출력 x
    $db_host = "localhost"; 
    $db_user = "caketailor";
    $db_passwd = "tailorcake12!";
    $db_name = "caketailor";
    header("Content-Type:text/html;charset=utf-8");

    $link = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); //DB 접속
    $query = "
        SELECT 
            r_id, r_product, r_name, r_title, r_content, r_date 
        FROM 
            review 
        WHERE 
            r_market='OBread'
        ORDER BY 
            r_id ASC
    ";
    $result = mysqli_query($link, $query);

    $re_info = '';
    while($row = mysqli_fetch_array($result)) {
        $re_info .= '<tr>';
        $re_info .= '<td>'.$row['r_product'].'</td>';
        $re_info .= '<td>'.$row['r_name'].'</td>';
        $re_info .= '<td>'.$row['r_title'].'</td>';
        $re_info .= '<td>'.$row['r_content'].'</td>';
        $re_info .= '<td>'.$row['r_date'].'</td>';    
        $re_info .= '<td><a href="review_update.php?r_id='.$row['r_id'].'">update</a></td>';
        $re_info .= '<td><a href="review_delete.php?r_id='.$row['r_id'].'">delete</a></td>';
        $re_info .= '</tr>';
    }  
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

    <!-- 리뷰 작성 -->
    <form action="review_insert.php" method="POST">
        <div style="height= 50px; width: 5%; border= 1px blue solid"></div>
        <div style="margin= 5% 10% 5% 0%;">&nbsp;&nbsp;
            <br><a href="#pop1" class="rev">리뷰&nbsp;작성하기</a>
        </div>
            <div class="popup" id="pop1">
                <p style="margin: 3%; text-align: left;">
                    상품명&nbsp;&nbsp;
                    <select name="r_product" style="height: 40px;">
                            <option value="생과일 케이크">생과일 케이크</option>
                            <option value="레터링 케이크">레터링 케이크</option>
                            <option value="당근 케이크">당근 케이크</option>
                    </select>
                    <br><br>
                    이름&nbsp;&nbsp;
                    <input type="text" name="r_name" placeholder="필수 입력"><br><br>
                    비밀번호  &nbsp;&nbsp;
                    <input type="password" name="r_password" placeholder="필수 입력"><br><br>
                    제목<br>
                    <input type="text" name="r_title" placeholder="필수 입력" style="height: 40px; width: 550px;"><br><br>
                    내용<br>
                    <input type="textarea" name="r_content" placeholder="" style="height: 450px; width: 550px; white-space: pre-wrap; "><br><br>
                    <input type="submit" value="Create" class="button">
                </p>
                <a href="#c">취소</a>
            </div>
            <div class="dim"></div>
    </form>

    <!-- 리뷰 보이기 -->
    <table class="list-table" style="margin: 10%; width: 80%;">
        <tr>
            <th>상품명</th>
            <th>이름</th>
            <th>제목</th>
            <th>내용</th>
            <th>작성일</th>
            <th>수정</th>
            <th>삭제</th>
        </tr>
        <tr></tr>
        <tr>
            <th colspan="7"><hr></th>
        </tr>
        <?= $re_info ?>
    </table>
    <div style="clear: both;"></div>

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
