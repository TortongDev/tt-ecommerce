<?php
    $count_star = isset($_POST['count_star']) ? htmlspecialchars(trim($_POST['count_star'])) : '';
    echo json_encode($count_star);
?>