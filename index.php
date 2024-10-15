<?php
    session_start();
    $_SESSION["from"] = "index.php";
// echo "{$_SESSION["from"]}";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/index.css">
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
        </div>
    </section>
    <section id="section2" class="layout1">
            <div class="left">
                <img src="./assets/img/workshop.jpg" alt="No image">
            </div>
            <div class="right">
                <h1 class="heading">Workshop</h1>
                <p class="para">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, dicta magni! Libero soluta tenetur porro voluptate blanditiis ducimus deserunt quasi nisi voluptatem iure molestias accusamus doloribus incidunt at minus, facere eligendi vitae corporis maiores provident distinctio. At cum numquam quos dicta et, fugit doloremque placeat recusandae delectus, sequi odit officiis nam impedit saepe repudiandae est eveniet omnis quaerat. Reprehenderit, tempore.
                </p>
                <button id="explore">
                    Explore
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>

                    </div>
                </button>
            </div>
    </section>
    <section id="section3" class="layout2">
        <div class="desc1">
            <div id="quotes">
                    <h1 class="heading">Seminar</h1>
                    <p class="para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur sapiente facere quisquam eveniet, officia, expedita assumenda odit eius culpa vero mollitia consectetur, dolorem consequatur minus explicabo? Nesciunt quod odit, fuga atque minus alias, harum exercitationem et enim dignissimos nulla sit!</p>
                    <button id="explore">
                        Explore
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>

                        </div>
                    </button>
                </div>
                <div id="discussion">
                    <img src="./assets/img/seminar.jpg" alt="no image">
                </div>
            </div>

    </section>
    <section id="section4">
        <div class="alumini_wrap">
            <h1 class="heading">
                Alumini Meet
            </h1>
            <div class="img_desc">
                <div class="img">
                    <img src="./assets/img/guidance.jpg" alt="No Image">
                    <div class="content">
                        <h1 class="heading">Guidance</h1>
                         <p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem porro debitis, perspiciatis dicta similique pariatur voluptates iusto deleniti impedit nesciunt, cumque, quibusdam omnis! Inventore quam eaque ad modi, dolore est iste exercitationem reiciendis amet veritatis officiis similique quae facilis ducimus eveniet natus ea! Animi, autem libero? Doloribus ut ullam blanditiis.</p>
                         <button id="explore">
                         Explore
                         <div class="arrow-wrapper">
                             <div class="arrow"></div>
     
                         </div>
                     </button>
                    </div>
                </div>
                <div class="img">
                    <img src="./assets/img/memories.jpg" alt="No Image">
                    <div class="content">
                        <h1 class="heading">Memories</h1>
                        <p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem porro debitis, perspiciatis dicta similique pariatur voluptates iusto deleniti impedit nesciunt, cumque, quibusdam omnis! Inventore quam eaque ad modi, dolore est iste exercitationem reiciendis amet veritatis officiis similique quae facilis ducimus eveniet natus ea! Animi, autem libero? Doloribus ut ullam blanditiis.</p>
                        <button id="explore">
                        Explore
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>
    
                        </div>
                    </button>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
        <section id="section5" class="layout2">
        <div class="desc1">
            <div id="discussion">
                <img src="./assets/img/placement.jpg" alt="no image">
            </div>
            <div id="quotes">
                    <h1 class="heading">Placement Reference</h1>
                    <p class="para">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur sapiente facere quisquam eveniet, officia, expedita assumenda odit eius culpa vero mollitia consectetur, dolorem consequatur minus explicabo? Nesciunt quod odit, fuga atque minus alias, harum exercitationem et enim dignissimos nulla sit!</p>
                    <button id="explore">
                        Explore
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>

                        </div>
                    </button>
                </div>
            </div>

    </section>
    <section id="section6" class="layout1">

            <div class="right">
                <h1 class="heading">Event Jury</h1>
                <p class="para">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, dicta magni! Libero soluta tenetur porro voluptate blanditiis ducimus deserunt quasi nisi voluptatem iure molestias accusamus doloribus incidunt at minus, facere eligendi vitae corporis maiores provident distinctio. At cum numquam quos dicta et, fugit doloremque placeat recusandae delectus, sequi odit officiis nam impedit saepe repudiandae est eveniet omnis quaerat. Reprehenderit, tempore.
                </p>
                <button id="explore">
                    Explore
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>

                    </div>
                </button>
            </div>
            <div class="left">
                <img src="./assets/img/event_jury.jpg" alt="No image">
            </div>
    </section>
    <section id="section7">
        <h1 class="heading">Aluminis Of Measi</h1>
        <div class="scroller">
        <ul class="lists">
            <li class="item item1">   
                <div class="alumini">
                    <div class="alu_img">
                        <img src="./assets/img/profile_img.jpg" alt="No Image">
                    </div>
                    <span class="name">Pushparaj P</span>
                    <span class="batch">2015 - 2017</span>
                </div>
            </li>
            <li class="item item2">   
                <div class="alumini">
                    <div class="alu_img">
                        <img src="./assets/img/profile_img.jpg" alt="No Image">
                    </div>
                    <span class="name">Chandru Kumar</span>
                    <span class="batch">2015 - 2017</span>
                </div>
            </li>
            <li class="item item3">   
                <div class="alumini">
                    <div class="alu_img">
                        <img src="./assets/img/profile_img.jpg" alt="No Image">
                    </div>
                    <span class="name">Pushparaj P</span>
                    <span class="batch">2015 - 2017</span>
                </div>
            </li>
            <li class="item item4">   
                <div class="alumini">
                    <div class="alu_img">
                        <img src="./assets/img/profile_img.jpg" alt="No Image">
                    </div>
                    <span class="name">Pushparaj P</span>
                    <span class="batch">2015 - 2017</span>
                </div>
            </li>
            <li class="item item5">   
                <div class="alumini">
                    <div class="alu_img">
                        <img src="./assets/img/profile_img.jpg" alt="No Image">
                    </div>
                    <span class="name">Pushparaj P</span>
                    <span class="batch">2015 - 2017</span>
                </div>
            </li>
            <li class="item item6">   
                <div class="alumini">
                    <div class="alu_img">
                        <img src="./assets/img/profile_img.jpg" alt="No Image">
                    </div>
                    <span class="name">Pushparaj P</span>
                    <span class="batch">2015 - 2017</span>
                </div>
            </li>
            <li class="item item7">   
                <div class="alumini">
                    <div class="alu_img">
                        <img src="./assets/img/profile_img.jpg" alt="No Image">
                    </div>
                    <span class="name">Pushparaj P</span>
                    <span class="batch">2015 - 2017</span>
                </div>
            </li>
            <li class="item item8">   
                <div class="alumini">
                    <div class="alu_img">
                        <img src="./assets/img/profile_img.jpg" alt="No Image">
                    </div>
                    <span class="name">Pushparaj P</span>
                    <span class="batch">2015 - 2017</span>
                </div>
            </li>
    </div>
    </section>
    <section id="section10" class="layout2">
        <div class="desc1">
            <div id="discussion">
                <img src="./assets/img/discussion.jpeg" alt="no image">
            </div>
            <div id="quotes">
                <h1 class="heading">Networks</h1>
                <h4 class="sub_head">Meet and get along yours alumini
                    for Career guidance
                </h4>
                <p class="para">Explore aluminis to get their opinion of their jobs,work and their role in firm.In addition understand how people are working in there and realise yours level of knowledge</p>

                <button id="explore">
                    Explore
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>

                    </div>
                </button>
            </div>
        </div>
    </section>
     <?php
        include "./component/footer.html";
    ?>
    <script src="./javascript/general.js"></script>
    <script src="./javascript/datatable/jquery-3.7.1.js"></script>
    <script type="module" src="./javascript/authentication.js"></script>
    <script type="module" src="./javascript/sign_in.js"></script>
    <script type="module" src="./javascript/login_signup.js"></script>
    <script>
        console.log('hi');

        const explore = document.getElementById("explore");
        explore.addEventListener("click",()=>
    {
        location.href="./students.php";
    })
    </script>

</body> 
</html>