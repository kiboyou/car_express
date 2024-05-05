<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
				initial-scale=1.0">
    <title>
        404 Page Not Found
    </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #D3D3D3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 5rem;
            color: #ff5733;
        }

        p {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            background-color: #ff5733;
            color: #fff;
            padding: 10px 20px;
            border-radius: 3px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #e6482e;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1> Erreur Data </h1>
        <p>
            <span id="pass" style="color: <?= isset($_GET['error']) ? 'red' : 'inherit'; ?>;">
                <?= isset($_GET['error']) ? htmlspecialchars($_GET['error']) : ''; ?>
            </span>
        </p>
        <a href="#" id="goBack">Go Back to Previous Page</a>
    </div>
</body>
<script>
    document.getElementById('goBack').addEventListener('click', function(event) {
        event.preventDefault();
        window.history.back();
    });
</script>

</html>