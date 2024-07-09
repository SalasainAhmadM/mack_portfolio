<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>My Portfolio</title>
    <script>
        const navLinks = document.querySelectorAll('.nav__link');

        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                const currentActiveLink = document.querySelector('.nav__link.active');
                currentActiveLink.classList.remove('active');
                this.classList.add('active');
            });
        });

    </script>
</head>

<body>


    <header class="l-header">
        <?php
        $u_qry = $conn->query("SELECT * FROM users where id = 1");
        foreach ($u_qry->fetch_array() as $k => $v) {
            if (!is_numeric($k)) {
                $user[$k] = $v;
            }
        }
        $c_qry = $conn->query("SELECT * FROM contacts");
        while ($row = $c_qry->fetch_assoc()) {
            $contact[$row['meta_field']] = $row['meta_value'];
        }
        ?>
        <nav class="nav bd-grid">
            <div>
                <a href="#" class="nav__logo">Personal Portfolio</a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">Personal Info</a></li>
                    <li class="nav__item"><a href="#education" class="nav__link">Education</a></li>
                    <li class="nav__item"><a href="#skills" class="nav__link">Skills</a></li>
                    <li class="nav__item"><a href="#work" class="nav__link">Project
                        </a></li>

                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">

        <section class="home bd-grid" id="home">
            <div class="home__data">
                <h1 class="home__title">Hi,<br>I'm <span class="home__title-color">
                        <?php echo isset($user) ? ucwords($user['firstname'] . '  ' . $user['middlename'] . '  ' . $user['lastname']) : ""; ?>
                    </span><br>
                    <?php echo stripslashes($_settings->info('course')) ?>
                </h1>

                <div class="home__resume">
                    <a href="sarail.pdf" download style="font-family: 'Poppins', sans-serif;"><button>Download
                            Resume</button></a>
                </div>
            </div>

            <div class="home__social"></div>

            <div class="home__img">
                <img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" alt="">
            </div>
        </section>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">



        <style>
            .home__resume button {
                font-family: 'Poppins', sans-serif;
                font-weight: 700;
                /* Other button styles... */
            }

            .home__resume {
                margin-top: 20px;
            }

            .home__resume button {
                padding: 10px 20px;
                background-color: #d61ae7;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .home__resume button:hover {
                background-color: #0E2431;
            }
        </style>



        <section class="about section " id="about">
            <h2 class="section-title">Personal Info</h2>

            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="<?php echo validate_image($_settings->info('logo')) ?>" alt="">
                </div>

                <div>
                    <h2 class="about__subtitle">
                        <?php include "about.html"; ?>
                    </h2>
                </div>
            </div>
        </section>


        <section class="education" id="education">
            <h2 class="section-title">Educational background</h2>


        </section>
    </main>


    <section class="skills section" id="skills">
        <h2 class="section-title">Skills</h2>

        <div class="skills__container bd-grid">
            <div>
                <h2 class="skills__subtitle">Profesional Skills</h2>
                <p class="skills__text"></p>
                <P>HTML5</P>
                <div class="skills__data">
                    <div class="skills__names">
                        <i class='bx bxl-html5 skills__icon'></i>
                        <span class="skills__name">HTML5</span>
                    </div>
                    <div class="skills__bar skills__html">

                    </div>
                    <div>
                        <span class="skills__percentage">90%</span>
                    </div>
                </div>
                <p>CSS3</p>
                <div class="skills__data">
                    <div class="skills__names">
                        <i class='bx bxl-css3 skills__icon'></i>
                        <span class="skills__name">CSS3</span>
                    </div>
                    <div class="skills__bar skills__css">

                    </div>
                    <div>
                        <span class="skills__percentage">80%</span>
                    </div>
                </div>
                <p>JAVASCRIPT</p>
                <div class="skills__data">
                    <div class="skills__names">
                        <i class='bx bxl-javascript skills__icon'></i>

                        <span class="skills__name">JAVASCRIPT</span>
                    </div>
                    <div class="skills__bar skills__js">

                    </div>
                    <div>
                        <span class="skills__percentage">60%</span>
                    </div>
                </div>
                <P>PHP</P>
                <div class="skills__data">
                    <div class="skills__names">
                        <i class='bx bxs-paint skills__icon'></i>
                        <span class="skills__name">PHP</span>
                    </div>
                    <div class="skills__bar skills__ux">

                    </div>
                    <div>
                        <span class="skills__percentage">75%</span>
                    </div>
                </div>
            </div>

            <div>
                <img src="img/skills.png" alt="" class="skills__img">
            </div>
        </div>
    </section>

    <section class="work section" id="work">
        <h2 class="section-title">project</h2>


    </section>




    <footer class="footer">
        <!--   <p class="footer__title">Personal Portfolio</p> -->
        <div class="footer__contact">
            <p class="footer__address">
                <?php echo $contact['address'] ?>
            </p>
            <p class="footer__phone">
                <?php echo $contact['mobile'] ?>
            </p>
        </div>
        <div class="footer__social">
            <a href="<?php echo $contact['facebook'] ?>" class="footer__icon"><i class='bx bxl-facebook'></i></a>
            <a href="<?php echo $contact['instagram'] ?>" class="footer__icon"><i class='bx bxl-instagram'></i></a>
            <!--   <a href="#" class="footer__icon"><i class='bx bxl-twitter'></i></a> -->
        </div>
    </footer>

</body>

</html>