

<!DOCTYPE html>
<html lang="en">

<?php
require_once('includes/connect.php');

// Fetch data
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
    AND m.media_type = 'desktop' -- Only desktop images
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

$zima_images = $projects[1] ?? [];       // Zima Project (2 images)
$hilite_images = $projects[2] ?? [];    // Hilite Project (2 images)
$hackathon_image = $projects[4][0] ?? null; // Hackathon Project (1 image)
$ceci_image = $projects[3][0] ?? null;
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
            <div class="col-span-full l-col-start-1 l-col-span-9 hero-text">
                <h1>Selected <br><span class="gradient-text">All Projects</span></h1>
            </div>
        </section>

    <section class="grid-con" id="projects-play">
    <!-- Zima Project -->
    <?php if (!empty($zima_images)): ?>
        <a href="case-study.php?id=1" class="col-span-full l-col-start-1 l-col-span-7 image-box box first-pro">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($zima_images[0]['file_path']); ?>" 
                        media="(min-width: 474px)">
                <img src="images/<?php echo htmlspecialchars($zima_images[0]['file_path']); ?>" 
                     alt="Image for Zima Case Study">
            </picture>
        </a>
        <?php if (isset($zima_images[1])): ?>
            <a href="case-study.php?id=1" class="col-span-full l-col-start-8 l-col-span-5 image-box box first-pro">
                <picture>
                    <source srcset="images/<?php echo htmlspecialchars($zima_images[1]['file_path']); ?>" 
                            media="(min-width: 474px)">
                    <img src="images/<?php echo htmlspecialchars($zima_images[1]['file_path']); ?>" 
                         alt="Image for Zima Case Study">
                </picture>
            </a>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Ceci Project -->
    <?php if (!empty($ceci_image)): ?>
        <a href="case-study.php?id=3" class="col-span-full image-box box first-pro">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($ceci_image['file_path']); ?>" 
                        media="(min-width: 474px)">
                <img src="images/<?php echo htmlspecialchars($ceci_image['file_path']); ?>" 
                     alt="Image for Ceci Case Study">
            </picture>
        </a>
    <?php endif; ?>

    <!-- Hilite Project -->
    <?php if (!empty($hilite_images)): ?>
        <a href="case-study.php?id=2" class="col-span-full l-col-start-1 l-col-span-7 image-box box">
            <picture>
                <source srcset="images/<?php echo htmlspecialchars($hilite_images[0]['file_path']); ?>" 
                        media="(min-width: 474px)">
                <img src="images/<?php echo htmlspecialchars($hilite_images[0]['file_path']); ?>" 
                     alt="Image for Hilite Case Study">
            </picture>
        </a>
        <?php if (isset($hilite_images[1])): ?>
            <a href="case-study.php?id=2" class="col-span-full l-col-start-8 l-col-span-5 image-box box">
                <picture>
                    <source srcset="images/<?php echo htmlspecialchars($hilite_images[1]['file_path']); ?>" 
                            media="(min-width: 474px)">
                    <img src="images/<?php echo htmlspecialchars($hilite_images[1]['file_path']); ?>" 
                         alt="Image for Hilite Case Study">
                </picture>
            </a>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Hackathon Project -->

    <?php if (!empty($hackathon_image)): ?>
    <a href="case-study.php?id=4" class="col-span-full image-box box" id="bottom-pro">
        <picture>
            <source srcset="images/<?php echo htmlspecialchars($hackathon_image['file_path']); ?>" 
                    media="(min-width: 474px)">
            <img src="images/<?php echo htmlspecialchars($hackathon_image['file_path']); ?>" 
                 alt="Image for Hackathon Case Study">
        </picture>
    </a>
<?php endif; ?>
</section>

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
</body>

</html>