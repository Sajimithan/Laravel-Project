<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Health Care System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                margin: 0;
                font-family: 'Figtree', sans-serif;
                background-image: url('<?php echo e(asset('image/healthcare.jpg')); ?>');
                background-size: cover;
                background-position: center;
                color: #fff;
                text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            }

            .content {
                text-align: center;
                padding: 50px;
            }

            .content h1 {
                font-size: 3rem;
                margin-bottom: 1rem;
            }

            .content p {
                font-size: 1.25rem;
                margin-bottom: 2rem;
            }

            .health-tips {
                margin: 20px auto;
                background-color: rgba(0, 0, 0, 0.5);
                padding: 20px;
                border-radius: 10px;
                width: 80%;
                max-width: 600px;
            }

            .health-tips h2 {
                font-size: 2rem;
                margin-bottom: 1rem;
            }

            .health-tips ul {
                list-style: none;
                padding: 0;
            }

            .health-tips li {
                font-size: 1.25rem;
                margin: 10px 0;
            }

            .buttons a {
                margin: 10px;
                padding: 15px 30px;
                text-decoration: none;
                color: white;
                font-size: 1.2rem;
                font-weight: bold;
                border-radius: 5px;
                display: inline-block;
                background-color: #007bff;
                transition: background-color 0.3s;
            }

            .buttons a:hover {
                background-color: #0056b3;
            }

            footer {
                position: absolute;
                bottom: 10px;
                width: 100%;
                text-align: center;
                color: #fff;
                text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            }
        </style>
    </head>
    <body>
        <div class="content">
            <h1>Welcome to the Health Care System</h1>
            <p>Your trusted partner for health-related information and services.</p>

            <!-- Health Tips Section -->
            <div class="health-tips">
                <h2>Health Tips</h2>
                <ul>
                    <li>Stay hydrated and drink plenty of water.</li>
                    <li>Eat a balanced diet with lots of fruits and vegetables.</li>
                    <li>Exercise regularly to maintain a healthy lifestyle.</li>
                </ul>
            </div>

            <!-- Buttons for Login and Registration -->
            <div class="buttons">
    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login</a>
    <a href="<?php echo e(route('register')); ?>" class="btn btn-secondary">Register</a>
</div>

        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Health Care System. All Rights Reserved.</p>
        </footer>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\health-domain\resources\views/welcome.blade.php ENDPATH**/ ?>