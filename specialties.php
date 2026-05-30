<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <link rel="icon" href="assets/logo/var-favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oncology Specialties & Treatments | Dr. Vijay Anand Reddy</title>
    <meta name="description"
        content="Explore advanced cancer care specialties under Dr. Vijay Anand Reddy. Comprehensive treatments in Radiation, Medical, Surgical, and Pediatric Oncology in India.">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Tailwind CSS -->
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
                        medical: {
                            blue: '#9B528F',
                            purple: '#9B528F',
                            light: '#F8FAFC',
                            dark: '#1E293B'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .medical-gradient {
            background: linear-gradient(135deg, #EFF6FF 0%, #F5F3FF 100%);
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 45px -10px rgba(155, 82, 143, 0.15), 0 15px 20px -10px rgba(0, 0, 0, 0.05);
        }

        /* Subtle glow micro-animation on icon hover */
        .icon-container {
            transition: all 0.3s ease;
        }

        .card-hover:hover .icon-container {
            transform: scale(1.1) rotate(5deg);
            background-color: #9B528F;
            color: #ffffff !important;
        }

        .card-hover:hover .icon-container i {
            color: #ffffff !important;
        }
    </style>
</head>

<body class="bg-slate-50/50 text-gray-800 antialiased">

    <?php include 'navbar.php'; ?>

    <!-- Premium Hero Section -->
    <section
        class="relative pt-36 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-gradient-to-br from-blue-50 via-purple-50/70 to-pink-50/50">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=2080&auto=format&fit=crop"
                alt="Medical Background" class="w-full h-full object-cover opacity-25 mix-blend-overlay" />
            <div class="absolute inset-0 bg-gradient-to-b from-white/10 via-white/80 to-slate-50/95"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center max-w-4xl">
            <span
                class="inline-flex items-center gap-1.5 py-1.5 px-4 rounded-full bg-medical-blue/10 text-medical-blue text-sm font-semibold mb-6 tracking-wide">
                <i data-feather="award" class="w-4 h-4"></i> World-Class Oncology Expertise
            </span>
            <h1
                class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-medical-dark leading-tight mb-6 tracking-tight">
                Our <span
                    class="bg-gradient-to-r from-medical-blue to-medical-purple bg-clip-text text-transparent">Specialties</span>
                & Care
            </h1>
            <p class="text-lg sm:text-xl text-gray-600 mb-8 leading-relaxed max-w-3xl mx-auto font-normal">
                Dr. Vijay Anand Reddy delivers compassionate, state-of-the-art cancer treatment across a diverse range
                of specialties, ensuring personalized protocols tailored to every patient's unique diagnosis.
            </p>
        </div>
    </section>

    <!-- Specialties Grid Section -->
    <?php
    $specialties = [
        [
            'title' => "Radiation Oncology",
            'link' => "radiation-oncology.php",
            'icon' => "radio",
            'description' => "Precise, technologically advanced cancer treatment utilizing focused radiation beams with clinical excellence.",
            'image' => "assets/services/radiation-vijay.webp",
            'features' => ["IMRT/IGRT/SRS/SRT/RapidArc", "External Beam Therapy", "Brachytherapy", "Stereotactic Radiosurgery"]
        ],
        [
            'title' => "Medical Oncology",
            'link' => "medical-oncology.php",
            'icon' => "alert-circle",
            'description' => "Advanced chemotherapy, immunotherapy, and targeted therapies for comprehensive and systemic cancer management.",
            'image' => "assets/services/Pancreatic-Cancer.webp",
            'features' => ["Chemotherapy", "Immunotherapy", "Targeted Drug Therapy", "Hormonal Therapy Protocols"]
        ],
        [
            'title' => "Surgical Oncology",
            'link' => "surgical-oncology.php",
            'icon' => "crosshair",
            'description' => "Expert surgical interventions prioritizing tumor eradication while conserving organ function and health.",
            'image' => "assets/condiotion-images/adrenal-cancer.webp",
            'features' => ["Advanced Tumor Resections", "Minimally Invasive Surgeries", "Organ Preservation Surgery", "Reconstructive Oncology"]
        ],
        [
            'title' => "Hemato-Oncology",
            'link' => "hemato-oncology.php",
            'icon' => "droplet",
            'description' => "Specialized diagnostic and curative protocols for blood-related malignancies and lymphatic disorders.",
            'image' => "assets/treatments/chemotherapy.webp",
            'features' => ["Leukemia Treatments", "Lymphoma Management", "Multiple Myeloma Care", "Advanced Blood Disorders"]
        ],
        [
            'title' => "Breast Oncology",
            'link' => "breast-oncology.php",
            'icon' => "heart",
            'description' => "Comprehensive breast care focusing on early detection, advanced targeted therapies, and cosmetic reconstruction.",
            'image' => "assets/condiotion-images/breast-cancer-condition.webp",
            'features' => ["Breast-Conserving Surgeries", "SBRT for Breast Cancers", "Hormone & Targeted Therapies", "Oncoplastic Reconstruction"]
        ],
        [
            'title' => "Head & Neck Oncology",
            'link' => "head-neck-oncology.php",
            'icon' => "shield",
            'description' => "Multidisciplinary management of head and neck region cancers with extreme focus on speech and swallowing function.",
            'image' => "assets/condiotion-images/head-cancer.webp",
            'features' => ["Oral & Throat Oncology", "Thyroid Gland Cancers", "Speech & Swallowing Rehab", "Microvascular Reconstruction"]
        ],
        [
            'title' => "Thoracic Oncology",
            'link' => "thoracic-oncology.php",
            'icon' => "activity",
            'description' => "Expert therapies and advanced surgical and radiation approaches for lung, esophageal, and chest cavity tumors.",
            'image' => "assets/condiotion-images/lung-cancer.webp",
            'features' => ["Lung Cancer Treatments", "Esophageal Oncology", "Mediastinal Tumors", "Stereotactic Radiotherapy (SBRT)"]
        ],
        [
            'title' => "Gastrointestinal Oncology",
            'link' => "gastrointestinal-oncology.php",
            'icon' => "circle",
            'description' => "Dedicated treatment pathways for malignancies of the digestive tract, esophagus, liver, pancreas, and colon.",
            'image' => "assets/condiotion-images/Colorectal-cancer.webp",
            'features' => ["Colorectal Cancer Care", "Stomach & Esophageal Tumors", "Pancreatic & Biliary Oncology", "Hepatic (Liver) Cancer Protocols"]
        ],
        [
            'title' => "Gynecologic Oncology",
            'link' => "gynecologic-oncology.php",
            'icon' => "circle",
            'description' => "Specialized, compassionate care for female reproductive system cancers utilizing advanced surgical modalities.",
            'image' => "assets/condiotion-images/Cervical-cancer.webp",
            'features' => ["Cervical & Ovarian Cancers", "Uterine & Endometrial Care", "Fertility-Sparing Procedures", "Advanced Pelvic Surgery"]
        ],
        [
            'title' => "Uro-Oncology",
            'link' => "uro-oncology.php",
            'icon' => "droplet",
            'description' => "Precision therapies and robotic surgeries for male reproductive tract and urinary system cancers.",
            'image' => "assets/condiotion-images/prostate-cancer.webp",
            'features' => ["Prostate Cancer (SBRT / IMRT)", "Kidney Cancer Management", "Bladder Tumors & Surgery", "Testicular Cancer Protocols"]
        ],
        [
            'title' => "Ocular Oncology",
            'link' => "ocular-oncology.php",
            'icon' => "eye",
            'description' => "Pioneering visual-preservation treatments for eye tumors, intraocular melanomas, and orbital cancers.",
            'image' => "assets/condiotion-images/eye-cancer.webp",
            'features' => ["Retinoblastoma Management", "Uveal Melanoma Therapies", "Plaque Brachytherapy Care", "Vision-Preserving Surgeries"]
        ],
        [
            'title' => "Pediatric Oncology",
            'link' => "pediatric-oncology.php",
            'icon' => "users",
            'description' => "Gentle, dedicated cancer care for children, infants, and adolescents, strictly using pediatric-safe protocols.",
            'image' => "assets/condiotion-images/retinoblastoma-var.webp",
            'features' => ["Childhood Leukemias Care", "Pediatric Proton Therapy", "Brain & Solid Tumors", "Long-term Survivorship Support"]
        ],
        [
            'title' => "Neuro-Oncology",
            'link' => "neuro-oncology.php",
            'icon' => "cpu",
            'description' => "State-of-the-art navigation surgeries and stereotactic radiosurgery for brain and spinal cord tumors.",
            'image' => "assets/condiotion-images/brain-tumour.webp",
            'features' => ["Primary Brain Tumors / Gliomas", "Metastatic Spinal Lesions", "Stereotactic Radiosurgery (SRS)", "Image-Guided Neuro-Navigation"]
        ]
    ];
    ?>

    <section class="pb-12 pt-12 bg-slate-50/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($specialties as $index => $spec): ?>
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 card-hover overflow-hidden flex flex-col h-full">
                        <!-- Image Container with Overlays -->
                        <div class="relative h-56 overflow-hidden">
                            <img src="<?= $spec['image'] ?>" alt="<?= $spec['title'] ?>"
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                        </div>

                        <!-- Content Container -->
                        <div class="p-6 sm:p-8 flex flex-col flex-1">
                            <h3 class="text-2xl font-bold text-medical-dark mb-3 tracking-tight">
                                <?= $spec['title'] ?>
                            </h3>
                            <p class="text-gray-600 mb-6 text-sm sm:text-base leading-relaxed flex-1">
                                <?= $spec['description'] ?>
                            </p>

                            <!-- Key Highlights / Bullet List -->
                            <div class="border-t border-gray-100 pt-5 mt-auto mb-6">
                                <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Key Highlights
                                </h4>
                                <ul class="space-y-2">
                                    <?php foreach ($spec['features'] as $feature): ?>
                                        <li class="flex items-center text-sm text-gray-700 font-medium">
                                            <div
                                                class="w-2 h-2 bg-gradient-to-r from-medical-blue to-medical-blue rounded-full mr-3 shadow-sm">
                                            </div>
                                            <?= $feature ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- CTA Learn More -->
                            <a href="<?= $spec['link'] ?>"
                                class="w-full text-center py-3 bg-medical-blue/5 hover:bg-gradient-to-r hover:from-medical-blue hover:to-medical-blue text-medical-blue hover:text-white rounded-xl font-semibold transition-all duration-300 shadow-sm hover:shadow-md text-sm sm:text-base">
                                Learn More &rarr;
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Consultation CTA Section -->
    <section class="py-16 bg-white border-t border-gray-100 relative">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <div class="inline-flex p-3 bg-medical-blue/10 rounded-2xl text-medical-blue mb-6">
                <i data-feather="calendar" class="w-8 h-8"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-medical-dark mb-4">
                Need a Personalized Treatment Plan?
            </h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto text-lg leading-relaxed">
                Consult with Dr. Vijay Anand Reddy and our multidisciplinary medical boards for customized diagnostics,
                state-of-the-art therapies, and world-class recovery protocols.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="contact.php"
                    class="px-8 py-4 bg-gradient-to-r from-medical-blue to-medical-blue text-white rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all">
                    Book Consultation Now
                </a>
                <a href="tel:+919676720002"
                    class="px-8 py-4 border-2 border-medical-blue/30 text-medical-blue hover:bg-medical-blue/5 rounded-xl font-bold transition-all">
                    Call Support: +91-9676720002
                </a>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
</body>

</html>