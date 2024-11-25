
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACICSTANCE CORNER - Home</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #4d99d3, #dedeeddc);
            color: #fff;
            overflow-x: hidden;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            position: fixed;
            width: 100%;
            top: 0;
            background: rgba(0, 0, 0, 0.8);
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 10;
            transition: background 0.3s;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            margin-left: 20px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: #00aaff;
        }

        /* Hero Section Enhancements */
        .hero {
            position: relative;
            height: 100vh;
            background: url('your-background-image.jpg') no-repeat center center/cover; /* Add a background image for a professional look */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6); /* Dark overlay for text readability */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 20px;
        }

        .hero-content {
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 700;
            line-height: 1.2;
            text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.7);
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 40px;
            line-height: 1.6;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .cta-button {
            background-color: #2f82e7;
            border: none;
            padding: 15px 40px;
            font-size: 1.2rem;
            color: #ffffff;
            border-radius: 30px;
            cursor: pointer;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s, transform 0.3s;
        }

        .cta-button:hover {
            background-color: #4ac1ec;
            transform: translateY(-5px);
        }


        .about {
            padding: 80px 50px;
            text-align: center;
        }

        .about h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .about p {
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .officers {
            padding: 80px 60px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            margin-top: 50px;
            margin-bottom: 40px; /* Add space below the officers section */
        }

        .officers h2 {
            font-size: 2.8rem;
            margin-bottom: 40px;
            color: #2fb7f6;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        .officers .officer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-items: center;
        }

        .officer {
            background-color: #26ace1;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 400px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .officer:hover {
            transform: translateY(-10px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4);
        }

        .officer img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
        }

        .officer h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .officer p {
            font-size: 1rem;
        }

        .subjects {
            padding: 80px 50px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            margin-top: 40px; /* Optionally add space at the top of the services section */
        }

        .subjects .heading {
            font-size: 2.8rem;
            margin-bottom: 20px;
            color: #2fb7f6;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            margin-top: 10px;
        }

        .box {
            background-color: #26ace1;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 320px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .box:hover {
            transform: translateY(-10px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        }

        .box img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .box h3 {
            font-size: 1.5rem;
            margin: 15px 0 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .box p {
            font-size: 1rem;
            font-weight: bold;
            text-transform: capitalize;
        }

        footer {
            background: rgba(0, 0, 0, 0.8);
            text-align: center;
            padding: 40px 0;
            margin-top: 50px;
            box-shadow: 0px -5px 15px rgba(0, 0, 0, 0.2);
        }

        footer p {
            font-size: 0.9rem;
        }

        .feedback-section {
            padding: 80px 50px;
            text-align: center;
            background-color: #f4f4f4;
            color: #333;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .feedback-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #2f82e7;
        }

        .star-rating {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        
        .star {
            font-size: 2.5rem;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s, transform 0.3s;
        }
        
        .star.selected,
        .star.hover {
            color: #FFD700;
            transform: scale(1.2);
        }
        

        .feedback-form textarea {
            width: 100%;
            max-width: 600px;
            padding: 15px;
            margin: 15px 0;
            height: 120px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: inset 0px 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
        }

        .feedback-form button {
            padding: 12px 25px;
            background-color: #2f82e7;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
            
        }

        .feedback-form button:hover {
            background-color: #3fb8f0;
            transform: translateY(-3px);
        }

        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #2f82e7;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            display: none;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
        }

        #backToTop:hover {
            background-color: #3fb8f0;
            transform: translateY(-5px);
        }
    </style>
    <style>
        .officers {
            text-align: center;
            padding: 20px;
        }
    
        .officer-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
    
        .officer {
            text-align: center;
            max-width: 300px;
        }
    
        .officer img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
    
        .button-container {
            margin-top: 20px;
        }
    
        .button-container button {
            padding: 5px 10px;  /* Reduced padding */
            font-size: 0.5rem;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    
        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <h1>ACICSTANCE CORNER</h1>
        <div>
            <a href="#about">About</a>
            <a href="#officers">Officers</a>
            <a href="#subjects">Services</a>
            <a href="#feedback">Feedback</a>
        </div>
    </div>

    <!-- Hero Section -->
<section class="hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>Welcome to the ACICSTANCE Corner!</h1>
            <p>
                Your one-stop destination for student support and resources. The College of Informatics and Computing Sciences Alangilan Student Council is dedicated to helping fellow students achieve academic and personal excellence. Explore our range of free services tailored specifically for CICS students!
            </p>
            <button class="cta-button" onclick="window.location.href='#subjects'">Explore Our Services</button>
        </div>
    </div>
</section>

    <!-- Officers Section -->
    <section id="officers" class="officers">
        <h2>CICS STUDENT ORGANIZATION ADVISER</h2>
        <div class="officer-container">
            <div class="officer">
                <img src="officer1.jpg" alt="Officer 1">
                <h3>Arjonel Mendoza</h3>
                <p>Adviser</p>
            </div>
        </div>
        <!-- Meet Our Officers Button -->
        <div class="button-container">
            <a href='officer.php' class="cta-button">MEET OUR OFFICERS</a>

        </div>
    </section>  
      

    <!-- Services Section -->
    <section id="subjects" class="subjects">
        <h2 class="heading">Our Services</h2>
        <div class="box-container">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScGTDdtT4tVdsZrnuftdkFVaiy6-wq1am7tW5pof9eHYcT_rw/viewform" class="box">
                <div class="box-content">
                    <img src="https://github.com/user-attachments/assets/1537a17e-ff2f-4e31-aae4-d28cc3d2ec1b" alt="Printing Services">
                    <p>Printing Services</p>
                </div>
            </a>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdXnyscZNdmXqOuL7C6zJqR5LdsJtzFEOepK2Tnq5OwdYHKCg/viewform" class="box">
                <div class="box-content">
                    <img src="https://github.com/user-attachments/assets/3ddc67db-d6c5-49ad-899d-f82169dd5152" alt="Sports Materials Rental">
                    <p>Sports Materials Rental</p>
                </div>
            </a>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSeby6R05DE4L-KRcGMcgZk_1MMOrRkz6dLPc3cvN2tzwFpfjw/viewform" class="box">
                <div class="box-content">
                    <img src="https://github.com/user-attachments/assets/b86b3202-de26-40aa-acbe-c0d9d91bdb18" alt="School Supplies">
                    <p>School Supplies</p>
                </div>
            </a>
        </div>
    </section>
        </div>
    </section>
    <!-- Feedback Section -->
    <style>
        .feedback-form {
            text-align: center;
        }
    
        .feedback-form textarea {
            width: 100%;
            max-width: 600px;
            padding: 15px;
            margin: 15px 0;
            height: 120px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: inset 0px 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
        }
    
        .feedback-form button {
            padding: 12px 25px;
            background-color: #2f82e7;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
            margin-top: 10px;
        }

            .feedback-form {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        
            .feedback-form textarea {
                width: 100%;
                max-width: 600px;
                padding: 15px;
                margin: 15px 0;
                height: 120px;
                border: 1px solid #ddd;
                border-radius: 10px;
                box-shadow: inset 0px 2px 5px rgba(0, 0, 0, 0.1);
                font-size: 1rem;
                resize: none; /* Prevent resizing */
            }
            
        
            .feedback-form button {
                padding: 12px 25px;
                background-color: #2f82e7;
                color: white;
                border: none;
                border-radius: 25px;
                cursor: pointer;
                box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
                transition: background-color 0.3s, transform 0.3s;
                margin-top: 10px;
            }
        
            .feedback-form button:hover {
                background-color: #3fb8f0;
                transform: translateY(-3px);
            }
        </style>
        
        <section class="feedback-section" id="feedback">
            <h2>We Value Your Feedback</h2>
            <div class="star-rating">
                <span class="star" onclick="rate(1)">&#9733;</span>
                <span class="star" onclick="rate(2)">&#9733;</span>
                <span class="star" onclick="rate(3)">&#9733;</span>
                <span class="star" onclick="rate(4)">&#9733;</span>
                <span class="star" onclick="rate(5)">&#9733;</span>
            </div>
            <div class="feedback-form">
                <textarea id="feedbackComment" placeholder="Leave your comments here..."></textarea>
                <button onclick="submitFeedback()">Submit Feedback</button>
                <div id="confirmationMessage" class="confirmation"></div>
            </div>
        </section>
        


    <!-- Back to Top Button -->
    <button id="backToTop" onclick="scrollToTop()">Back to Top</button>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 ACICSTANCE CORNER. All rights reserved.</p>
        <div style="margin-top: 20px;">
            <a href="https://facebook.com" target="_blank" style="margin: 0 10px; color: #fff;">Facebook</a>
            <a href="https://twitter.com" target="_blank" style="margin: 0 10px; color: #fff;">Twitter</a>
            <a href="https://instagram.com" target="_blank" style="margin: 0 10px; color: #fff;">Instagram</a>
        </div>
    </footer>

    <script>
        // Smooth scroll to top
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Show/Hide "Back to Top" button
        window.onscroll = function() {
            const backToTopButton = document.getElementById('backToTop');
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                backToTopButton.style.display = "block";
            } else {
                backToTopButton.style.display = "none";
            }
        };

        // Star Rating Logic
        let selectedRating = 0;
        function rate(starNumber) {
            selectedRating = starNumber;
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < starNumber) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }

        // Feedback Form Submission
        function submitFeedback() {
            const comment = document.getElementById('feedbackComment').value;

            if (selectedRating === 0) {
                alert('Please select a star rating before submitting!');
                return;
            }

            // Here you would handle the form submission, like sending data to a server
            console.log('Feedback submitted:', { rating: selectedRating, comment });

            // Show confirmation message
            document.getElementById('confirmationMessage').textContent = 'Thank you for your feedback!';
            
            // Reset form and rating
            document.getElementById('feedbackComment').value = '';
            selectedRating = 0;
            const stars = document.querySelectorAll('.star');
            stars.forEach(star => star.classList.remove('selected'));
        }
    </script>
    <script>
        function redirectToOfficersPage() {
            // Replace 'officers.html' with the URL of the page you want to open
            window.location.href = 'officers.html';
        }
    </script>
    
    
</body>

</html>
