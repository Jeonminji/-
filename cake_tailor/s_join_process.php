<?php
    ini_set('display_errors', '0'); //에러 메시지 출력 x
    $db_host = "localhost"; 
    $db_user = "caketailor";
    $db_passwd = "tailorcake12!";
    $db_name = "caketailor";
    header("Content-Type:text/html;charset=utf-8");

    $link = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); //DB 접속
    
    $filtered = array(
        's_id' => mysqli_real_escape_string($link, $_POST['s_id']),
        's_password' => mysqli_real_escape_string($link, $_POST['s_password']),
        's_hp1' => mysqli_real_escape_string($link, $_POST['s_hp1']),
        's_hp2' => mysqli_real_escape_string($link, $_POST['s_hp2']),
        's_name' => mysqli_real_escape_string($link, $_POST['s_name']),
        's_store' => mysqli_real_escape_string($link, $_POST['s_store']),
        's_address' => mysqli_real_escape_string($link, $_POST['s_address'])
    );

    if ($filtered['s_id'] and $filtered['s_password'] and $filtered['s_hp1'] and $filtered['s_name'] and $filtered['s_store'] and $filtered['s_address']) {
        $query = "
            INSERT INTO seller (
                s_id,
                s_password,
                s_hp1,
                s_hp2,
                s_name,
                s_store,
                s_address
            ) VALUES (
                '{$filtered['s_id']}',
                '{$filtered['s_password']}',
                '{$filtered['s_hp1']}',
                '{$filtered['s_hp2']}',
                '{$filtered['s_name']}',
                '{$filtered['s_store']}',
                '{$filtered['s_address']}'
            )
        ";
    }
    
    $result = mysqli_query($link, $query);
    if ($result == false) { ?>
        <script>      
            alert("가입 되지 않았습니다.");
            location.replace("./join_form.html");
        </script>
    <?php
        error_log(mysqli_error($link));
    } else {
        ?>
        <script>
                alert('가입 되었습니다.');
                location.replace("./join.html");
        </script>
    <?php
    }
?>