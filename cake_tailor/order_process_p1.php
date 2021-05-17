<?php
    ini_set('display_errors', '0'); //에러 메시지 출력 x
    $db_host = "localhost"; 
    $db_user = "caketailor";
    $db_passwd = "tailorcake12!";
    $db_name = "caketailor";
    header("Content-Type:text/html;charset=utf-8");

    $link = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); //DB 접속
    
    
    $filtered = array(
        'o_name' => mysqli_real_escape_string($link, $_POST['o_name']),
        'o_hp' => mysqli_real_escape_string($link, $_POST['o_hp']),
        'o_pickupD' => mysqli_real_escape_string($link, $_POST['o_pickupD']),
        'o_pickupT' => mysqli_real_escape_string($link, $_POST['o_pickupT']),
        'o_quantity' => mysqli_real_escape_string($link, $_POST['o_quantity']),
        'o_size' => mysqli_real_escape_string($link, $_POST['o_size']),
        'o_shape' => mysqli_real_escape_string($link, $_POST['o_shape']),
        'o_flavor' => mysqli_real_escape_string($link, $_POST['o_flavor']),
        'o_scolor' => mysqli_real_escape_string($link, $_POST['o_scolor']),
        'o_fruit' => mysqli_real_escape_string($link, $_POST['o_fruit'])
    );
    $o_date = date("Y-m-d H:i:s");

    if ($filtered['o_name'] and $filtered['o_hp'] and $filtered['o_pickupD']  and $filtered['o_pickupT'] and $filtered['o_quantity'] and $filtered['o_size'] and $filtered['o_shape'] and $filtered['o_flavor'] and $filtered['o_scolor'] and $filtered['o_fruit'] and $o_date) {
        $query = "
            INSERT INTO orderF (
                o_name,
                o_hp,
                o_pickupD,
                o_pickupT,
                o_quantity,
                o_size,
                o_shape,
                o_flavor,
                o_scolor,
                o_fruit,
                o_date
            ) VALUES (
                '{$filtered['o_name']}',
                '{$filtered['o_hp']}',
                '{$filtered['o_pickupD']}',
                '{$filtered['o_pickupT']}',
                '{$filtered['o_quantity']}',
                '{$filtered['o_size']}',
                '{$filtered['o_shape']}',
                '{$filtered['o_flavor']}',
                '{$filtered['o_scolor']}',
                '{$filtered['o_fruit']}',
                '{$o_date}'
            )
        ";
    }
    
    $result = mysqli_query($link, $query);
    if ($result == false) { ?>
        <script>      
            alert("주문이 접수되지 않았습니다.\r주문서를 다시 입력해주세요.");
            location.replace("./3d_custom1.html");
        </script>
    <?php
        error_log(mysqli_error($link));
    } else {
        ?>
        <script>
                alert('주문 되었습니다.');
                location.replace("./order_success.html");
        </script>
    <?php
    }
?>