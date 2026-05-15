<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Dr. Vijay Anand Reddy</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <?php include 'navbar.php'; ?>

    <section class="py-16 bg-medical-blue">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Services</h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">Comprehensive cancer treatment services by Dr. Vijay Anand Reddy</p>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-medical-blue/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user-md text-medical-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-medical-dark mb-2">Medical Oncology</h3>
                    <p class="text-gray-600">Comprehensive chemotherapy, immunotherapy, and targeted therapy treatments.</p>
                    <a href="medical-oncology.php" class="inline-block mt-4 text-medical-blue font-semibold hover:underline">Learn More →</a>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-medical-blue/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-radiation text-medical-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-medical-dark mb-2">Radiation Oncology</h3>
                    <p class="text-gray-600">Advanced radiation therapies including IGRT, IMRT, SRS, and SBRT.</p>
                    <a href="radiation-oncology.php" class="inline-block mt-4 text-medical-blue font-semibold hover:underline">Learn More →</a>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-medical-blue/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-procedures text-medical-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-medical-dark mb-2">Surgical Oncology</h3>
                    <p class="text-gray-600">Expert surgical interventions for various cancer types.</p>
                    <a href="surgical-oncology.php" class="inline-block mt-4 text-medical-blue font-semibold hover:underline">Learn More →</a>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-medical-blue/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-dna text-medical-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-medical-dark mb-2">Proton Therapy</h3>
                    <p class="text-gray-600">Precision proton therapy for targeted cancer treatment.</p>
                    <a href="proton-therapy.php" class="inline-block mt-4 text-medical-blue font-semibold hover:underline">Learn More →</a>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-medical-blue/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-shield-virus text-medical-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-medical-dark mb-2">Immunotherapy</h3>
                    <p class="text-gray-600">Cutting-edge immunotherapy treatments including checkpoint inhibitors.</p>
                    <a href="immunotherapy.php" class="inline-block mt-4 text-medical-blue font-semibold hover:underline">Learn More →</a>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-medical-blue/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-bullseye text-medical-blue text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-medical-dark mb-2">Targeted Therapy</h3>
                    <p class="text-gray-600">Personalized targeted therapy based on genetic profiling.</p>
                    <a href="targeted-therapy.php" class="inline-block mt-4 text-medical-blue font-semibold hover:underline">Learn More →</a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>