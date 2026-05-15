<?php
$textTestimonials = [
  [
    "name" => "Uday Pepe",
    "image" => "https://lh3.googleusercontent.com/a/ACg8ocKxVyVZZ1tUG8V5YoQzE5QzE5QzE5QzE5QzE5QzE5QzE5=s96-c",
    "rating" => 5,
    "quote" => "One stop for all cancer treatment - doctor holds that crucial communication and support, helping patients and their families understand the diagnosis providing treatment options, prognosis, and how to navigate during treatment. Been to many hospitals across twin cities for mother's treatment and Vijay Anand Reddy sir remains irreplaceable and best one 😊",
    "condition" => "Breast Cancer Survivor"
  ],
  [
    "name" => "Satvinder Saluja",
    "image" => "https://lh3.googleusercontent.com/a/ACg8ocJxVyVZZ1tUG8V5YoQzE5QzE5QzE5QzE5QzE5QzE5QzE5=s96-c",
    "rating" => 5,
    "quote" => "Good treatment with Good precision surgery performed everything 💯 % .I will recommend another patient .he was given Good and best treatment for me he look like to God for me .and all doctors and staff very helpful and 👍 good",
    "condition" => "Lung Cancer Survivor"
  ],
  [
    "name" => "Anitha Kesireddy",
    "image" => "https://lh3.googleusercontent.com/a/ACg8ocKxVyVZZ1tUG8V5YoQzE5QzE5QzE5QzE5QzE5QzE5QzE5=s96-c",
    "rating" => 5,
    "quote" => "Satisfied with the services.Dr.vijay Anand Reddy sir was excellent Doctor.he was talking like family member.we are happy to take treatment here.thanks to Dr.vijay Anand Reddy sir and sir team Doctors and sir supportive assistant s was good corporate thanks to every one He is very concern for the patient, gives hope and confidence.Our whole family owe to him forever thank you very much sir 🙏🙏🙏",
    "condition" => "Head & Neck Cancer Survivor"
  ],
  [
    "name" => "rishika avaldar",
    "image" => "https://lh3.googleusercontent.com/a/ACg8ocJxVyVZZ1tUG8V5YoQzE5QzE5QzE5QzE5QzE5QzE5QzE5=s96-c",
    "rating" => 5,
    "quote" => "Very grateful for Dr. Vijay Anand Reddy and team for successfully treating my moms cervical cancer. Their expertise, care and support helped our family through a very difficult time. Couldn't have asked for better support and treatment.",
    "condition" => "Brain Tumor Survivor"
  ],
  [
    "name" => "kumari daniel",
    "image" => "https://lh3.googleusercontent.com/a/ACg8ocKxVyVZZ1tUG8V5YoQzE5QzE5QzE5QzE5QzE5QzE5QzE5=s96-c",
    "rating" => 5,
    "quote" => "Dr.vijay anand reddy .He is most caring and understanding doctor I have ever met.he really cares about the patient and their health he ever proposes the best solutions for everything he answers simple questions asked by the patient hope he and his family stay safe and happy Thank you",
    "condition" => "Cervical Cancer Survivor"
  ]
];
?>

