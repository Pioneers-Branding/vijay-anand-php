<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <link rel="icon" href="assets/logo/var-favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awards & Recognition - Dr. Vijay Anand Reddy</title>

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#eff6ff', 100: '#dbeafe', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8', 900: '#1e3a8a' },
                        purple: { 50: '#f5f3ff', 100: '#ede9fe', 500: '#8b5cf6', 600: '#7c3aed', 700: '#6d28d9' },
                        medical: { blue: '#9B528F', purple: '#8B5CF6', light: '#F8FAFC', dark: '#1E293B' }
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'], inter: ['Inter', 'sans-serif'] },
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s ease-out; }
        .reveal.active { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body class="bg-white text-gray-800">

    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <section class="pt-40 pb-12 bg-medical-blue/10" style="background-color: rgba(155,82,143,0.1);">
        <div class="max-w-4xl mx-auto px-4 text-center reveal">
            <i data-feather="award" class="w-10 h-10 text-medical-blue mx-auto mb-4" style="color:#9B528F;"></i>
            <h1 class="text-4xl md:text-5xl font-bold text-medical-dark mb-4">Awards & Recognition</h1>
            <p class="text-lg text-gray-700">
                Celebrating milestones in scientific research, patient care and international innovation.
            </p>
        </div>
    </section>

    <!-- Awards Grid -->
    <?php
    $awards = [
        [
            'title' => 'Clinical Pioneer Award',
            'date' => '5th February 2025',
            'event' => 'Apollo Hospitals, Chennai',
            'image' => 'assets/awards/ISOO-2024-Oration.webp',
            'description' => "Deeply humbled and honoured to receive the Clinical Pioneer Award on Apollo Founder's Day. A heartfelt thanks to our Chairman Sir and the Reddy family for recognizing my patient care and Apollo mission dedication."
        ],
        [
            'title' => 'ISOO 2024 Oration',
            'date' => '6th December 2024',
            'event' => 'International Society of Ocular Oncology, Goa',
            'image' => 'assets/awards/AROICON-2024-Gold-Medal – Best-Scientific-Paper.webp',
            'description' => 'Awarded the prestigious ISOO 2024 Oration for contributions to ocular oncology.'
        ],
        [
            'title' => 'Gold Medal – Best Scientific Paper',
            'date' => '1st December 2024',
            'event' => 'AROICON 2024, Mangaluru, INDIA',
            'image' => 'assets/awards/aerocon-2024.webp',
            'description' => 'Prospective open-label study on patient-reported toxicities & QOL in SBRT Prostate for Non-Metastatic Prostate Cancer.'
        ],
        [
            'title' => 'Gold Medal – Best Scientific Paper',
            'date' => '4th December 2022',
            'event' => 'AROICON 2022, New Delhi, INDIA',
            'image' => 'assets/awards/aerocon-2022.webp',
            'description' => 'Feasibility study on extreme hypofractionation in post-operative breast cancer.'
        ],
        [
            'title' => 'Dr. B. D. Gupta Memorial Oration Award',
            'date' => '30th November 2019',
            'event' => '41st AROICON, Ahmedabad, INDIA',
            'image' => 'assets/awards/dr-b.d-gupta.webp',
            'description' => 'For outstanding contribution in the field of Radiation Oncology.'
        ],
        [
            'title' => 'Excellence Award',
            'date' => '11th August 2019',
            'event' => 'Lions Club International in association with Apollo Hospitals',
            'image' => 'assets/awards/Lions-Club-International-Excellence-Award.webp',
            'description' => 'For extraordinary service and contribution to the field of Oncology.'
        ],
        [
            'title' => 'AOS Achievement Award',
            'date' => 'January 2018',
            'event' => 'American Academy of Ophthalmology Society, CA, USA',
            'image' => 'assets/awards/AOS-Achievement-Award.webp',
            'description' => 'For long-term contributions to ophthalmic science.'
        ],
        [
            'title' => 'Legend in the Field of Oncology',
            'date' => '28th February 2017',
            'event' => 'Times Healthcare Achievers Awards, Hyderabad',
            'image' => 'assets/awards/timesHealthcare-award.webp',
            'description' => 'Recognized as "The Legend in the Field of Oncology" at the Times Healthcare Achievers Awards.'
        ],
        [
            'title' => 'Achievement Award',
            'date' => '2013',
            'event' => 'American Academy of Ophthalmology',
            'image' => 'assets/awards/american.webp',
            'description' => 'For many years of distinguished service in the programs of the society.'
        ],
        [
            'title' => 'Best Scientific Poster Award',
            'date' => '29th November 2009',
            'event' => 'AROICON 2009, Hyderabad, INDIA',
            'image' => 'assets/awards/Young-Investigators-Award.webp',
            'description' => 'Histopathology of Retinoblastoma after primary Chemotherapy.'
        ],
        [
            'title' => 'Best Scientific Paper Award',
            'date' => '1996',
            'event' => 'AROICON 1996, Aurangabad, INDIA',
            'image' => 'assets/awards/Best-Scientific-Paper.webp',
            'description' => 'Awarded at the XVIII National Conference of AROI with Dr. K. A. Dinshaw.'
        ],
        [
            'title' => 'Young Scientist Award',
            'date' => '1996',
            'event' => 'Indo-American Cancer Congress, New York, USA',
            'image' => 'assets/awards/Young-Scientist-Award.webp',
            'description' => 'Young Scientist Award with Dr. Kalluri Subrahmanyam & Dr. Chitti R. Moorthy.'
        ],
        [
            'title' => 'Nargis Dutt Memorial Foundation Award',
            'date' => '1995',
            'event' => 'Nargis Dutt Memorial Foundation, New York, USA',
            'image' => 'assets/awards/Nargis-Dutt-Memorial-Foundation-Award.webp',
            'description' => 'Awarded with Dr. Dattetreyudu Nori at New York Hospital.'
        ],
        [
            'title' => 'International Cancer Research Technology Transfer Award',
            'date' => '1992',
            'event' => 'UICC, Geneva, Switzerland',
            'image' => 'assets/awards/International-Cancer-Research-Technology-Transfer-Award.webp',
            'description' => 'With Dr. Margarett Spittle at the Meyerstein Institute of Oncology.'
        ],
        // Awards without images
        [
            'title' => 'Gold Medal – BOA FOCUS 2018',
            'date' => '25th August 2018',
            'event' => 'Bombay Ophthalmologists Association, Mumbai',
            'description' => 'For exemplary work at the FOCUS 2018 conference.'
        ],
        [
            'title' => 'Best Scientific Paper Award',
            'date' => '2015',
            'event' => 'AROICON 2015, Lucknow, INDIA',
            'description' => 'Prospective study of neurocognitive function, QOL, and local control in brain metastases treated with SRS.'
        ],
        [
            'title' => 'Best Scientific Paper Award',
            'date' => '2014',
            'event' => 'AROICON 2014, Imphal, INDIA',
            'description' => 'Prospective observational feasibility study of hypofractionated radiotherapy for localized prostate cancer.'
        ],
        [
            'title' => 'Best Scientific Paper Award',
            'date' => '29th November 2009',
            'event' => 'AROICON 2009, Hyderabad, INDIA',
            'description' => 'Ruthenium 106 Plaque Brachytherapy: Indications and Outcome in Ocular Tumors.'
        ],
        [
            'title' => 'Best Poster Award',
            'date' => '2008',
            'event' => 'American Academy of Ophthalmology, Atlanta, USA',
            'description' => 'Recognized for outstanding poster presentation in ophthalmology.'
        ],
        [
            'title' => 'Young Investigators Award',
            'date' => '2001',
            'event' => 'Eli Lilly & Company, New Delhi, INDIA',
            'description' => 'For early-career innovation in cancer research.'
        ],
        [
            'title' => 'International Cancer Research Technology Transfer Award',
            'date' => '1998',
            'event' => 'UICC, Geneva, Switzerland',
            'description' => 'For contributions to international cancer research technology transfer.'
        ]
    ];
    ?>
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal">
                <?php foreach ($awards as $award): ?>
                <div class="bg-gray-50 border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col">
                    <?php if (!empty($award['image'])): ?>
                    <div class="bg-gray-200 flex items-center justify-center overflow-hidden" style="height:16rem;">
                        <img
                            src="<?= htmlspecialchars($award['image']) ?>"
                            alt="<?= htmlspecialchars($award['title']) ?>"
                            class="w-full h-full object-cover object-top"
                            loading="lazy"
                        />
                    </div>
                    <?php endif; ?>
                    <div class="flex-1 flex flex-col p-6">
                        <h3 class="text-xl font-semibold text-medical-dark mb-2"><?= htmlspecialchars($award['title']) ?></h3>
                        <div class="text-sm font-medium mb-1" style="color:#9B528F;"><?= htmlspecialchars($award['event']) ?></div>
                        <div class="text-xs text-gray-500 mb-2"><?= htmlspecialchars($award['date']) ?></div>
                        <p class="text-gray-700 text-sm"><?= htmlspecialchars($award['description']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Quote Section -->
    <?php $quoteId = 57; include 'quote_section.php'; ?>

    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            feather.replace();

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
