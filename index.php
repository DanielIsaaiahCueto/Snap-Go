<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snap&Go</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/landing/logo.png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="./assets/css/landing.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
    
    <div class="navbar">
        <div class="container">
            <a href="#" class="brand"><img src="./assets/images/landing/logo.png" alt="logo" id="logo">Snap&Go</a>
            <ul class="nav-links">
                <li class="active"><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#work">Work</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
                <li><a href="login.php">Log In</a></li>
            </ul>   
        </div>
        <div class="hamburger">
            <i></i>
            <i></i>
        </div>
    </div>

    <div id="home">
        <div class="containers">
            <i><h1 class="heading-xl">Brgy. Sambat</h1></i>
        </div>
    </div>

    <section id="services">
        <div class="container">
            <div class="section-intro" data-aos="fade-up">
                <h1 class="heading-2">Our Services</h1>
            </div>
            <div class="grid three-col-grid">
                <div class="service" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon"><i class="las la-stethoscope"></i></div>
                    <div class="heading-3">Patient Management</div>
                    <p>Snap&Go facilitates efficient patient management by maintaining detailed electronic health records. It includes personal information, medical history, and treatment plans, ensuring quick access to critical information during consultations and emergencies.</p>
                </div>
                <div class="service" data-aos="fade-up" data-aos-delay="600">
                    <div class="icon"><i class="las la-calendar-check"></i></div>
                    <div class="heading-3">Appointment Scheduling</div>
                    <p>The system streamlines the appointment scheduling process, allowing residents to book appointments online or through designated community centers. This reduces waiting times and enhances the overall efficiency of health services.</p>
                </div>
                <div class="service" data-aos="fade-up" data-aos-delay="900">
                    <div class="icon"><i class="las la-qrcode"></i></div>
                    <div class="heading-3">QR Code Integration</div>
                    <p>The integration of QR code scanning technology enhances the accuracy and speed of data retrieval. Each patient is assigned a unique QR code that contains essential medical information, ensuring prompt access to their records during various health-related activities.</p>
                </div>
                <div class="service" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon"><i class="las la-chalkboard-teacher"></i></div>
                    <div class="heading-3">Health Education and Awareness</div>
                    <p>Snap&Go includes features for disseminating health information and educational resources to the community. This promotes awareness of preventive healthcare measures and encourages a healthier lifestyle among residents.</p>
                </div>
                <div class="service" data-aos="fade-up" data-aos-delay="600">
                    <div class="icon"><i class="las la-laptop-medical"></i></div>
                    <div class="heading-3">Electronic Medical Records</div>
                    <p>Snap&Go digitizes medical records, promoting paperless workflows within the Barangay Health Unit. This results in better organization, reduced errors, and improved accessibility for healthcare providers.</p>
                </div>
                <div class="service" data-aos="fade-up" data-aos-delay="900">
                    <div class="icon"><i class="las la-chart-bar"></i></div>
                    <div class="heading-3">Reporting and Analytics</div>
                    <p>The system generates comprehensive reports and analytics to aid decision-making at the community and healthcare administration levels. Data-driven insights help identify health trends, allocate resources efficiently, and plan for future healthcare needs.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="work">
        <div class="container">
            <div class="section-intro" data-aos="fade-up">
                <h1 class="heading-2">Our Recent Work</h1>
            </div>
            <a href="#" class="grid two-col-grid">
                <div class="project" data-aos="zoom-in" data-aos-delay="300">
                    <img src="./assets/images/landing/project-1.jpg" alt="project-1">
                    <div class="overlay">
                        <div>
                            <h2 class="heading-3">Breast Cancer Awareness Lecture</h2>
                            <p><i>Nagsagawa ang Health Education and Promotion Unit (HEPU) ng San Pascual ng Breast Cancer Awareness lecture sa Barangay Laurel upang patuloy na mapalaganap ang kaalaman, maanyayahan makapagpa-checkup, mapuksa ang stigma ukol sa Breast Cancer.
                                Sa pagtutulungan nating lahat, let us Breast-BEAT-Cancer!</i></p>
                        </div>
                    </div>
                </div>
                <div class="project" data-aos="zoom-in" data-aos-delay="600">
                    <img src="./assets/images/landing/project-2.jpg" alt="project-2">
                    <div class="overlay">
                        <div>
                            <h2 class="heading-3">Free PPD Testing</h2>
                            <p><i>Matagumpay ang isinagawang libreng PPD testing sa mga bata na ginanap sa San Pascual RHU. Bahagi ng ating programang pangkalusugan laban sa Tuberkulosis. Maraming salamat sa lahat ng nakiisa sa programa.</i></p>
                        </div>
                    </div>
                </div>
                <div class="project" data-aos="zoom-in" data-aos-delay="900">
                    <img src="./assets/images/landing/project-3.jpg" alt="project-3">
                    <div class="overlay">
                        <div>
                            <h2 class="heading-3">First Aid Training</h2>
                            <p><i>Dumaan sa pagasasanay ang unang batch ng mga health staff sa Basic Life Support at First Aid Training para mas mapalawak ang kaalaman pagdating sa health emergency situations at response. 
                                Maraming salamat sa Philippine Red Cross Batangas Chapter sa pagbabahagi ng kaalaman sa ating mga kasamahan.</i></p>
                        </div>
                    </div>
                </div>
                <div class="project" data-aos="zoom-in" data-aos-delay="1200">
                    <img src="./assets/images/landing/project-4.jpg" alt="project-4">
                    <div class="overlay">
                        <div>
                            <h2 class="heading-3">Blood-letting Activity</h2>
                            <p><i>Blood letting activity sa covered court ng Brgy. Sambat na inorganisa ng Tau Gamma/Triskelion San Pascual kapartner ang Batangas Medical Center at San Pascual RHU. Makiisa at ibahagi ang biyaya ng buhay.</i></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section id="contact-us">
        <div class="container">
            <div class="grid">
                <div class="contact-info" data-aos="fade-up">
                    <div class="section-intro">
                        <h1 class="heading-2">Contact Info</h1>
                    </div>
                    <div class="contact-widget">
                        <h3 class="heading-3">Email</h3>
                        <ul>
                            <li>sambat.bhu@gmail.com</li>
                            <li>san-pascual.rhu@gmail.com</li>
                        </ul>
                    </div>
                    <div class="contact-widget">
                        <h3 class="heading-3">Phone</h3>
                        <ul>
                            <li>+639123456789</li>
                            <li>+639123456789</li>
                        </ul>
                    </div>
                    <div class="contact-widget">
                        <h3 class="heading-3">Location</h3>
                        <ul>
                            <li>Brgy. Sambat, San Pascual, Batangas, Philippines</li>
                        </ul>
                    </div>
                </div>
                <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                    <div class="section-intro">
                        <h1 class="heading-2">Drop us a line</h1>
                    </div>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-input" placeholder="Juan Dela Cruz">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" placeholder="juandelacruz@gmail.com">
                        </div>
                        <div class="form-group">
                            <textarea name="" rows="5" class="form-input" placeholder="Message here..."></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>Copyright @ 2023. All rights are reserved.</p>
            <div class="social-icons">
                <a href="#"><i class="lab la-twitter"></i></a>
                <a href="#"><i class="lab la-facebook"></i></a>
                <a href="#"><i class="lab la-youtube"></i></a>
                <a href="#"><i class="lab la-telegram"></i></a>
            </div>
        </div>
    </footer>

    <script src="./assets/js/landing.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>