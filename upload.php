<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Upload</title>
</head>
<body>
    <h2>
        Excel upload
    </h2>
    Please upload your excel file, and the result will print out in other page

    <br><br>

    <form action="uploadProcess.php" enctype="multipart/form-data" method="post">

        <input type="file" name="excel">

        <br>
        <br>

    <button type="submit">Upload file</button>
    </form>
</body>
</html>