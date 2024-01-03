<!DOCTYPE html>
<html>
    <head>
    <title>online_birth_certificate</title>
    <link rel="stylesheet" type="text/css" href="myStylesheet.css">

    <style>
        /* Style for the slideshow container */
        #slideshow {
            display: flex;
            overflow: hidden;
        }

        /* Style for each slide item */
        .slide {
            flex: 0 0 auto;
            margin-right: 20px; /* Add spacing between slide items */
            animation: slide 6s linear infinite;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        @keyframes slide {
            0%, 100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-100%);
            }
            75% {
                transform: translateX(100%);
            }
        }

        /* Style for slide item images */
        .slide img {
            max-width: 100%; /* Make the images fill the width of the container */
            height: auto; /* Maintain aspect ratio */
        }

        /* Style for slide item headings */
        .slide h2 {
            text-align: center;
        }

            /* Add a media query for screens with a maximum width of 600px */
            @media (max-width: 600px) {
            /* Modify styles for smaller screens here */
            .slide {
                margin-right: 10px; /* Reduce spacing between slide items */
            }
            .slide img {
                max-width: 80%; /* Adjust image size for smaller screens */
            }

            .logo {
                float: none;
                text-align: center;
                margin: 0 auto;
            }

            nav ul {
                flex-direction: column;
            }

            nav ul li {
                margin: 5px 0;
                text-align: center;
            }
             /* Style for the section image */
        .section-image {
            max-width: 100%; /* Make the image responsive */
            height: auto; /* Maintain aspect ratio */
        }
        }

    </style>

    </head>
    <body>
        <header>
            <div class="hero">
                <nav>
                <h2 class="logo">
                <img src="images/homeAffairLogo.jpg" height="90px">
                
                </h2>
                
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="test.html">SERVICES</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="login_functionality.php">LOGIN</a></li>
            
                </ul>
                <button type="button"><a href="Register.php">Get Started</a></button>

                <!-- <a href="MODE.php"><img src="images/dark_mode.png" height="45px" class="dark_mode"></a> -->
            </nav>
            </div>
        </header>
        
        <section></section>
        <aside>
            <br><br><br>
           <div class="aside_div">
            <h1>Apply for birth certificate</h1><br>
            <p>It is easy and fast. Just upload the following documents:</p><br>
            <p>1. Three photocopies of ID from informant</p>  
            <p>2. baptism letter</p>
            <br><br>
            <button type="button"><a href="Register.php">Apply Now</a></button></div>
        </aside>

        <center><h1>Birth Certificate Processes</h1></center><br>
    <div >
        <!-- Slideshow container -->
        <div id="slideshow">
            <!-- Slide 1: Make Application -->
            <div class="slide">
                <img src="images/make_application.jpg" alt="Make Application">
                <h2>Make Application</h2>
            </div>
            <!-- Slide 2: Upload Required Files -->
            <div class="slide">
                <img src="images/uploadfiles.jpg" alt="Upload Required Files">
                <h2>Upload Required Files</h2>
            </div>
            <!-- Slide 3: Get your Certificate -->
            <div class="slide">
                <img src="images/get_certificate.jpg" alt="Get your Certificate">
                <h2>Get your Certificate</h2>
            </div>
        </div>
    </div>
        <footer>
            <div class="footer_container">
            <div>
                <h2>Available Links</h2>
                    <li id="li_footer"><a href="#">HOME</a></li>
                    <li id="li_footer"><a href="test.html">SERVICES</a></li>
                    <li id="li_footer"><a href="#">ABOUT</a></li>
                    <!-- <li id="li_footer"><a href="Register.php">CONTACT</a></li> -->
                    <li id="li_footer"><a href="login_functionality.php">LOGIN</a></li>
            </div>
            <div>
                <h2>Contact Us</h2>
                <form>
                    <textarea type="text" name="message" placeholder="type comments, complaints or recommendations here"
                     id="contact_message"></textarea><br>
                    <button>Submit</button><br>
                </form>
            </div>
            <div>
                <h2>Follow Us</h2>
                <a href="https://www.facebook.com/people/Ministry-of-Home-Affairs-Lesotho/100064795896270/?_rdc=1&_rdr"><img src="images/facebook.png" height="40px"></a><br>
                <img src="images/whatsapp.png" height="40px" >
            </div>
            </div>
            <center><p>Copyright &copy; All Rights Reserved. <br/>
			Developed by MAMONAMOLI(SAUCE) MPOPO</p></center>
        </footer>

        <script>
    // JavaScript to slide the images and headings
    const slideshow = document.getElementById('slideshow');
    const slides = document.querySelectorAll('.slide');
    let slideIndex = 0;

    function slide() {
        slides.forEach((slide, index) => {
            if (index === slideIndex) {
                slide.style.transform = 'translateX(0)';
            } else {
                slide.style.transform = 'translateX(-100%)';
            }
        });

        slideIndex = (slideIndex + 1) % slides.length;
    }

    // Start the sliding process
    slide();
    setInterval(slide, 30000); // Change slide every 3 seconds
</script>

    </body>
</html>