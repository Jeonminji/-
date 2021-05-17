<?php
    ini_set('display_errors', '0'); //에러 메시지 출력 x
    $db_host = "localhost"; 
    $db_user = "caketailor";
    $db_passwd = "tailorcake12!";
    $db_name = "caketailor";
    header("Content-Type:text/html;charset=utf-8");

    $link = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); //DB 접속
    
    
    $filtered = array(
        'r_product' => mysqli_real_escape_string($link, $_POST['r_product']),
        'r_name' => mysqli_real_escape_string($link, $_POST['r_name']),
        'r_password' => mysqli_real_escape_string($link, $_POST['r_password']),
        'r_title' => mysqli_real_escape_string($link, $_POST['r_title']),
        'r_content' => mysqli_real_escape_string($link, $_POST['r_content'])
    );
    $r_date = date("Y-m-d");
    $r_market = "OBread";

    if ($r_market and $filtered['r_product'] and $filtered['r_name'] and $filtered['r_password']  and $filtered['r_title'] and $r_date) {
        $query = "
            INSERT INTO review (
                r_market,
                r_product,
                r_name,
                r_password,
                r_title,
                r_content,
                r_date
            ) VALUES (
                '{$r_market}',
                '{$filtered['r_product']}',
                '{$filtered['r_name']}',
                '{$filtered['r_password']}',
                '{$filtered['r_title']}',
                '{$filtered['r_content']}',
                '{$r_date}'
            )
        ";
    }
    
    $result = mysqli_query($link, $query);
    if ($result == false) { ?>
        <script>      
            alert("리뷰가 작성되지 않았습니다.\r리뷰를 다시 입력해주세요.");
            location.replace("./review.php");
        </script>
    <?php
        error_log(mysqli_error($link));
    } else {
        ?>
        <script>
                alert('리뷰가 작성 되었습니다.');
                location.replace("./review.php");
        </script>
    <?php
    }
?>