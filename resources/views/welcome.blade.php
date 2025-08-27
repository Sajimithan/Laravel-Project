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
                background-image: url('{{ asset('image/healthcare.jpg') }}');
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

            .tip-card {
                background-color: rgba(255, 255, 255, 0.1);
                border-radius: 8px;
                padding: 15px;
                margin: 10px 0;
                border-left: 4px solid #007bff;
            }

            .tip-title {
                font-weight: bold;
                color: #007bff;
                margin-bottom: 8px;
            }

            .tip-content {
                font-size: 1rem;
                line-height: 1.4;
            }

            .tip-category {
                display: inline-block;
                background-color: #007bff;
                color: white;
                padding: 4px 8px;
                border-radius: 12px;
                font-size: 0.8rem;
                margin-top: 8px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <h1>Welcome to the Health Care System</h1>
            <p>Your trusted partner for health-related information and services.</p>

            <!-- Dynamic Health Tips Section -->
            <div class="health-tips">
                <h2>Today's Health Tips</h2>
                <div id="health-tips-container">
                    <div class="tip-card">
                        <div class="tip-title">Loading health tips...</div>
                        <div class="tip-content">Please wait while we load the latest health information for you.</div>
                    </div>
                </div>
            </div>

            <!-- Buttons for Login and Registration -->
            <div class="buttons">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Health Care System. All Rights Reserved.</p>
        </footer>

        <script>
            // Load health tips when page loads
            document.addEventListener('DOMContentLoaded', function() {
                loadHealthTips();
            });

            function loadHealthTips() {
                fetch('/api/health-tips/random')
                    .then(response => response.json())
                    .then(tip => {
                        if (tip) {
                            displayHealthTip(tip);
                        } else {
                            displayDefaultTips();
                        }
                    })
                    .catch(error => {
                        console.error('Error loading health tip:', error);
                        displayDefaultTips();
                    });
            }

            function displayHealthTip(tip) {
                const container = document.getElementById('health-tips-container');
                container.innerHTML = `
                    <div class="tip-card">
                        <div class="tip-title">${tip.title}</div>
                        <div class="tip-content">${tip.content}</div>
                        <span class="tip-category">${tip.category}</span>
                    </div>
                `;
            }

            function displayDefaultTips() {
                const container = document.getElementById('health-tips-container');
                container.innerHTML = `
                    <div class="tip-card">
                        <div class="tip-title">Stay Hydrated</div>
                        <div class="tip-content">Drink plenty of water throughout the day to maintain good health.</div>
                        <span class="tip-category">general</span>
                    </div>
                    <div class="tip-card">
                        <div class="tip-title">Balanced Diet</div>
                        <div class="tip-content">Eat a variety of fruits, vegetables, and lean proteins for optimal nutrition.</div>
                        <span class="tip-category">nutrition</span>
                    </div>
                    <div class="tip-card">
                        <div class="tip-title">Regular Exercise</div>
                        <div class="tip-content">Aim for at least 150 minutes of moderate exercise weekly for better health.</div>
                        <span class="tip-category">exercise</span>
                    </div>
                `;
            }
        </script>
    </body>
</html>