<section id="testimonials" class="py-8 medical-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Testimonial Slider Container -->
    <div id="testimonial-slider" class="bg-white rounded-2xl shadow-2xl p-4 sm:p-6 md:p-10 mb-8 relative overflow-hidden reveal">

      <!-- Mobile: Horizontal Scroll Cards -->
      <div id="testimonial-cards-mobile" class="flex md:hidden overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 scrollbar-hide">
        <?php foreach($textTestimonials as $index => $testimonial): ?>
        <div class="testimonial-card snap-center flex-shrink-0 w-[85vw] sm:w-[70vw] bg-slate-50 rounded-xl p-5 shadow-md">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-14 h-14 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden flex-shrink-0">
              <img src="https://www.google.com/images/branding/googleg/1x/googleg_standard_color_128dp.png" alt="Google" class="w-8 h-8 object-contain">
            </div>
            <div class="flex-1 min-w-0">
              <h3 class="text-base font-bold text-medical-dark truncate"><?= $testimonial['name'] ?></h3>
              <p class="text-xs text-medical-blue font-medium"><?= $testimonial['condition'] ?></p>
            </div>
          </div>
          <div class="flex space-x-1 mb-3">
            <?php for($i=0; $i<$testimonial['rating']; $i++): ?>
              <i data-feather="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
            <?php endfor; ?>
          </div>
          <p class="text-sm text-gray-600 leading-relaxed line-clamp-4">"<?= $testimonial['quote'] ?>"</p>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Mobile Navigation Dots -->
      <div class="flex md:hidden justify-center mt-4">
        <div class="flex space-x-2">
          <?php foreach($textTestimonials as $i => $t): ?>
          <button onclick="goToTestimonialMobile(<?= $i ?>)" class="testimonial-dot-mobile w-3 h-3 rounded-full transition-all duration-200 <?= $i === 0 ? 'bg-medical-blue' : 'bg-gray-300' ?>" data-index="<?= $i ?>"></button>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Desktop: Original Slider -->
      <div class="hidden md:block">
        <div class="testimonial-slides relative min-h-[350px]">
          <?php foreach($textTestimonials as $index => $testimonial): ?>
          <div class="testimonial-slide absolute inset-0 transition-opacity duration-500 <?= $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' ?>" data-index="<?= $index ?>">
              <div class="grid lg:grid-cols-3 gap-6 lg:gap-8 items-center h-full">
                  <div class="text-center lg:text-left">
                      <div class="relative inline-block mb-4">
                          <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-full bg-gray-200 mx-auto lg:mx-0 shadow-lg flex items-center justify-center overflow-hidden">
                              <img src="https://www.google.com/images/branding/googleg/1x/googleg_standard_color_128dp.png" alt="Google Reviews" class="w-14 h-14 lg:w-16 lg:h-16 object-contain">
                          </div>
                          <div class="absolute -bottom-1 -right-1 bg-green-500 w-7 h-7 lg:w-8 lg:h-8 rounded-full flex items-center justify-center">
                              <i data-feather="heart" class="w-4 h-4 text-white"></i>
                          </div>
                      </div>
                      <h3 class="text-xl lg:text-2xl font-bold text-medical-dark mb-1"><?= $testimonial['name'] ?></h3>
                      <p class="text-medical-blue font-semibold text-sm lg:text-base"><?= $testimonial['condition'] ?></p>
                      <div class="flex justify-center lg:justify-start space-x-1 mt-2">
                          <?php for($i=0; $i<$testimonial['rating']; $i++): ?>
                              <i data-feather="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                          <?php endfor; ?>
                      </div>
                  </div>
                  <div class="lg:col-span-2">
                      <blockquote class="text-lg lg:text-2xl text-gray-700 leading-relaxed italic">
                          "<?= $testimonial['quote'] ?>"
                      </blockquote>
                  </div>
              </div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-center lg:justify-end items-center space-x-3 mt-6 lg:absolute lg:bottom-8 lg:right-8 z-20">
          <button onclick="prevTestimonial()" class="w-11 h-11 lg:w-12 lg:h-12 bg-medical-blue text-white rounded-full flex items-center justify-center hover:bg-opacity-90 transition-colors duration-200 active:scale-95 touch-manipulation">
              <i data-feather="chevron-left" class="w-5 h-5 lg:w-6 lg:h-6"></i>
          </button>

          <div class="flex space-x-2">
              <?php foreach($textTestimonials as $i => $t): ?>
              <button onclick="goToTestimonial(<?= $i ?>)" class="w-3 h-3 rounded-full transition-all duration-200 <?= $i === 0 ? 'bg-medical-blue' : 'bg-gray-300' ?> dot-indicator active:scale-125 touch-manipulation" data-index="<?= $i ?>"></button>
              <?php endforeach; ?>
          </div>

          <button onclick="nextTestimonial()" class="w-11 h-11 lg:w-12 lg:h-12 bg-medical-blue text-white rounded-full flex items-center justify-center hover:bg-opacity-90 transition-colors duration-200 active:scale-95 touch-manipulation">
              <i data-feather="chevron-right" class="w-5 h-5 lg:w-6 lg:h-6"></i>
          </button>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
    // Desktop Slider
    var currentTestimonial = 0;
    var testimonialSlides = document.querySelectorAll('.testimonial-slide');
    var testimonialDots = document.querySelectorAll('.dot-indicator');
    var totalTestimonials = testimonialSlides.length;

    function updateTestimonialSlides() {
        testimonialSlides.forEach(function(slide, index) {
            if (index === currentTestimonial) {
                slide.classList.remove('opacity-0', 'z-0');
                slide.classList.add('opacity-100', 'z-10');
            } else {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'z-0');
            }
        });

        testimonialDots.forEach(function(dot, index) {
            if (index === currentTestimonial) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-medical-blue');
            } else {
                dot.classList.remove('bg-medical-blue');
                dot.classList.add('bg-gray-300');
            }
        });

        if(typeof feather !== 'undefined') feather.replace();
    }

    function nextTestimonial() {
        currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
        updateTestimonialSlides();
    }

    function prevTestimonial() {
        currentTestimonial = (currentTestimonial - 1 + totalTestimonials) % totalTestimonials;
        updateTestimonialSlides();
    }

    function goToTestimonial(index) {
        currentTestimonial = index;
        updateTestimonialSlides();
    }

    // Mobile Horizontal Scroll
    var mobileCards = document.getElementById('testimonial-cards-mobile');
    var mobileDots = document.querySelectorAll('.testimonial-dot-mobile');

    function goToTestimonialMobile(index) {
        if (mobileCards) {
            var cards = mobileCards.querySelectorAll('.testimonial-card');
            if (cards[index]) {
                cards[index].scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }
        }
        mobileDots.forEach(function(dot, i) {
            if (i === index) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-medical-blue');
            } else {
                dot.classList.remove('bg-medical-blue');
                dot.classList.add('bg-gray-300');
            }
        });
    }

    // Update mobile dots on scroll
    if (mobileCards) {
        mobileCards.addEventListener('scroll', function() {
            var cards = mobileCards.querySelectorAll('.testimonial-card');
            var scrollLeft = mobileCards.scrollLeft;
            var cardWidth = cards[0] ? cards[0].offsetWidth + 16 : 0;
            var currentIndex = Math.round(scrollLeft / cardWidth);
            mobileDots.forEach(function(dot, i) {
                if (i === currentIndex) {
                    dot.classList.remove('bg-gray-300');
                    dot.classList.add('bg-medical-blue');
                } else {
                    dot.classList.remove('bg-medical-blue');
                    dot.classList.add('bg-gray-300');
                }
            });
        });
    }

    if(typeof feather !== 'undefined') feather.replace();
</script>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .line-clamp-4 {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .touch-manipulation {
        touch-action: manipulation;
    }
</style>