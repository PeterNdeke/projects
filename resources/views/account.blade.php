
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Vyybz</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="icon" href="images/favicon.png">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="css/setup.css">
</head>


<body>
	

	<div class="wrapper">
		


		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="index.html" title=""><img src="images/logo.png" alt=""></a>
					</div><!--logo end-->
					
				</div><!--header-data end-->
			</div>
		</header><!--header end-->	



		<section class="messages-page">
			 <div class="container">
		            <div class="setup-container">
            <h2>Set up to your new account </h2>
            <form method="POST" id="signup-form" action="{{url('api/account-setup')}}" class="signup-form" enctype="multipart/form-data">
              @csrf
                <h3>
                    <span class="title_text">Profile Setup</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">

                        <div class="form-group">
                            <label for="your_avatar" class="form-label">Profile Photo</label>
                            <div class="col-sm-2 imgUp">
                              <div class="imagePreview"></div>
                              <label id="uploadbutton" class="btn btn-primary" style="width: 100%;">
                                  Upload<input type="file" class="uploadFile img" name="image" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden; padding: 0px;">
                                    </label>
                            </div><!-- col-2 -->
                        </div>
                        <div class="form-select">
                            <label for="industry" class="form-label">Industry</label>
                            <select name="industry" id="industry" required>  
                                  <option value="">Choose an industry…</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Airlines/Aviation">Airlines/Aviation</option>
                                    <option value="Alternative Dispute Resolution">Alternative Dispute Resolution</option>
                                    <option value="Alternative Medicine">Alternative Medicine</option>
                                    <option value="Animation">Animation</option>
                                    <option value="Apparel &amp; Fashion">Apparel &amp; Fashion</option>
                                    <option value="Architecture &amp; Planning">Architecture &amp; Planning</option>
                                    <option value="Arts &amp; Crafts">Arts &amp; Crafts</option>
                                    <option value="Automotive">Automotive</option>
                                    <option value="Aviation &amp; Aerospace">Aviation &amp; Aerospace</option>
                                    <option value="Banking">Banking</option>
                                    <option value="Biotechnology">Biotechnology</option>
                                    <option value="Broadcast Media">Broadcast Media</option>
                                    <option value="Building Materials">Building Materials</option>
                                    <option value="Business Supplies &amp; Equipment">Business Supplies &amp; Equipment</option>
                                    <option value="Capital Markets">Capital Markets</option>
                                    <option value="Chemicals">Chemicals</option>
                                    <option value="Civic &amp; Social Organization">Civic &amp; Social Organization</option>
                                    <option value="Civil Engineering">Civil Engineering</option>
                                    <option value="Commercial Real Estate">Commercial Real Estate</option>
                                    <option value="Computer &amp; Network Security">Computer &amp; Network Security</option>
                                    <option value="Computer Games">Computer Games</option>
                                    <option value="Computer Hardware">Computer Hardware</option>
                                    <option value="Computer Networking">Computer Networking</option>
                                    <option value="Computer Software">Computer Software</option>
                                    <option value="Construction">Construction</option>
                                    <option value="Consumer Electronics">Consumer Electronics</option>
                                    <option value="Consumer Goods">Consumer Goods</option>
                                    <option value="Consumer Services">Consumer Services</option>
                                    <option value="Cosmetics">Cosmetics</option>
                                    <option value="Dairy">Dairy</option>
                                    <option value="Defense &amp; Space">Defense &amp; Space</option>
                                    <option value="Design">Design</option>
                                    <option value="E-learning">E-learning</option>
                                    <option value="Education Management">Education Management</option>
                                    <option value="Electrical &amp; Electronic Manufacturing">Electrical &amp; Electronic Manufacturing</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Environmental Services">Environmental Services</option>
                                    <option value="Events Services">Events Services</option>
                                    <option value="Executive Office">Executive Office</option>
                                    <option value="Facilities Services">Facilities Services</option>
                                    <option value="Farming">Farming</option>
                                    <option value="Financial Services">Financial Services</option>
                                    <option value="Fine Art">Fine Art</option>
                                    <option value="Fishery">Fishery</option>
                                    <option value="Food &amp; Beverages">Food &amp; Beverages</option>
                                    <option value="Food Production">Food Production</option>
                                    <option value="Fundraising">Fundraising</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Gambling &amp; Casinos">Gambling &amp; Casinos</option>
                                    <option value="Glass, Ceramics &amp; Concrete">Glass, Ceramics &amp; Concrete</option>
                                    <option value="Government Administration">Government Administration</option>
                                    <option value="Government Relations">Government Relations</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                    <option value="Health, Wellness &amp; Fitness">Health, Wellness &amp; Fitness</option>
                                    <option value="Higher Education">Higher Education</option>
                                    <option value="Hospital &amp; Health Care">Hospital &amp; Health Care</option>
                                    <option value="Hospitality">Hospitality</option>
                                    <option value="Human Resources">Human Resources</option>
                                    <option value="Import &amp; Export">Import &amp; Export</option>
                                    <option value="Individual &amp; Family Services">Individual &amp; Family Services</option>
                                    <option value="Industrial Automation">Industrial Automation</option>
                                    <option value="Information Services">Information Services</option>
                                    <option value="Information Technology &amp; Services">Information Technology &amp; Services</option>
                                    <option value="Insurance">Insurance</option>
                                    <option value="International Affairs">International Affairs</option>
                                    <option value="International Trade &amp; Development">International Trade &amp; Development</option>
                                    <option value="Internet">Internet</option>
                                    <option value="Investment Banking">Investment Banking</option>
                                    <option value="Investment Management">Investment Management</option>
                                    <option value="Judiciary">Judiciary</option>
                                    <option value="Law Enforcement">Law Enforcement</option>
                                    <option value="Law Practice">Law Practice</option>
                                    <option value="Legal Services">Legal Services</option>
                                    <option value="Legislative Office">Legislative Office</option>
                                    <option value="Leisure, Travel &amp; Tourism">Leisure, Travel &amp; Tourism</option>
                                    <option value="Libraries">Libraries</option>
                                    <option value="Logistics &amp; Supply Chain">Logistics &amp; Supply Chain</option>
                                    <option value="Luxury Goods &amp; Jewelry">Luxury Goods &amp; Jewelry</option>
                                    <option value="Machinery">Machinery</option>
                                    <option value="Management Consulting">Management Consulting</option>
                                    <option value="Maritime">Maritime</option>
                                    <option value="Market Research">Market Research</option>
                                    <option value="Marketing &amp; Advertising">Marketing &amp; Advertising</option>
                                    <option value="Mechanical Or Industrial Engineering">Mechanical Or Industrial Engineering</option>
                                    <option value="Media Production">Media Production</option>
                                    <option value="Medical Device">Medical Device</option>
                                    <option value="Medical Practice">Medical Practice</option>
                                    <option value="Mental Health Care">Mental Health Care</option>
                                    <option value="Military">Military</option>
                                    <option value="Mining &amp; Metals">Mining &amp; Metals</option>
                                    <option value="Motion Pictures &amp; Film">Motion Pictures &amp; Film</option>
                                    <option value="Museums &amp; Institutions">Museums &amp; Institutions</option>
                                    <option value="Music">Music</option>
                                    <option value="Nanotechnology">Nanotechnology</option>
                                    <option value="Newspapers">Newspapers</option>
                                    <option value="Non-profit Organization Management">Non-profit Organization Management</option>
                                    <option value="Oil &amp; Energy">Oil &amp; Energy</option>
                                    <option value="Online Media">Online Media</option>
                                    <option value="Outsourcing/Offshoring">Outsourcing/Offshoring</option>
                                    <option value="Package/Freight Delivery">Package/Freight Delivery</option>
                                    <option value="Packaging &amp; Containers">Packaging &amp; Containers</option>
                                    <option value="Paper &amp; Forest Products">Paper &amp; Forest Products</option>
                                    <option value="Performing Arts">Performing Arts</option>
                                    <option value="Pharmaceuticals">Pharmaceuticals</option>
                                    <option value="Philanthropy">Philanthropy</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Plastics">Plastics</option>
                                    <option value="Political Organization">Political Organization</option>
                                    <option value="Primary/Secondary Education">Primary/Secondary Education</option>
                                    <option value="Printing">Printing</option>
                                    <option value="Professional Training &amp; Coaching">Professional Training &amp; Coaching</option>
                                    <option value="Program Development">Program Development</option>
                                    <option value="Public Policy">Public Policy</option>
                                    <option value="Public Relations &amp; Communications">Public Relations &amp; Communications</option>
                                    <option value="Public Safety">Public Safety</option>
                                    <option value="Publishing">Publishing</option>
                                    <option value="Railroad Manufacture">Railroad Manufacture</option>
                                    <option value="Ranching">Ranching</option>
                                    <option value="Real Estate">Real Estate</option>
                                    <option value="Recreational Facilities &amp; Services">Recreational Facilities &amp; Services</option>
                                    <option value="Religious Institutions">Religious Institutions</option>
                                    <option value="Renewables &amp; Environment">Renewables &amp; Environment</option>
                                    <option value="Research">Research</option>
                                    <option value="Restaurants">Restaurants</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Security &amp; Investigations">Security &amp; Investigations</option>
                                    <option value="Semiconductors">Semiconductors</option>
                                    <option value="Shipbuilding">Shipbuilding</option>
                                    <option value="Sporting Goods">Sporting Goods</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Staffing &amp; Recruiting">Staffing &amp; Recruiting</option>
                                    <option value="Supermarkets">Supermarkets</option>
                                    <option value="Telecommunications">Telecommunications</option>
                                    <option value="Textiles">Textiles</option>
                                    <option value="Think Tanks">Think Tanks</option>
                                    <option value="Tobacco">Tobacco</option>
                                    <option value="Translation &amp; Localization">Translation &amp; Localization</option>
                                    <option value="Transportation/Trucking/Railroad">Transportation/Trucking/Railroad</option>
                                    <option value="Utilities">Utilities</option>
                                    <option value="Venture Capital &amp; Private Equity">Venture Capital &amp; Private Equity</option>
                                    <option value="Veterinary">Veterinary</option>
                                    <option value="Warehousing">Warehousing</option>
                                    <option value="Wholesale">Wholesale</option>
                                    <option value="Wine &amp; Spirits">Wine &amp; Spirits</option>
                                    <option value="Wireless">Wireless</option>
                                    <option value="Writing &amp; Editing">Writing &amp; Editing</option>
                                  </select>
                        </div>
                        <div class="form-group">
                            <label for="jobrole" class="form-label">Current Job Function/Role</label>
                            <select name="jobrole" id="jobrole" required>
                                <option value="">Select Job Function/Role</option>
                                <option value="Accounting">Accounting</option>
                                <option value="Administrative">Administrative</option>
                                <option value="Arts and Design">Arts and Design</option>
                                <option value="Business Development">Business Development</option>
                                <option value="Community & Social Services">Community & Social Services</option>
                                <option value="Consulting">Consulting</option>
                                <option value="Education">Education</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Entrepreneurship">Entrepreneurship</option>
                                <option value="Finance">Finance</option>
                                <option value="Healthcare Services">Healthcare Services</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Legal">Legal</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Media & Communications">Media & Communications</option>
                                <option value="Military & Protective Services">Military & Protective Services</option>
                                <option value="Operations">Operations</option>
                                <option value="Product Management">Product Management</option>
                                <option value="Program & Product Management">Program & Product Management</option>
                                <option value="Purchasing">Purchasing</option>
                                <option value="Quality Assurance">Quality Assurance</option>
                                <option value="Real Estate">Real Estate</option>
                                <option value="Rersearch">Rersearch</option>
                                <option value="Sales">Sales</option>
                                <option value="Support">Support</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jobtitle" class="form-label">Job title</label>
                            <input type="text" name="jobtitle" id="jobtitle" placeholder="Job title" required />
                        </div> 
                        <div class="form-group">
                            <label for="company" class="form-label">Current Company</label>
                            <input type="text" name="company" id="company" placeholder="Company you work for" required />
                        </div> 
                        <div class="form-group">
                            <label for="seniority-level" class="form-label">Seniority level</label>
                            <select id="seniority-level" name="level" required="">
                                <option value="" data-test-select-option="">Choose one…</option>
                                <option value="INTERNSHIP" data-test-select-option="">
                                  Internship
                                </option>
                                <option value="ENTRY_LEVEL" data-test-select-option="">
                                  Entry level
                                </option>
                                <option value="ASSOCIATE" data-test-select-option="">
                                  Associate
                                </option>
                                <option value="MID_SENIOR_LEVEL" data-test-select-option="">
                                  Mid-Senior level
                                </option>
                                <option value="DIRECTOR" data-test-select-option="">
                                  Director
                                </option>
                                <option value="EXECUTIVE" data-test-select-option="">
                                  Executive
                                </option>
                                <option value="NOT_APPLICABLE" data-test-select-option="">
                                  Not Applicable
                                </option>
                            </select>
                        </div> 
                    </div>
                    <div class="fieldset-footer">
                        <span>Step 1 of 3</span>
                    </div>
                </fieldset>

                <h3>
                    <span class="title_text">Select Your Interest</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content" style="padding-right: 0px;">
                        
        <h4>Tell us what you're interested in</h4>
      
      
      <div class="button-group-pills" data-toggle="buttons">
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="News">
          <div>News</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Entrepreneurship">
          <div>Entrepreneurship</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Fashion Trends">
          <div>Fashion Trends</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Adventure Travel">
          <div>Adventure Travel</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Home Decorating">
          <div>Home Decorating</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Happiness">
          <div>Happiness</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Sports">
          <div>Sports</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Wine Tasting">
          <div>Wine Tasting</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Book Reviews">
          <div>Book Reviews</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Crafting">
          <div>Crafting</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Photography">
          <div>Photography</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Technology">
          <div>Technology</div>
        </label>
        <label class="btn btn-default">
          <input type="checkbox" name="interest[]" value="Spirituality">
          <div>Spirituality</div>
        </label>
      </div>                       
                    </div>

                    <div class="fieldset-footer">
                        <span>Step 3 of 3</span>
                    </div>
                </fieldset>

                <h3>
                    <span class="title_text">Membership Plan</span>
                </h3>
                <fieldset>
                    <h4>Last step! Select Your Membership Plan</h4>
                    <div class="fieldset-content" style="padding-right: 0px;">
                        <div class="form cf">
                                                <div class="plan cf"> 
                                                    <input type="radio" name="plan" id="standard-plan" value="Standard" required>
                                                    <label class="free-label four col pricing" for="standard-plan">
                                                           <i class="fa fa-credit-card" aria-hidden="true"></i> 
                                                           <h4>Standard Plan</h4>
                                <div class="pricing-value"><span class="price bold">0</span></div>
                                <p>For settle companies looking to stay competitive in the market and growing with the technology</p>
                                                    </label>
                                                    <input type="radio" name="plan" id="premium-plan" value="Premium" required>
                                                    <label class="basic-label four col pricing" for="premium-plan">
                                                            <i class="fa fa-credit-card" aria-hidden="true"></i> 
                                                            <h4>Premium Plan</h4>
                                <div class="pricing-value"><span class="price bold">29.99</span></div>
                                <p>For settle companies looking to stay competitive in the market and growing with the technology</p>
                                                    </label>
                                                </div>
                                          </div>
                    </div>

                    <div class="fieldset-footer">
                        <span>Step 2 of 3</span>
                    </div>

                </fieldset>
            </form>
      
        </div>
        </div>
		</section><!--messages-page end-->



		<footer>
			<div class="footy-sec mn no-margin">
				<div class="container">
					<ul>
						<li><a href="about.html" title="About" target="_blank">About</a></li>
                      <li><a href="contact.html" title="Contact" target="_blank">Contact</a></li>
                      <li><a href="terms.html" title="Privacy and Terms" target="_blank">Privacy and Terms</a></li>
                      <li><a href="faqs.html" title="Help Center" target="_blank">Help Center</a></li>
                      <li><a href="blog.html" title="Blog" target="_blank">Blog</a></li>
					</ul>
					<p><img src="images/copy-icon2.png" alt=""> 2019 VYBZZ Incorporated. All Rights Reserved</p>
				</div>
			</div>
		</footer>

	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="vendor/minimalist-picker/dobpicker.js"></script>
    <script src="vendor/jquery.pwstrength/jquery.pwstrength.js"></script>
    <script src="js/setup.js"></script>

</body>
</html>