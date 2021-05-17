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
    
    $filtered = array(
        'r_product' => mysqli_real_escape_string($link, $_POST['r_product']),
        'r_name' => mysqli_real_escape_string($link, $_POST['r_name']),
        'r_password' => mysqli_real_escape_string($link, $_POST['r_password']),
        'r_title' => mysqli_real_escape_string($link, $_POST['r_title']),
        'r_content' => mysqli_real_escape_string($link, $_POST['r_content'])
    );

    $query = "
        UPDATE review
        SET
            r_product = '{$filtered['r_product']}',
            r_name = '{$filtered['r_name']}',
            r_password = '{$filtered['r_password']}',
            r_title = '{$filtered['r_title']}',
            r_content = '{$filtered['r_content']}'
        WHERE
            r_id = '{$filtered_id}'
    ";
    
    $result = mysqli_query($link, $query);
    if ($result == false) { ?>
        <script>      
            alert("리뷰가 수정되지 않았습니다.");
            location.replace("./review.php");
        </script>
    <?php
        error_log(mysqli_error($link));
    } else {
        ?>
        <script>
            alert('리뷰가 수정 되었습니다.');
            location.replace("./review.php");
        </script>
    <?php
    }
?>