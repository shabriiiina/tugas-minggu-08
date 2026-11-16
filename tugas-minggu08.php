<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart Test</title>
</head>
<body>
    <h1>Items available</h1>
    <form action="tugas-minggu08.php" method="post">
        <table>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
            </tr>
            <tr>
                <td>Apples</td>
                <td><input type="text" name="apples" size="2"></td>
            </tr>
            <tr>
                <td>Bananas</td>
                <td><input type="text" name="bananas" size="2"></td>
            </tr>
        </table>
        <input type="submit" value="Click to add to cart">
    </form>
    <br>

    <?php
    // Proses untuk item Apples
    if (isset($_POST['apples'])) {
        if (is_numeric($_POST['apples']) && $_POST['apples'] > 0) {
            // Jika sudah ada di cart, tambahkan. Jika belum, buat baru.
            if (isset($_SESSION['cart']['apples'])) {
                $_SESSION['cart']['apples'] += (int)$_POST['apples'];
            } else {
                $_SESSION['cart']['apples'] = (int)$_POST['apples'];
            }
        } elseif ($_POST['apples'] == "Remove") {
            // Kurangi kuantitas sebanyak 1
            if (isset($_SESSION['cart']['apples'])) {
                $_SESSION['cart']['apples']--;
                // Hapus item jika kuantitasnya 0 atau kurang
                if ($_SESSION['cart']['apples'] <= 0) {
                    unset($_SESSION['cart']['apples']);
                }
            }
        }
    }

    // Proses untuk item Bananas
    if (isset($_POST['bananas'])) {
        if (is_numeric($_POST['bananas']) && $_POST['bananas'] > 0) {
            // Jika sudah ada di cart, tambahkan. Jika belum, buat baru.
            if (isset($_SESSION['cart']['bananas'])) {
                $_SESSION['cart']['bananas'] += (int)$_POST['bananas'];
            } else {
                $_SESSION['cart']['bananas'] = (int)$_POST['bananas'];
            }
        } elseif ($_POST['bananas'] == "Remove") {
            // Kurangi kuantitas sebanyak 1
            if (isset($_SESSION['cart']['bananas'])) {
                $_SESSION['cart']['bananas']--;
                // Hapus item jika kuantitasnya 0 atau kurang
                if ($_SESSION['cart']['bananas'] <= 0) {
                    unset($_SESSION['cart']['bananas']);
                }
            }
        }
    }
    ?>

    <fieldset style="width:300px">
        <legend>Your Shopping Cart</legend>
        <?php
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            echo "Your shopping cart is empty\n";
        } else {
            echo "<form action=\"tugas-minggu08.php\" method=\"post\">\n";
            echo "<table>\n";
            echo "<tr><th>Item</th><th>Quantity</th><th></th></tr>\n";
            foreach ($_SESSION['cart'] as $key => $value) {
                echo "<tr><td>$key</td><td>$value</td>\n";
                echo "<td><input type=\"submit\" name=\"$key\" value=\"Remove\"></td></tr>\n";
            }
            echo "</table>\n";
            echo "</form>\n";
        }
        ?>
    </fieldset>
</body>
</html>