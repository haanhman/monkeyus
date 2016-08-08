<style type="text/css" media="screen">
    .slides_container {
        width:708px;
        display:none;        
    }

    .slides_container div.slide {
        width:708px;
        height:505px;
        display:block;
        z-index: -1;
    }

    .item {
        float:left;
        width:708px;
        height:505px;        
        background:#efefef;
    }

    .pagination {
        list-style:none;
        margin:0;
        padding:0;
    }
    .pagination .current a {
        color:red;
    }
    #slides {
        margin: 0px auto;
        width:708px;
        height:505px;
        position: relative;
    }
    ul.pagination {display: none;}
    #slides .prev {
        background: url(../images/btn_prev.png) no-repeat;
        display: block;
        height: 100px;
        left: -105px;
        position: absolute;
        top: 200px;
        width: 70px;
        color: transparent;
    }
    #slides .next {
        background: url(../images/btn_next.png) no-repeat;
        display: block;
        height: 100px;
        right: -105px;
        position: absolute;
        top: 200px;
        width: 70px;
        color: transparent;
    }
    #slides .slide_bg {
        background: url("../images/slide_bg.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
        height: 510px;
        left: -10px;
        position: absolute;
        top: -3px;
        width: 720px;
        z-index: 9999;
        display: none;
    }
    #store {
        width: 980px;
        margin: 0px auto;
        text-align: center;
        margin-top: 30px;
        padding-left: 15px;
    }
    #store ul li{
        list-style: none; 
        display: inline-block;
        padding: 0px 10px;
        height: 150px;
    }
    #store ul li a {
        display: inline-block;
    }

</style>
<div id="slides">
    <div class="slides_container">
        <div class="slide" step="0">
            <div class="item">
                <iframe width="708" height="505" src="//www.youtube.com/embed/yyrB0_hJ8wg?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>                
            </div>
        </div>

        <div class="slide">
            <div class="item">
                <img src="/images/slides/1.jpg" alt="Reading program for kids" />
            </div>
        </div>
        <div class="slide">
            <div class="item">
                <img src="/images/slides/2.jpg" alt="Monkey Junior" />
            </div>
        </div>
        <div class="slide">
            <div class="item">
                <img src="/images/slides/3.jpg" alt="Reading games" />
            </div>
        </div>
        <div class="slide">
            <div class="item">
                <img src="/images/slides/4.jpg" alt="Learn to read" />
            </div>
        </div>
        <div class="slide">
            <div class="item">
                <img src="/images/slides/5.jpg" alt="Flash card" />
            </div>
        </div>
        <div class="slide">
            <div class="item">
                <img src="/images/slides/6.jpg" alt="Learn to read" />
            </div>
        </div>

    </div>
    <div class="slide_bg"></div>
</div>

<div id="store">
    <ul>
        <li>
            <a href="https://itunes.apple.com/us/app/monkey-junior-teach-your-child/id930331514?mt=8" target="_blank">
                <img src="/images/ios.png" alt="" />
            </a>
        </li>
        <li>
            <a href="https://play.google.com/store/apps/details?id=com.earlystart.android.monkeyjunior" target="_blank">
                <img src="/images/android.png" alt="" />
            </a>
        </li>
    </ul>
</div>
<script type="text/javascript" src="/js/slides.js"></script>
<script type="text/javascript">
    var total = 6;
    var current = 0;
    $(function () {
        $('#slides').slides({
            preload: true,
            generateNextPrev: true
        });
        $('.next').click(function () {
            if (current == total) {
                current = 0;
            } else {
                current++;
            }
            activeBg(current);
        });
        $('.prev').click(function () {
            if (current == 0) {
                current = total;
            } else {
                current--;
            }
            activeBg(current);
        });
        activeBg(current);
    });

    function activeBg(current) {
        console.log(current);
        if (current == 0) {
            $('.slide_bg').hide();
        } else {
            $('.slide_bg').show();
        }
    }

