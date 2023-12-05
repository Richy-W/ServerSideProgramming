<?php
    require_once('../util/secure_conn.php');  // require a secure connection
    require_once('../util/valid_admin.php');  // require a valid admin user
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Guitar Shop</title>
        <link rel="stylesheet" type="text/css" href="../main.css"/>
    </head>
    <body>
        <header>
            <h1>My Guitar Shop</h1>
        </header>
        <main>
            <h1>Admin Menu</h1>
            <p><a href="../index.php?action=show_product_manager">Product Manager</a></p>
            <p><a href="../index.php?action=show_order_manager">Order Manager</a></p>
            <p><a href="../index.php?action=logout">Logout</a></p>
        </main>
    </body>
</html>