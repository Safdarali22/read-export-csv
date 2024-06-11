<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export CSV Data & Display Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        button {
            display: block;
            margin: 0 auto 20px;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message-container {
            margin: 20px auto;
            text-align: center;
            background-color: green;
            width: 400px;
            height: 30px;
            color: white;
            border-radius: 7px;
        }

        .message-container p {
            line-height: 30px; 
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Export CSV Data & Display Data</h1>
        <form action="require/process.php" method="post">
            <button type="submit">Export Data</button>
        </form>
        <?php if(isset($_GET['message'])) { ?>
            <div class="message-container">
                <p><?= $_GET['message'] ?></p>
            </div>
        <?php } ?>

        <?php
            require("require/connection.php");

            $query = "SELECT * FROM csv";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<h2>CSV Data</h2>";
                echo "<table>";
                echo "<tr><th>User ID</th><th>Full Name</th><th>Gender</th><th>Email</th><th>Password</th><th>Active</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['user_Id'] . "</td>";
                    echo "<td>" . $row['full_name'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['user_email'] . "</td>";
                    echo "<td>" . $row['user_password'] . "</td>";
                    echo "<td>" . $row['is_active'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "";
            }
        ?>
    </div>
</body>
</html>
