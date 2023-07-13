<!DOCTYPE html>
<html>
<head>
    <title>Add Turf Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            display: block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Add Turf Details</h2>

<form method="post" action="add_turf.php" enctype="multipart/form-data">
    <label for="name">Turf Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="photos">Photos:</label>
    <input type="file" id="photos" name="photos[]" multiple>
    
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" cols="50"></textarea>
    
    <input type="submit" value="Add Turf">
</form>

</body>
</html>