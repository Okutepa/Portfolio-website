<?php
require_once('includes/connect.php');

// Validate the database connection
if (!$connect) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get and sanitize the project ID from the URL
$project_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Query to fetch project details
$project_query = "SELECT * FROM projects WHERE project_id = $project_id";
$project_results = mysqli_query($connect, $project_query);

if (mysqli_num_rows($project_results) > 0) {
    $project = mysqli_fetch_assoc($project_results); // Fetch the project data
} else {
    echo "Invalid project selected. Please return to the <a href='projects.html'>Projects page</a>.";
    exit; // Stop further execution
}

// Query to fetch images for the project
$image_query = "SELECT * FROM media WHERE project_id = $project_id";
$image_results = mysqli_query($connect, $image_query);
$images = mysqli_fetch_all($image_results, MYSQLI_ASSOC);

// Group images by media_type
$desktop_images = [];
$mobile_images = [];
foreach ($images as $image) {
    if ($image['media_type'] === 'desktop') {
        $desktop_images[] = $image['file_path'];
    } elseif ($image['media_type'] === 'mobile') {
        $mobile_images[] = $image['file_path'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/grid.css" />
    <link rel="stylesheet" href="css/main.css" />
    <title>Case Study Page</title>
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
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="#e8eaed">
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
                    <li class="hidemobile"><a href="project.php">Projects</a></li>
                    <li class="hidemobile"><a href="contact.html">Contact</a></li>
                    <li class="hideondesktop">
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="#000">
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
            <div class="col-span-full l-col-start-1 l-col-span-13 hero-text" id="main-hero-text">
                <h1 id="hero-h">IDP Student<br><span class="gradient-text">Portfolio Showcase</span></h1>
                <p>Re-brand for the Zima Beer Product to have a more exciting and
                    freshly modern design aesthetics.
                </p>
            </div>
            <div class="col-span-full">
                <div class="tools">
                    <img src="images/illustrator.svg" alt="">
                    <img src="images/figma-icon.svg" alt="">
                    <img src="images/github.svg" alt="">
                    <img src="images/after-effects.svg" alt="">
                </div>
            </div>
        </section>

    <section class="grid-con">
        <div class="image-box col-span-full l-col-start-1 l-col-span-7">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($desktop_images[0]); ?>" media="(min-width: 600px)">
                <img src="images/<?php echo htmlspecialchars($mobile_images[0]); ?>" alt="Project Image 1">
            </picture>
        </div>

    <!-- Second Image Block -->
        <div class="image-box col-span-full l-col-start-8 l-col-span-6">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($desktop_images[1]); ?>" media="(min-width: 600px)">
                <img src="images/<?php echo htmlspecialchars($mobile_images[1]); ?>" alt="Project Image 2">
            </picture>
        </div>
    </section>

    <section class="challenge grid-con ">
        <div class="projects col-span-full l-col-start-3 l-col-span-8">
            <h3>Challenge</h3>
            <p id="no-move">
                <?php
                    echo !empty($project['challenge'])
                    ? htmlspecialchars($project['challenge'])
                    : "Challenge description is not available.";
                ?>
            </p>
        </div>
    </section>

    <section class="challenge grid-con">
        <div class="projects col-span-full l-col-start-3 l-col-span-8">
            <h3>Approach</h3>
            <p id="no-move">
                <?php
                     echo !empty($project['approach'])
                    ? htmlspecialchars($project['approach'])
                    : "Approach description is not available.";
                ?>
            </p>
        </div>
    </section>

    <section class="grid-con case-img">
        <div class="image-box col-span-full l-col-start-1 l-col-span-5">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($desktop_images[2]); ?>" media="(min-width: 474px)">
                <img src="images/<?php echo htmlspecialchars($mobile_images[2]); ?>" alt="Project Image 1">
            </picture>
        </div>

    <!-- Second Image Block -->
        <div class="image-box col-span-full l-col-start-6 l-col-span-7">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($desktop_images[2]); ?>" media="(min-width: 474px)">
                <img src="images/<?php echo htmlspecialchars($mobile_images[2]); ?>" alt="Project Image 2">
            </picture>
        </div>
    </section>

    <section class="challenge grid-con">
        <div class="projects col-span-full l-col-start-3 l-col-span-8">
            <h3>Result</h3>
            <p>
                <?php
                     echo !empty($project['result'])
                    ? htmlspecialchars($project['result'])
                    : "Results description is not available.";
                ?>
            </p>
        </div>

        <div class="image-box col-span-full image-box-3 box" id="case-study-hack">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($desktop_images[4]); ?>" media="(min-width: 474px)">
                <img src="images/<?php echo htmlspecialchars($mobile_images[4]); ?>" alt="Project Image 1">
            </picture>
        </div>

        <div class="projects col-span-full l-col-start-3 l-col-span-8" id="reflections">
            <h3>Reflections</h3>
            <p>
                <?php
                     echo !empty($project['reflection'])
                    ? htmlspecialchars($project['reflection'])
                    : "Reflection description is not available.";
                ?>
            </p>
        </div>
    </section>

    </main>
    <footer>
        <div class="grid-con foot" id="case-study-footer">
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


    <script src="js/main.js"></script>
</body>
