<!DOCTYPE html>
<html>

<head>
<title>Jobs - Placement Portal</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>

<h2 class="logo">Smart Placement System</h2>

<nav>
<ul>
<li><a href="home.html">Home</a></li>
<li><a href="about.html">About</a></li>
<li><a href="jobs.html">Jobs</a></li>
<li><a href="companies.html">Companies</a></li>
<li><a href="resume.html">Resume</a></li>
<li><a href="contact.html">Contact</a></li>
<li><a href="login.html">Login</a></li>
</ul>
</nav>

</header>


<section class="jobs">

<h1>Latest Job Vacancies</h1>


<!-- SEARCH FILTER -->

<div class="job-search">

<input type="text" id="searchInput" placeholder="Search by Job Role">

<select id="skillFilter">
<option value="">Select Skill</option>
<option value="Java">Java</option>
<option value="Python">Python</option>
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
<option value="JavaScript">JavaScript</option>
</select>

<button onclick="searchJobs()">Search</button>

</div>


<!-- JOB CONTAINER -->

<div class="job-container" id="jobContainer">


<!-- JOB CARD 1 -->

<div class="job-card" data-role="Software Developer" data-skill="Java">

<img src="images/tcs.png" class="company-logo">

<h3>Software Developer</h3>

<p><b>Company:</b> TCS</p>
<p><b>Location:</b> Noida</p>
<p><b>Salary:</b> ₹4 LPA</p>

<div class="skills">
<span>Java</span>
<span>SQL</span>
</div>

<button class="apply-btn" onclick="applyJob(this)">Apply Now</button>

<p class="status applied">Applied</p>

</div>


<!-- JOB CARD 2 -->

<div class="job-card" data-role="Web Developer" data-skill="HTML">

<img src="images/infosys.png" class="company-logo">

<h3>Web Developer</h3>

<p><b>Company:</b> Infosys</p>
<p><b>Location:</b> Bangalore</p>
<p><b>Salary:</b> ₹3.5 LPA</p>

<div class="skills">
<span>HTML</span>
<span>CSS</span>
<span>JavaScript</span>
</div>

<button class="apply-btn" onclick="applyJob(this)">Apply Now</button>

<p class="status">Not Applied</p>

</div>


<!-- JOB CARD 3 -->

<div class="job-card" data-role="Data Analyst" data-skill="Python">

<img src="images/wipro.png" class="company-logo">

<h3>Data Analyst</h3>

<p><b>Company:</b> Wipro</p>
<p><b>Location:</b> Hyderabad</p>
<p><b>Salary:</b> ₹4.2 LPA</p>

<div class="skills">
<span>Python</span>
<span>Excel</span>
<span>SQL</span>
</div>

<button class="apply-btn" onclick="applyJob(this)">Apply Now</button>

<p class="status">Not Applied</p>

</div>

</div>

</section>


<footer>

<p>© 2026 Placement Portal | Developed by Mahima</p>

</footer>


<script>

function searchJobs(){

let search = document.getElementById("searchInput").value.toLowerCase();
let skill = document.getElementById("skillFilter").value.toLowerCase();

let jobs = document.querySelectorAll(".job-card");

jobs.forEach(function(job){

let role = job.dataset.role.toLowerCase();
let skillTag = job.dataset.skill.toLowerCase();

if((role.includes(search) || search=="") && (skillTag.includes(skill) || skill=="")){
job.style.display="block";
}
else{
job.style.display="none";
}

});

}



function applyJob(button){

let status = button.nextElementSibling;

button.innerText="Applied";
button.style.background="#2e7d32";

status.innerText="Applied";
status.classList.add("applied");

}

</script>

</body>
</html>