

<!DOCTYPE html>
<html lang="en">

<?php
require_once('includes/connect.php');

// Query to fetch data
$query = "
    SELECT 
        p.project_id, 
        p.title, 
        m.file_path AS file_path,
        m.media_id
    FROM projects p
    LEFT JOIN media m 
    ON p.project_id = m.project_id
    WHERE p.project_id IN (1, 2, 3, 4)
    AND m.media_type = 'desktop'
    ORDER BY p.project_id ASC, m.media_id ASC;
";

$result = mysqli_query($connect, $query);

if (!$result) {
    die("Error fetching projects: " . mysqli_error($connect));
}

// Group images by project
$projects = [];
while ($row = mysqli_fetch_assoc($result)) {
    $projects[$row['project_id']][] = $row;
}

// Assign specific projects
$zima_images = $projects[1] ?? [];
$hilite_images = $projects[3] ?? [];
$ceci_image = $projects[4][0] ?? null;
$hackathon_image = $projects[2][0] ?? null;
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/grid.css" />
  <link rel="stylesheet" href="css/main.css" />
  <title>Portfolio Homepage</title>
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
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About Me</a></li>
          <li><a href="project.php">Projects</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>

        <ul>
          <li class="hidemobile"><a href="index.html">Home</a></li>
          <li class="hidemobile"><a href="about.html">About Me</a></li>
          <li class="hidemobile"><a href="project.php"></a></li>
          <li class="hidemobile"><a href="contact.html">Contact</a></li>
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
    <section>
      <div class="grid-con">
        <div class="heading col-span-full l-col-start-3 l-col-span-8">
          <h1>
            Creative <br />
            <span class="gradient-text">Ui/Ux designer</span>
          </h1>
          <h4>
            A UI/UX designer who’s passionate about creating visually
            appealing and User friendly digital experiences.
          </h4>
        </div>
      </div>
    </section>

    <section class="project-display">
      <div class="grid-con projects">
        <div class="col-span-full description">
          <p>(Recent work)</p>
          <div class="underline"></div>
          <p>(Selected work)</p>
        </div>

        <!-- Zima Project -->
      <?php if (!empty($zima_images)): ?>
        <a href="case-study.php?id=1" class="col-span-full l-col-start-1 l-col-span-7 image-box box">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($zima_images[0]['file_path']); ?>" media="(min-width: 474px)">
                <img src="images/<?php echo htmlspecialchars($zima_images[0]['file_path']); ?>" alt="Image for Zima Case Study">
            </picture>
        </a>
        <?php if (isset($zima_images[1])): ?>
            <a href="case-study.php?id=1" class="col-span-full l-col-start-8 l-col-span-5 image-box box">
                <picture>
                    <source srcset="images/<?php echo htmlspecialchars($zima_images[1]['file_path']); ?>" media="(min-width: 474px)">
                    <img src="images/<?php echo htmlspecialchars($zima_images[1]['file_path']); ?>" alt="Image for Zima Case Study">
                </picture>
            </a>
        <?php endif; ?>
      <?php endif; ?>
      <div class="col-span-full description">
          <p>(Recent work)</p>
          <p>(Recent work)</p>
        </div>


        <div class="col-span-full l-col-start-2 l-col-span-9 mission">
          <div class="background" id="stubborn">
            <p>
              As an experienced UX designer, I have a deep understanding of
              creating user-centered digital products and services that provide
              exceptional user experiences.
            </p>

            <p>
              My design process is rooted in empathy, research, and a
              data-driven approach to ensure every solution I craft resonates
              with end-users.
            </p>
          </div>
        </div>

        <?php if (!empty($hilite_images)): ?>
        <a href="case-study.php?id=3" class="col-span-full l-col-start-1 l-col-span-7 image-box box">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($hilite_images[0]['file_path']); ?>" media="(min-width: 474px)">
                <img src="images/<?php echo htmlspecialchars($hilite_images[0]['file_path']); ?>" alt="Image for Zima Case Study">
            </picture>
        </a>
        <?php if (isset($hilite_images[1])): ?>
            <a href="case-study.php?id=3" class="col-span-full l-col-start-8 l-col-span-5 image-box box">
                <picture>
                    <source srcset="images/<?php echo htmlspecialchars($hilite_images[1]['file_path']); ?>" media="(min-width: 474px)">
                    <img src="images/<?php echo htmlspecialchars($hilite_images[1]['file_path']); ?>" alt="Image for Zima Case Study">
                </picture>
            </a>
        <?php endif; ?>
      <?php endif; ?>
      <div class="col-span-full description">
          <p>(Recent work)</p>
          <p>(Recent work)</p>
        </div>



        <?php if (!empty($hackathon_image)): ?>
    <a href="case-study.php?id=2" class="col-span-full image-box box">
        <picture>
            <source srcset="images/<?php echo htmlspecialchars($hackathon_image['file_path']); ?>" media="(min-width: 474px)">
            <img src="images/<?php echo htmlspecialchars($hackathon_image['file_path']); ?>" alt="Image for Hackathon Case Study">
        </picture>
    </a>
    <?php endif; ?>
        <div class="col-span-full description">
          <p>(Recent work)</p>
          <p>(Recent work)</p>
        </div>

        <button class="col-span-full l-col-start-5 l-col-span-4 projects-btn">More projects</button>
      </div>
    </section>


    <div class="dark-bg">
      <section>
        <div class="grid-con">
          <section id="player-container" class="col-span-full">
            <video class="player" controls data-poster="images/placeholder.jpg">
              <source src="video/wisdom_okutepa_demoreel.mp4" type="video/mp4">
              <source src="video/wisdom_okutepa_demoreel.webm" type="video/webm">
              <p>Your browser does not support the video tag.</p>
            </video>
          </section>
        </div>
      </section>

      <section class="services">
        <div class="grid-con">
          <div class="col-span-full services-0">
            <h2>Services</h2>

            <div class="divisor"></div>

          </div>

          <div class="col-span-full services-1">
            <h3 class="drop">01</h3>
            <h3>UI design / UX design</h3>
            <p>
              If you already have a design language in place, I'll seamlessly integrate it into your digital
              experience. If it's still in development, I'll guide the art direction while crafting the homepage. All
              designs are tailored for both desktop and mobile, ensuring a cohesive and responsive user experience.
            </p>
          </div>

          <div class="divisor col-span-full"></div>

          <div class="col-span-full services-1">
            <h3 class="drop">02</h3>
            <h3>Web development / Web design</h3>
            <p>
              Whether you're starting from scratch or looking to revamp an existing site, I'll handle the entire process
              from concept to deployment. I'll ensure your website is not only visually engaging but also functionally
              robust, with seamless integration across desktop and mobile platforms.
            </p>
          </div>

          <div class="divisor col-span-full"></div>

          <div class="col-span-full l-col-start-3 l-col-span-8 quote">
            <h4>Good design is not just about how it looks; it's about how it works. When done right, design transcends
              aesthetics and becomes an experience that empowers users, drives engagement, and creates lasting
              connections.
            </h4>
          </div>
        </div>
      </section>
    </div>





  </main>
  <footer>
    <div class="grid-con foot">
      <div class="col-span-full foot-content">
        <h5>Connect</h5>
        <h2>Let’s create your next big idea.</h2>
        <button class="btn">Get in touch</button>

        <nav class="footer-nav">
          <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About me</a></li>
            <li><a href="">Projects</a></li>
            <li><a href="">Contact</a></li>
          </ul>
        </nav>

        <p>© 2024 Wisdom</p>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@latest/bundled/lenis.min.js"></script>
  <script>
    const lenis = new Lenis()
    lenis.on('scroll', (e) => {
      console.log(e)
    })

    function raf(time) {
      lenis.raf(time)
      requestAnimationFrame(raf)
    }

    requestAnimationFrame(raf)

  </script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
  <script src="js/main.js"></script>
</body>

</html>