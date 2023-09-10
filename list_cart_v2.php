<table>
<thead>
    <tr>
        <th>#</th>
        <th>product_id</th>
        <th>cart name</th>
        <th>amount</th>
        <th>price</th>
        <th>USER</th>
        <th>delete</th>
    </tr>
</thead>
<tbody>
<?php
session_start();
$i = 1;
foreach ($_SESSION['CART'] as $key => $value):
?>
<tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $key; ?></td>
    <td><?php echo $value['product_name']; ?></td>
    <td><?php echo $value['product_amount']; ?></td>
    <td><?php echo $value['product_price']; ?></td>
    <td><?php echo $_SESSION['AUTHEN_USERNAME']; ?></td>
    <td><a href="./delete_cart.php?d_cart=<?php echo $key; ?>">delete</a></td>
</tr>
<?php endforeach; ?>
</tbody>

</table>