</script>

<div class="border-line">
    <span></span>
</div>
<div class="title">
    <span class="chicken"></span>
    <h1>Monkey Junior</h1>
</div>
<div class="clear"></div>

<div class="content">
    <div><p>Monkey Junior offers a comprehensive reading program for kids with multiple reading games which will help them to learn to read and expand their vocabulary. With a wide range of reading for kids courses (and growing), you will find suitable courses and reading activities that suit your child’s current reading skills. <p>To learn more about our methodologies, please watch our app overview video here <a target="_blank" href="https://www.youtube.com/watch?v=yyrB0_hJ8wg">https://www.youtube.com/watch?v=yyrB0_hJ8wg</a></p><p>Monkey Junior is divided into three different reading levels: easy, medium and advanced. Easy courses teach your kids to read individual words. Medium courses help your little readers to learn to read simple sentences. Advanced courses are suitable to 1st grade readers for enhancing their reading fluency and skills in sentence formation. </p><p>The reading program covers hundreds of different reading topics for kids ranging from things at home, shapes, body parts, toys, actions, fruit and vegetables to wild animals, insect, nature, transportation, occupations, businesses and science and more than 100 different phonics rules. </p><p>Each course consists of around 80 unique lessons with 300+ sight words in 30 topics and 250 high quality images, 150 videos and 3 fabulous voice-over and multiple reading games. The curriculum is designed in such a way that each lesson is taken daily. Our reading program uses sight, sound and touch to keep your child engaged in the whole lesson. The images and interactive videos help to illustrate the words and the sentences to increase their reading comprehension. Your children will enjoy a completely tailored reading games at the end of each lesson that they can play and learn to read at their own pace.  </p><p>Our interactive reading program is developed in collaboration with early education experts/teachers and adopts the sight word approaches proposed by famous researchers, such as Glenn Doman, Shichida and Maria Montessori. Whether you are looking for how to teach your babies/toddlers to learn to read or how to help your kindergarteners or primary schoolers to improve their reading level, this reading app is perfect for you. It gives your child a super head start in reading and it works great for preschool, kindergarten or early primary school.</p><p>FEATURES:<br>- Learn phonics and pronunciation<br>- Gain a reading vocabulary of 3000+ sight words in a wide range of topics<br>- Increase your child’s knowledge in many areas.<br>- Learn sight words and sentence formation<br>- Read along as the words are highlighted</p><p>MULTIPLE PROFILES/LEARNERS<br>- Each child is assigned a suitable level of difficulty depending on his/her reading comprehension level.<br>- Add multiple users and switch between user accounts.<br>- Save and track user progress, app settings at user level.</p><p>RICH AND HIGH QUALITY CONTENT:<br>- Each course contains approximately a total of 3000+ words, 150 videos, 250 images, 2200 audios and 3 different voices.<br>- A course has approximately 70 lessons.<br>- Lessons are never the same.</p><p>READING GAMES<br>- Different reading games will reinforce your child’s learning experience.<br>- Reading games are adjusted and customized by the individual’s progress.</p><p>AWARD SYSTEM<br>- Stickers are awarded after each lesson.</p><p>NEW CONTENT<br>- A new course is released every month.<br>- New languages are being added.</p><p>FLASHCARDS<br>- Flashcards can be configured to run in different modes: flashcard (picture + word), only picture, only word, word then picture, picture then word<br>- The flash card interval can be changed from 0.1 second (super fast) to 3 seconds (super slow)</p><p>DOWNLOAD MONKEY JUNIOR NOW TO HELPS YOUR CHILD TO LEARN TO READ!</p><p>About Us<br>Monkey Junior is developed by Early Start Co. As we specialize in early education, our motto is, “Education starts at birth”. We believe that education should be joyful and engaging. We have helped many children to become confident early readers, and we can help your kids to be one, too.</p></div>
</p>
</div>