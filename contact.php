<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/grid.css" />
  <title>Contact Section</title>
</head>

<body>
  <header>
    <div class="header-sec grid-con">
      <nav class="navigation col-span-full l-col-start-">
        <picture>
          <source srcset="images/Logo.svg" media="(min-width: 474px)" />
          <img src="images/logo-mobile.svg" alt="wisdom logo" />
        </picture>

        <ul class="sidebar" id="desk-hid">
          <li>
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                fill="#e8eaed">
                <path
                  d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
              </svg></a>
          </li>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.html">About Me</a></li>
          <li><a href="project.php">Projects</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>

        <ul>
          <li class="hidemobile"><a href="index.php">Home</a></li>
          <li class="hidemobile"><a href="about.html">About Me</a></li>
          <li class="hidemobile"><a href="project.php">Projects</a></li>
          <li class="hidemobile"><a href="contact.php">Contact</a></li>
          <li class="hideondesktop">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                fill="#000">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section class="grid-con main-sec" id="contact-head">
      <div class="col-span-full l-col-start-1 l-col-span-9 hero-text">
        <h1>Let's <br><span class="gradient-text">Connect</span></h1>
      </div>
    </section>

    <section class="contact-form grid-con">
      <form method="post" action="sendmail.php" class="form col-span-full l-col-start-1 l-col-span-8">
        <div class="jon-doe">
          <div class="jon-p">
            <p>01</p>
            <p>Whats Your name</p>
          </div>

          <input type="text" name="name" placeholder="John Doe*" required>
          <label for=""></label>
        </div>

        <div class="jon-doe">
          <div class="jon-p">
            <p>02</p>
            <p>Whats Your name</p>
          </div>

          <input type="email" name="email" placeholder="John@Doe.com" required>
          <label for=""></label>
        </div>

        <div class="jon-doe">
          <div class="jon-p">
            <p>03</p>
            <p>What services are you looking for?</p>
          </div>
          <input type="text" name="services" placeholder="UI/UX Design, Web Development ... *" required>
          <label for=""></label>
        </div>

        <div class="jon-doe">
          <div class="jon-p">
            <p>04</p>
            <p>Your message</p>
          </div>

          <input type="text" name="message" placeholder="Hello Wisdom, can you help me ... *" required>
          <label for=""></label>
        </div>

        <div class="form-btn">
          <div class="underline-con">
          </div>
          <input type="submit" value="Send" class="send">
        </div>
      </form>

      <section class="contact-ref col-span-full l-col-start-9 l-col-span-4">
        <div class="cat-image">
          <img src="images/contact-eclipse.png" alt="">
        </div>
        <div class="contact-info">
          <h2>CONTACT</h2>
          <p>okutepa@gmail.com</p>
          <p>+1 437 566 0485</p>
        </div>
      </section>
    </section>


  </main>

  <footer class="contact-foot">
    <div class="grid-con foot">
      <div class="col-span-full foot-content">
        <h5>Connect</h5>
        <h2>Let’s create your next big idea.</h2>
        <button class="btn">Get in touch</button>

        <nav class="footer-nav">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About me</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>

        <p>© 2024 Wisdom</p>
      </div>
    </div>
  </footer>

  <script src="js/main.js"></script>
</body>

</html>