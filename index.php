<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/index.css">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
    <title>Dashboard</title>
</head>
<body>
    <?php
        include "./component/header.html";
    ?>
    <div id="login_form">
    <?php
        include "./component/login_form.html";
    ?>        
    </div>
    <section id="section1">
        <div id="video_img">
            <video  muted autoplay style="grid-area: video;">
                <source src="./assets/video/video1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="clg" style="grid-area: clg_img ">
                <div class="clg_img img1" style="grid-area: img1;">
                    <img src="./assets/img/clg1.jpg" alt="no image">
                </div>
                <div class="clg_img img2" style="grid-area: img2;">
                    <img src="./assets/img/clg2.jpg" alt="no image">
                </div>
            </div>
            <div class="align_video">
                <p style="grid-area: para1;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem possimus, consectetur reiciendis aliquid pariatur voluptatibus rerum adipisci animi ad eligendi laboriosam commodi sint tempore quia? Suscipit aliquid quaerat molestiae Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur fuga, quidem consequatur repellat quod tenetur, ducimus laborum, voluptatum animi ea at optio suscipit ad. Eius doloribus omnis debitis ducimus commodi.</p>
            </div>
        </div>
    </section>
    <section id="section2">
        <div class="card web">
            <div class="item-hints">
            <div class="hint" data-position="4">
                <span class="hint-dot">
                    <?php
                        include "./assets/icons/group.html";
                    ?>
                    <h4>Webinars</h4>
                </span>
                <div class="hint-content do--split-children">
                <p>Use Navbar to navigate the website quickly and easily.</p>
                </div>
            </div>
            </div>
        </div>
        <div class="card placement">
            <div class="item-hints">
            <div class="hint" data-position="4">
                <span class="hint-dot">
                    <?php
                        include "./assets/icons/jobs.html";
                    ?>
                    <h4>Placement Assist</h4>
                </span>
                <div class="hint-content do--split-children">
                <p>Use Navbar to navigate the website quickly and easily.</p>
                </div>
            </div>
            </div>
        </div>
        <div class="card enlight">
            <div class="item-hints">
                <div class="hint" data-position="4">
                    <span class="hint-dot">
                        <?php
                            include "./assets/icons/career.html";
                        ?>
                        <h4>Enlightment of Career</h4>
                    </span>
                    <div class="hint-content do--split-children">
                    <p>Use Navbar to navigate the website quickly and easily.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card thought">
            <div class="item-hints">
                <div class="hint" data-position="4">
                    <span class="hint-dot">
                        <?php
                            include "./assets/icons/share.html";
                        ?>
                        <h4>Share Thought</h4>
                    </span>
                    <div class="hint-content do--split-children">
                    <p>Use Navbar to navigate the website quickly and easily.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section3">
        <div class="desc1">
            <div id="discussion">
                <img src="./assets/img/discussion.jpeg" alt="no image">
            </div>
            <div id="quotes">
                <h5>Networks</h5>
                <h1>Meet and get along yours alumini
                    for Career guidance
                </h1>
                <p>Explore aluminis to get their opinion of their jobs,work and their role in firm.In addition understand how people are working in there and realise yours level of knowledge</p>

                <button id="explore">
                    Explore
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>

                    </div>
                </button>
            </div>
        </div>
        <div class="desc2">

        </div>
    </section>
     <?php
        include "./component/footer.html";
    ?>
    <script src="./javascript/general.js"></script>

    <script type="module" src="./javascript/authentication.js"></script>
    <script>
        const explore = document.getElementById("explore");
        explore.addEventListener("click",()=>
    {
        location.href="./students.php";
    })
    </script>

</body> 
</html>