<!--

  Author: Milan Matoušek
  Date:   April 2021
  Desc:   Responsive page presenting my resume/cv

-->

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/style.css" />
	<link rel="icon" href="images/deff-not-malovani-logo.png">
	<title>Milan Matousek CV</title>
</head>
<body>

  <script type="text/javascript">
    /*
      Input   None
      Return  None
      Desc.   Function for showing menu items on mobiles (600 and less px)
    */
    function openMenu() {
      document.getElementById("phone-menu").style.display="none"; // hide phone-menu icon
      document.getElementById("mobile-navbar-items").style.display="block"; // show items
    }

    /*
      Input   None
      Return  None
      Desc.   Function for hidding menu items and showing menu icon (600 and less px)
    */
    function closeMenu() {
      document.getElementById("mobile-navbar-items").style.display="none"; // hide items
      document.getElementById("phone-menu").style.display="block"; // show icon
    }
  </script>
   
  <!-- MENU SECTION -->
  <div class="navbar">
    <ul>
      <a href="#"><li>Home</li></a>
      <a href="#contact"><li>Contact</li></a>
      <a href="login.php"><li>Login Page</li></a>
      <a href="https://github.com/IamNalim/chatbot" target="_blank"><li>Chatbot</li></a>
    </ul>
  </div>
  <div class="mobile-navbar">
    <ul>
      <a href="javascript:void(0)" onclick="openMenu()" id="phone-menu"><li>&#9776;</li></a>
      <div id="mobile-navbar-items">
        <a href="https://github.com/IamNalim/chatbot" target="_blank" onclick="closeMenu()"><li>Chatbot</li></a>
        <a href="login.php" onclick="closeMenu()"><li>Login Page</li></a>
        <a href="#contact" onclick="closeMenu()"><li>Contact</li></a>
        <a href="#" onclick="closeMenu()"><li>Home</li></a>
        <a href="javascript:void(0)" onclick="closeMenu()"><li>&#9776;</li></a>
      </div>
    </ul>
  </div>

  <!-- MAIN SECTION -->  
  <div class="main-container" id="home">

    <!-- LEFT-SIDE SECTION, contain image and contact for me -->
    <div class="left">

      <!-- image of myself -->
      <div class="picture-container">
        <img src="images/me.jpg" alt="Picture of myself">
      </div>

      <!-- info under image -->
      <div class="left-info">
        <hr>
        <h3>Milan Matoušek</h3>
        <h4>Junior developer</h4>
        <hr>
        <h4 id="contact">Contact:</h4>
        <!-- contact section -->
        <div class="contact">
          <ul>
            <li id="contact-icon"><img src="images/icons/icon-phone512.png" alt="phone icon"></li>
            <li id="contact-text"><a href="tel:737819932">737819932</a></li>
          </ul>
          <ul>
            <li id="contact-icon"><img src="images/icons/icon-house512.png" alt="house icon"></li>
            <li id="contact-text">Svatoslav, Czech Republic</li>
          </ul>
          <ul>
            <li id="contact-icon"><img src="images/icons/icon-email512.png" alt="email icon"></li>
            <li id="contact-text"><a href="mailto:milan.matouse.at.gmail.com">milan.matouse@gmail.com</a></li>
          </ul>
          <ul>
            <li id="contact-icon"><img src="images/icons/icon-github512.png" alt="github icon"></li>
            <li id="contact-text"><a href="https://github.com/IamNalim" target="_blank">@IamNalim</a></li>
          </ul>
          <ul>
            <li id="contact-icon"><img src="images/icons/icon-in512.png" alt="linkedin icon"></li>
            <li id="contact-text"><a href="https://www.linkedin.com/in/milan-matou%C5%A1ek-05415b16a/" target="_blank">Milan Matoušek</a></li>
          </ul>
          <ul>
            <li id="contact-icon"><img src="images/icons/icon-fb512.png" alt="fb icon"></li>
            <li id="contact-text"><a href="https://www.facebook.com/milan.matouse/" target="_blank">Milan Matoušek</a></li>
          </ul>
        </div>

        <div>
          <hr>
        </div>

      </div>
    </div>

    <!-- MIDDLE SECTION, desing purpose -->
    <div class="middle">
    </div>

    <!-- RIGHT SECTION of page, contain about, education, skills, languages and examples -->
    <div class="right">
      <!-- container for text -->
      <div class="right-container">
        <h3>Welcome to my CV!</h3>
        <hr>

        <!-- about section -->
        <h4>About me</h3>
        <p>
          Hello and welcome!<br> My name is Milan, I am 23 years old and live in small village in Czech Republic. I have many hobbies! out of programming, I love nature and animals (proud owner of three dogs). I'm also a geek and big fan of technologies. My love to programming (and technologies in general) started before of high school. I chose to go to the IT because I was big fan of games, and it was my dream to make games in future. In second grade we start to programming in Turbo Pascal and then in Pascal OOP version, Delphi. That's when my passion for programming began. In University this passion turned into hobby with Python and PHP.
        </p>
        <hr>

        <!-- education section -->
        <h4>Education</h4>
        <div class="text-container">
          <p>Technical and Economical High school in Brno, Olomoucka street 61 - IT Program</p>
          <p class="educ-time">2014-2018 - Ended with final exam</p>
        </div>
        <div class="text-container">
          <p>Brno University of Technology, Faculty of Information Technology - IT Program</p>
          <p class="educ-time">2018-2021 - Ended without bachelor's degree</p>
        </div>
        <hr>

        <!-- skills section -->
        <h4>Technical Skills</h4>
        <div class="text-container skills">
          <p>Python</p>
          <p>⚫⚫⚫⚫◯</p>
        </div>
        <div class="text-container skills">
          <p>C</p>
          <p>⚫⚫⚫⚫◯</p>
        </div>
        <div class="text-container skills">
          <p>MySQL</p>
          <p>⚫⚫⚫⚫◯</p>
        </div>
        <div class="text-container skills">
          <p>HTML</p>
          <p>⚫⚫⚫◯◯</p>
        </div>
        <div class="text-container skills">
          <p>PHP</p>
          <p>⚫⚫⚫◯◯</p>
        </div>
        <div class="text-container skills">
          <p>CSS</p>
          <p>⚫⚫⚫◯◯</p>
        </div>
        <div class="text-container skills">
          <p>JS</p>
          <p>⚫⚫◯◯◯</p>
        </div>
        <div class="text-container skills">
          <p>Bash/Shell</p>
          <p>⚫⚫◯◯◯</p>
        </div>

        <h4>Soft Skills</h4>
        <div class="text-container skills">
          <p>Team Work</p>
        </div>
        <div class="text-container skills">
          <p>Self-sufficiency</p>
        </div>
        <div class="text-container skills">
          <p>Self-improvement</p>
        </div>

        <h4>Other Skills</h4>
        <div class="text-container skills">
          <p>Linux</p>
        </div>
        <div class="text-container skills">
          <p>Git/GitHub</p>
        </div>
        <div class="text-container skills">
          <p>Trello</p>
        </div>
        <hr>

        <!-- language section -->
        <h4>Languages</h4>
        <div class="text-container lang">
          <p>Czech (Native language)</p>
          <p>⚫⚫⚫⚫⚫</p>
        </div>
        <div class="text-container lang">
          <p>English</p>
          <p>⚫⚫⚫⚫◯</p>
        </div>
        <hr>

        <!-- examples section -->
        <h4>Examples</h4>
        <p>Two examples of my work (other then this page)</p>
        <ul>
          <li>HTML, CSS, JS, SQL and PHP - Login system, with album collection (still work in progress read github) <a href="login.php" target="_blank" class="example-link">[PAGE]</a> <a href="https://github.com/IamNalim/login" target="_blank" class="example-link">[GITHUB]</a></li>
          <li>Python - Chatbot using python modules <a href="https://github.com/IamNalim/chatbot" target="_blank" class="example-link">[GITHUB]</a></li>
        </ul>
        <hr>

      </div>
    </div>

  </div>

  <!-- FOOTER SECTION -->
  <div class="footer">
    <div class="footer-text">
      <p>Created by Milan Matoušek</p>
    </div>
  </div>

</body>
</html>