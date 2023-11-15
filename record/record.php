<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Example</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
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
    </style>
</head>
<body>
    <div>
        <h2 style="text-align: center; color: #ddd;">PHP Form Example</h2>
        <form action="connect.php" method="post">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" required>

            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename">

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="address">Address:</label>
            <textarea name="address" rows="4" cols="50" required></textarea>

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
