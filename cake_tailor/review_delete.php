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
        DELETE FROM review
        WHERE r_id = '{$filtered_id}'
    ";
    
    $result = mysqli_query($link, $query);
    if ($result == false) { ?>
        <script>      
            alert("리뷰가 삭제되지 않았습니다.");
            location.replace("./review.php");
        </script>
    <?php
        error_log(mysqli_error($link));
    } else {
        ?>
        <script>
                alert('리뷰가 삭제 되었습니다.');
                location.replace("./review.php");
        </script>
    <?php
    }
?>