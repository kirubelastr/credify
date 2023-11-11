<!DOCTYPE html>
<html>
<head>
  <title>National Document Verification System</title>
  <link rel="stylesheet" href="style_index.css">
</head>
<body>
  <header>
  <div class="header-title">NDVS</div>
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="login.php">Account</a></li>
      </ul>
    </nav>
  </header>
  
  <main>
  <h1 style="margin: 0;">እንኳን ወደ ሰነድ ማረጋገጫ መጡ!!!</h1>
  <h1 style="margin: 0;">Welcome to the National Document Verification System</h1>
    <h4 style="margin: 50px 0;">Our verification system ensures availability and reliability.</h4>
  <section id="home" >
    <video  autoplay muted loop>
        <source src="images/intro.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="floating-text" >Verify with Confidence</div>
</section>

    <section id="about" class="about">
      <h2>About Us</h2>
      <p>At the National Document Verification System, we are dedicated to providing seamless and secure document verification services. Our mission is to empower individuals and organizations with accurate and trustworthy document validation solutions. With cutting-edge technology and a team of experts, we ensure the authenticity of your credentials, making the verification process efficient and hassle-free. Join us in building a world where trust is upheld and credibility is paramount.</p>
    </section>
    
    <section id="services">
      <h2>Our Services</h2>
      <div class="services">
        <div class="service">
          <img src="images/a.jpeg" alt="Degree Verification">
          <h3>Degree Verification</h3>
          <p>Verify your degree documents with our advanced verification system. We ensure the credibility and authenticity of your academic achievements. <a class="service-link" href="#degree-verification-details">Learn More</a></p>
        </div>
        <div class="service">
          <img src="images/b.jpeg" alt="Diploma Verification">
          <h3>Diploma Verification</h3>
          <p>Validate your diploma certificates hassle-free. Our system guarantees accurate and quick validation, saving you time and effort. <a class="service-link" href="#diploma-verification-details">Learn More</a></p>
        </div>
        <div class="service">
          <img src="images/c.jpeg" alt="Tempo Authentication">
          <h3>Tempo Document Verification</h3>
          <p>Fast and reliable verification for tempo documents. Trust our secure platform for accurate results, ensuring the integrity of your official papers. <a class="service-link" href="#tempo-authentication-details">Learn More</a></p>
        </div>
        <div class="service">
          <img src="images/d.jpeg" alt="File Verification">
          <h3>File Verification</h3>
          <p>Securely verify various types of files and documents with our state-of-the-art verification system. Protect your business from fraud and ensure document integrity. <a class="service-link" href="#file-verification-details">Learn More</a></p>
        </div>
      </div>
    </section>

    <section id="contact" class="animated fadeInUp">
      <h2>Contact Us</h2>
      <p>If you have any questions or need assistance, our support team is here to help. Reach out to us via email at <a href="mailto:support@example.com">support@example.com</a> or give us a call at <a href="tel:+123456789">+1 (234) 567-89</a>. We are committed to providing exceptional customer service and ensuring your satisfaction.</p>
    </section>
    </main>

<div class="subscription-popup" id="subscriptionPopup">
  <div class="popup-content">
    <h2>Special Offer!</h2>
    <p>Subscribe now and get a 40% discount on our verification services!</p>
    <div class="close-popup" id="closePopup">Close</div>
  </div>
</div>

<footer>
  © 2023 National Document Verification System. All rights reserved.
</footer>

<script>
  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();

      const targetId = this.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);

      window.scrollTo({
        top: targetElement.offsetTop,
        behavior: 'smooth'
      });
    });
  });

  // Parallax effect for the background image
  window.addEventListener('scroll', function() {
    const scrollY = window.scrollY;
    const parallaxElement = document.querySelector('.home-background');
    parallaxElement.style.backgroundPositionY = -scrollY * 0.5 + 'px';
  });

  // Subscription popup functionality
  const subscriptionPopup = document.getElementById('subscriptionPopup');
  const closePopupButton = document.getElementById('closePopup');

  // Show popup after 5 seconds
  setTimeout(function() {
    subscriptionPopup.style.display = 'flex';
  }, 5000);

  // Close popup when close button is clicked
  closePopupButton.addEventListener('click', function() {
    subscriptionPopup.style.display = 'none';
  });
</script>
</body>
</html>