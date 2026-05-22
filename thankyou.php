<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="assets/logo/var-favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Dr. Vijay Anand Reddy</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a'
                        },
                        purple: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9'
                        },
                        medical: {
                            blue: '#9B528F',
                            purple: '#8B5CF6',
                            light: '#F8FAFC',
                            dark: '#1E293B'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        inter: ['Inter', 'sans-serif']
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white min-h-screen flex flex-col">

    <!-- Spacer for fixed navbar -->
    <div class="h-28 md:h-32"></div>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-4 py-16">
        <div class="max-w-xl w-full text-center">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-10 md:p-14">
                <!-- Success Icon -->
                <div class="mx-auto w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-6">
                    <i data-feather="check-circle" class="w-10 h-10 text-green-500"></i>
                </div>

                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Thank You!</h1>
                <p class="text-gray-600 text-lg mb-3">Your message has been sent successfully.</p>
                <p class="text-gray-500 mb-8">We appreciate you reaching out. Our team will review your message and get back to you as soon as possible.</p>

                <div class="bg-purple-50 border border-purple-200 rounded-xl p-5 mb-8 text-left">
                    <h3 class="font-semibold text-medical-blue mb-2 flex items-center gap-2">
                        <i data-feather="info" class="w-4 h-4"></i>
                        What happens next?
                    </h3>
                    <ul class="text-gray-600 text-sm space-y-2">
                        <li class="flex items-start gap-2">
                            <i data-feather="clock" class="w-4 h-4 text-medical-blue flex-shrink-0 mt-0.5"></i>
                            Our team will review your inquiry within 24 hours.
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-feather="phone" class="w-4 h-4 text-medical-blue flex-shrink-0 mt-0.5"></i>
                            You may receive a call or email from our office.
                        </li>
                        <li class="flex items-start gap-2">
                            <i data-feather="calendar" class="w-4 h-4 text-medical-blue flex-shrink-0 mt-0.5"></i>
                            If needed, we will help schedule your appointment.
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="index.php" class="inline-flex items-center justify-center gap-2 bg-medical-blue text-white px-6 py-3 rounded-lg font-semibold hover:bg-medical-dark transition shadow-md hover:shadow-lg">
                        <i data-feather="home" class="w-4 h-4"></i>
                        Back to Home
                    </a>
                    <a href="contact.php" class="inline-flex items-center justify-center gap-2 border-2 border-medical-blue text-medical-blue px-6 py-3 rounded-lg font-semibold hover:bg-medical-blue hover:text-white transition">
                        <i data-feather="message-circle" class="w-4 h-4"></i>
                        Contact Again
                    </a>
                </div>
            </div>

            <!-- Emergency Contact -->
            <div class="mt-8 text-gray-500 text-sm">
                <p>For urgent inquiries, call us directly at
                    <a href="tel:+919676720002" class="text-medical-blue font-semibold hover:underline">+91-9676720002</a>
                </p>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
</body>
</html>
