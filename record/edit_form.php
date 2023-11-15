<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #fff;
        }

        form {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ddd;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #555;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #444;
            color: #fff;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            text-align: center;
            color: #ddd;
        }
    </style>
</head>
<body>
    <div>
        <h2>Edit Form</h2>

        <?php
        $conn = new mysqli("localhost", "root", "", "validation");
        if ($conn->connect_error) {
            die("Connection Failed" . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT * FROM validate WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
        ?>

        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" value="<?php echo $row['name']; ?>" required>

            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename" value="<?php echo $row['middle']; ?>">

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" value="<?php echo $row['last']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="male" <?php echo ($row['gender'] === 'male') ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo ($row['gender'] === 'female') ? 'selected' : ''; ?>>Female</option>
                <option value="other" <?php echo ($row['gender'] === 'other') ? 'selected' : ''; ?>>Other</option>
            </select>

            <label for="address">Address:</label>
            <textarea name="address" rows="4" cols="50" required><?php echo $row['address']; ?></textarea>

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>

            <input type="submit" value="Update">
        </form>

        <?php
            } else {
                echo "Record not found.";
            }
        } else {
            echo "Invalid request.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
