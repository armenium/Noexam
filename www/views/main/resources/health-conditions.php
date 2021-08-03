<?php

use yii\widgets\Breadcrumbs;

if(!empty($this->context->current_cat->meta_desc)){
	$this->registerMetaTag(['name' => 'description', 'content' => $this->context->current_cat->meta_desc]);
}
if(!empty($this->context->current_cat->meta_keys)){
	$this->registerMetaTag(['name' => 'keywords', 'content' => $this->context->current_cat->meta_keys]);
}
if(!empty($this->context->current_cat->meta_title)){
	$this->title = $this->context->current_cat->meta_title;
}else{
	$this->title = $this->context->current_cat->title;
}
$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/'];
$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>
<div class="page-content page-wrapper trans_all">

	<!-- START PAGE-CONTENT -->
	<section class="page">
		<aside>
			<div class="sticky-block">
				<h2>Jump to a section</h2>
				<div class="desc">Click on a Health Condition to Read About How it Can Affect Your Life Insurance Application</div>
				<ul>
					<li><a href="#hypertension" target="_self" rel="dofollow">Hypertension (High Blood Pressure)</a></li>
					<li><a href="#hyperlipidemia" target="_self" rel="dofollow">Hyperlipidemia (High Cholesterol)</a></li>
					<li><a href="#diabetes" target="_self" rel="dofollow">Diabetes</a></li>
					<li><a href="#backpain" target="_self" rel="dofollow">Back Pain</a></li>
					<li><a href="#anxiety" target="_self" rel="dofollow">Anxiety</a></li>
					<li><a href="#obesity" target="_self" rel="dofollow">Obesity</a></li>
					<li><a href="#asthma" target="_self" rel="dofollow">Asthma</a></li>
					<li><a href="#stds" target="_self" rel="dofollow">Sexually Transmitted Diseases (STDs)</a></li>
					<li><a href="#acidreflux" target="_self" rel="dofollow">Acid Reflux</a></li>
					<li><a href="#respiratorydisease" target="_self" rel="dofollow">Respiratory Disease</a></li>
					<li><a href="#hypothyroidism" target="_self" rel="dofollow">Hypothyroidism</a></li>
					<li><a href="#osteoarthritis" target="_self" rel="dofollow">Osteoarthritis (Joint Pain)</a></li>
					<li><a href="#depression" target="_self" rel="dofollow">Depression</a></li>
					<li><a href="#fibromyalgia" target="_self" rel="dofollow">Fibromyalgia</a></li>
					<li><a href="#alcoholism" target="_self" rel="dofollow">Alcoholism</a></li>
					<li><a href="#drugaddiction" target="_self" rel="dofollow">Drug Addiction</a></li>
					<li></li>
				</ul>
			</div>
		</aside>

		<article class="content">
			<h1>Getting Life Insurance With a Pre Existing Condition</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p><img style="float:right;" src="../../img/red-cross-300x300.png" alt="medical conditions that affect life insurance" width="150" height="150"/></p>
			<p>As with any type of insurance, life insurance revolves around the concept of risk. Whether a life insurer will cover someone and how much they will charge for that coverage depends on the applicant’s mortality risk. An individual’s mortality risk refers to the statistical likelihood
				that he/she will die prematurely. When a policyholder dies prematurely, the life insurer loses money on the policy because the individual did not live long enough for the insurance company to make a profit from his/her premiums.</p>
			<p>In order to maintain solvency, life insurers have to balance the risks they assume with the premiums they charge. To this end, <a href="https://www.noexam.com/life-insurance/health-exam/">via a health exam</a> they gather extensive demographic and medical information from life
				insurance applicants in order to gauge the risk of premature death and set premiums accordingly. During this process, known as underwriting, <strong>life insurers evaluate a number of factors to determine the appropriate rate classification.</strong> These factors include age, sex,
				height, weight, family and personal medical history, and current health, to name a few.</p>
			<p>That means the conditions and diseases that you presently have or have had in the past can affect your life insurance application – both your eligibility for coverage and the premiums you pay. Likewise, the medications that you take will influence your application for coverage.
				<strong>This guide will walk you through the conditions and medications most likely to affect your life insurance application. We’ll explain how life insurers view these diseases and medications and what they might mean for your coverage. Please see our
					<a href="https://www.noexam.com/life-insurance/companies/">best life insurance companies</a> page. If you would like to apply for a <a href="https://www.noexam.com/life-insurance/companies/no-exam/">no exam life insurance</a> policy, please call 888-407-0714.
				</strong>
			</p>

			<h2 id="hypertension"><strong>Life Insurance with High Blood Pressure</strong></h2>
			<img class="article-image" src="../../img/hbp.jpg" alt="life insurance with high blood pressure" width="300" height="225"/>

			<p>Commonly known as high blood pressure, hypertension is a condition in which the pressure of the blood against the walls of your arteries is high enough to lead to medical problems eventually. The threshold for hypertension by most standards is 140/90 mm Hg, meaning that your blood
				pressure must be above that reading to qualify as “high.” About 90 million Americans — one in three adults — suffer from high blood pressure.</p>
			<p>Hypertension’s nickname in the medical community — the “silent killer” — suggests why the condition so concerns life insurers. Unmanaged high blood pressure can cause a plethora of potentially lethal health problems, including:</p>
			<ul>
				<li><strong>Atherosclerosis</strong>: the leading cause of heart attacks and heart disease</li>
				<li><strong>Heart disease and stroke: </strong>hypertension is the leading cause of strokes</li>
				<li><strong>Aneurysm: </strong>vessels weakened by high blood pressure can eventually form aneurysms, which may be fatal if they rupture</li>
				<li><strong>Renal failure: </strong>hypertension is the second-leading cause of kidney failure</li>
			</ul>
			<p>With complications like those, you can understand why <a href="https://www.noexam.com/life-insurance/health-conditions/high-blood-pressure/">high blood pressure can drive up life insurance rates</a>. On the bright side, life insurers view well-managed high blood pressure very
				differently from unmanaged hypertension. Take a look at the table below to see how various blood pressures may impact your rates.</p>
			<table style="width: 100%;" border="1">
				<tbody>
				<tr>
					<td width="213"><strong>Regular</strong></td>
					<td width="213"><strong>Preferred</strong></td>
					<td width="213"><strong>Preferred Plus</strong></td>
				</tr>
				<tr>
					<td width="213">150/90 or lower with medication(limits may be higher for those over 50)</td>
					<td width="213">140/90 or lower with medication150/90 without medication</td>
					<td width="213">140/90 or lower without medication</td>
				</tr>
				</tbody>
			</table>
			<p>Having high blood pressure does not mean that life insurance will be cost-prohibitive. Controlling your hypertension, whether with lifestyle changes or medication, can help you qualify for preferred rates. Simple lifestyle changes that will lower your blood pressure include reducing
				the sodium in your diet, exercising regularly, eliminating alcohol and nicotine, and losing weight.</p>
			<p>If your doctor decides pharmacotherapy is the best option for your hypertension, remember that taking antihypertensives, or blood pressure medication, will raise your life insurance rates. However, medication will also lower your blood pressure, thus potentially qualifying you for
				preferred rates. Here are a few of the most common blood pressure medications:</p>
			<ul>
				<li>Prinivil, Zestril (lisinopril)</li>
				<li>Norvasc (amlodipine besylate)</li>
				<li>Hydrochlorothiazide</li>
				<li>Vasotec (enalapril)</li>
				<li>Altace (ramipril)</li>
				<li>Lopressor (metoprolol)</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.mayoclinic.org/diseases-conditions/high-blood-pressure/basics/definition/con-20019580</p>
			<p>http://www.cdc.gov/nchs/fastats/hypertension.htm<br/>
			</p>
			<h2 id="hyperlipidemia"><strong>Life Insurance With High Cholesterol</strong></h2>
			<img class="article-image" src="../../img/high-cholesterol-food.jpg" alt="high cholesterol food" width="300" height="199"/>
			<p>Image via Flickr by punctuated</p>
			<p>Although not technically a disease, hyperlipidemia — or high cholesterol — commonly causes a litany of life-threatening health problems that raise red flags for life insurers. Affecting about 13.4 percent of Americans, “high” cholesterol typically refers to a total cholesterol level
				of 240 mg/dL or higher. The lipid profile of someone with healthy cholesterol levels will look like this:</p>
			<ul>
				<li><strong>Total cholesterol: </strong>less than 200 mg/dL</li>
				<li><strong>LDL (“bad” cholesterol):</strong> less than 100 mg/dL</li>
				<li><strong>HDL (“good” cholesterol):</strong> 40 mg/dL or higher</li>
				<li><strong>Triglycerides:</strong> less than 150 mg/dL</li>
			</ul>
			<p>Too much cholesterol results in fatty buildup along the walls of blood vessels. This makes it more difficult for blood to travel through arteries, possibly depriving the heart and/or brain of oxygen-rich blood. The deprivation of oxygen to critical organs can lead to death, which is
				why life insurance companies are interested in your cholesterol levels.</p>
			<p>Because of these potentially lethal consequences, hyperlipidemia can affect your life insurance rates. However, as you can see from the table below, managing your cholesterol can help you reduce your premiums. It is possible to <a
						href="https://www.noexam.com/life-insurance/health-conditions/high-cholesterol/">get life insurance with high cholesterol</a>.</p>
			<table>
				<tbody>
				<tr>
					<td width="213"><strong>Regular</strong></td>
					<td width="213"><strong>Preferred</strong></td>
					<td width="213"><strong>Preferred Plus</strong></td>
				</tr>
				<tr>
					<td width="213">Total cholesterol no higher than 300-350 mg/dLCholesterol/HDL ratio no higher than 8.0</td>
					<td width="213">Total cholesterol less than 250 mg/dLCholesterol/HDL ratio less than 6.0With or without medication</td>
					<td width="213">Total cholesterol less than 200-220 mg/dLCholesterol/HDL ratio less than 5.0Some life insurers may allow for treatment with medication in this rate class</td>
				</tr>
				</tbody>
			</table>
			<p>Managing your hyperlipidemia is critical to keeping your premiums affordable. Lifestyle changes – such as losing weight, avoiding saturated and trans fats, exercising, and increasing your dietary fiber – can help lower your cholesterol. Similarly, your doctor may prescribe medication
				to lower your cholesterol. Taking medication for high cholesterol may raise your life insurance rates but not nearly as much as uncontrolled hyperlipidemia will. Here are a few of the most popular cholesterol meds</p>
			<ul>
				<li>Zocor (simvastatin)</li>
				<li>Lipitor (atorvastatin)</li>
				<li>Crestor (rosuvastatin)</li>
				<li>Pravachol (pravastatin)</li>
				<li>Niaspan (niacin)</li>
				<li>Mevacor (lovastatin)</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.mayoclinic.org/diseases-conditions/high-blood-cholesterol/basics/definition/con-20020865</p>
			<p>http://www.heart.org/HEARTORG/Conditions/Cholesterol/AboutCholesterol/Hyperlipidemia_UCM_434965_Article.jsp<br/>
			</p>
			<h2 id="diabetes"><strong>Life Insurance With</strong><strong> Diabetes</strong></h2>
			<img class="article-image" src="../../img/diabetic-needle.jpg" alt="diabetic needle" width="300" height="300"/>
			<p>Image via Flickr by Jill A. Brown</p>
			<p><a href="https://www.noexam.com/life-insurance/health-conditions/diabetes/">Diabetes</a> is a condition that causes too much glucose (sugar) in the blood due to the body’s inability to produce enough insulin. Diabetes is diagnosed with either a glycated hemoglobin (A1C) test — 6.5
				percent or higher indicates diabetes — or a blood sugar test, a glucose level higher than 200 mg/dL on a random test or 126 mg/dL fasting indicates diabetes. Currently, 29.1 million Americans have the disease. Diabetes raises the risk of several serious health problems, including:
			</p>
			<ul>
				<li><strong>Cardiovascular disease: </strong>heart attack, stroke</li>
				<li><strong>Kidney damage</strong></li>
				<li><strong>Nerve damage: </strong>excess glucose damages tiny blood vessels</li>
				<li><strong>Eye damage/blindness</strong></li>
			</ul>
			<p>The CDC reports that an adult diabetic’s risk of death is 50 percent higher than that of an adult without diabetes. This highly elevated mortality risk is why life insurers consider diabetes as a factor in determining rates. Consider the table below to understand how diabetes might
				affect your life insurance premiums.</p>
			<table>
				<tbody>
				<tr>
					<td width="319"><strong>Preferred</strong></td>
					<td width="319"><strong>Regular</strong></td>
				</tr>
				<tr>
					<td width="319">Diabetics in otherwise excellent health (weight, tobacco use, blood pressure, etc.) with well-controlled A1C levels (less than 7.0). Likely also diagnosed later in life.</td>
					<td width="319">In “average” health and of average height and weight</td>
				</tr>
				</tbody>
			</table>
			<p>Applicants with well-controlled diabetes can still qualify for the best rates with some insurers, but diabetics who take medication or depend on insulin may pay higher premiums. Life insurers tend to prefer those who manage their diabetes with lifestyle changes (e.g., exercise,
				healthy diet, and losing weight). For others, medication is necessary. Here are some of the most common diabetes medications:</p>
			<ul>
				<li>Lantus (insulin glargine)</li>
				<li>Januvia (sitagliptin)</li>
				<li>Human insulin and devices</li>
				<li>NovoLog (insulin aspart)</li>
				<li>Humalog (insulin lispro)</li>
				<li>Glucophage (metformin)</li>
				<li>Glucotrol (glipizide)</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.mayoclinic.org/diseases-conditions/diabetes/basics/definition/con-20033091</p>
			<p>http://www.cdc.gov/diabetes/pubs/statsreport14/diabetes-infographic.pdf<br/>
			</p>
			<h2 id="backpain">Life Insurance and Back Pain</h2>
			<img class="article-image" src="../../img/back-pain.jpg" alt="back pain" width="225" height="300"/>
			<p>Image via Flickr by wu_135</p>
			<p>Back pain can result from any number of ailments, from a ruptured disk to kidney stones. The most common causes of back pain include ligament or muscle strain, osteoarthritis, ruptured or bulging disks, skeletal conditions, and osteoporosis. About 65 million Americans experience back
				pain, with 31 million of sufferers experiencing low-back pain. Back pain is the second most common reason for doctor’s visits.</p>
			<p>Not many would associate back pain with death, but chronic pain does elevate one’s mortality risk, which is why life insurers care. Regardless of the cause, back pain can lead to several potentially life-threatening conditions, including:</p>
			<ul>
				<li><strong>Depression/suicide- </strong>Depression is four times as common in those with back pain, sometimes leading sufferers to attempt suicide for pain relief.</li>
				<li><strong>Addiction/overdose- </strong>Opioid pain medications can exacerbate depression and alter mood and impulse control. Drugs prescribed for back pain are highly addictive as well.</li>
				<li><strong>Mobility- </strong>Back pain sufferers often have movement restrictions that may be severe enough to cause obesity due to inactivity.</li>
				<li><strong>Surgery-</strong> Sufferers might undergo multiple, risky surgeries in an attempt to correct the underlying condition.</li>
			</ul>
			<p>In determining the premiums of someone with back pain, life insurers will look at a variety of factors to gauge the mortality risk. These include:</p>
			<ul>
				<li>Cause</li>
				<li>Onset</li>
				<li>Medications</li>
				<li>Surgeries</li>
				<li>Mobility restrictions</li>
			</ul>
			<p>Managing your back pain can help you keep your life insurance rates affordable. Natural remedies include physical therapy, acupuncture, light exercise, massage, yoga, and chiropractic treatment. Medication is also an option, but remember that those who take medication for back pain,
				especially narcotics, usually pay higher life insurance rates. Here are a few popular back pain medications that might affect your rates:</p>
			<ul>
				<li>Ibuprofen</li>
				<li>Naproxen</li>
				<li>Cymbalta (duloxetine)</li>
				<li>Vicodin (acetaminophen/hydrocodone)</li>
				<li>Ultram (tramadol)</li>
				<li>Capsaicin topical cream</li>
				<li>Soma (carisoprodol)</li>
				<li>Dilaudid (hydromorphone)</li>
			</ul>
			<p>[cta id=&#8221;513&#8243; vid=&#8221;0&#8243;]<br/>
				<strong>Resources:</strong></p>
			<p>http://www.mayoclinic.org/diseases-conditions/back-pain/basics/definition/con-20020797</p>
			<p>http://www.ncbi.nlm.nih.gov/pubmed/17700450<br/>
			</p>
			<h2 id="anxiety">Life Insurance With Anxiety</h2>
			<p><img class="article-image" src="../../img/anxious-man.jpg" alt="anxious man" width="300" height="199"/>
			<p>Image via Flickr by CarbonNYC[in SF!]</p>
			<p>As the most common mental illness in the United States, anxiety disorders involve severe, frequent, and excessive worry about ordinary situations. Anxiety disorders can take many forms, including panic disorder, social phobia, generalized anxiety disorder (GAD), obsessive-compulsive
				disorder (OCD), and post-traumatic stress disorder (PTSD). These disorders affect 40 million Americans, or 18 percent of the population.</p>
			<p>You probably don’t associate nervousness with death, but the correlation does exist. The associated elevated risk of life-threatening diseases is why life insurance companies want to know about applicants’ anxiety diagnoses. The potentially lethal consequences of anxiety include:</p>
			<ul>
				<li>Depression</li>
				<li>Suicide</li>
				<li>Substance abuse</li>
				<li>Cardiovascular disease</li>
				<li>Insomnia</li>
				<li>Gastrointestinal problems</li>
			</ul>
			<p>If you have an anxiety disorder, your life insurance rates will depend on several factors, such as when you were diagnosed, the severity of your anxiety, the medications you take, whom you see for treatment and how often, suicidal ideation, and hospitalizations. Consult the table
				below to see how your anxiety disorder might affect your premiums.</p>
			<table>
				<tbody>
				<tr>
					<td width="213"><strong>Preferred Plus</strong></td>
					<td width="213"><strong>Regular</strong></td>
					<td width="213"><strong>Table-Rated (Substandard)</strong></td>
				</tr>
				<tr>
					<td width="213">Those with (a) well-managed anxiety who are (b) on only one medication that is (c) prescribed by a primary care physician (PCP) and not a psychiatrist can usually get preferred or preferred plus premiums</td>
					<td width="213">Those with moderate anxiety who (a) take two or more medications, and/or (b) are under the care of a psychiatrist, and/or (c) have been hospitalized in the past due to mental illness</td>
					<td width="213">Those with serious anxiety who (a) receive disability benefits or (b) have a history of suicidal ideation or suicide attempts</td>
				</tr>
				</tbody>
			</table>
			<p>Life insurance remains very affordable for those with well-managed anxiety. Simple lifestyle changes — such as relaxation techniques, sufficient sleep, and exercise — can help you control anxiety. Similarly, your doctor may prescribe medication. Taking medication for your disorder may
				raise your life insurance rates, but applicants taking just one medication can still receive preferred rates depending on their history. Here are a few of the most popular anxiety medications:</p>
			<ul>
				<li>Benzodiazepines
					<ul>
						<li>Valium (diazepam)</li>
						<li>Xanax (alprazolam)</li>
						<li>Ativan (lorazepam)</li>
						<li>Klonopin (clonazepam)</li>
					</ul>
				</li>
				<li>Buspar (buspirone)</li>
				<li>Vistaril (hydroxyzine)</li>
				<li>Zoloft (sertraline)</li>
				<li>Celexa (citalopram)</li>
			</ul>
			<strong>Resources:</strong></p>
			<p>http://www.mayoclinic.org/diseases-conditions/anxiety/basics/definition/con-20026282</p>
			<p>http://www.webmd.com/balance/guide/how-worrying-affects-your-body</p>
			<p>http://www.health.harvard.edu/mind-and-mood/treating-anxiety-without-medication<br/>
			</p>
			<h2 id="obesity">Life Insurance With Obesity</h2>
			<img class="article-image" src="../../img/obesity.jpg" alt="obesity" width="300" height="200"/>
			<p>Image via Flickr by Tobyotter</p>
			<p>Affecting more than one-third of American adults, obesity is defined as a body mass index (BMI) of 30 or higher. You can calculate your BMI with this formula: weight (lb)/[height (in)]<sup>2</sup> X 703. Obesity can lead to a long list of potentially fatal complications, including:
			</p>
			<ul>
				<li>Hyperlipidemia</li>
				<li>Cancer</li>
				<li>Hypertension</li>
				<li>Heart disease and stroke</li>
				<li>Sleep apnea</li>
				<li>Diabetes</li>
			</ul>
			<p>With complications that serious, it’s little wonder that obesity is the second-leading cause of preventable death in the U.S. The lethality of obesity is why life insurers are concerned about applicants’ BMIs. The table below will give you an idea of how obesity might affect your
				rates.</p>
			<table>
				<tbody>
				<tr>
					<td width="213"><strong>Preferred Plus</strong></td>
					<td width="213"><strong>Preferred</strong></td>
					<td width="213"><strong>Standard</strong></td>
				</tr>
				<tr>
					<td width="213">BMI no higher than 26-28</td>
					<td width="213">BMI of 27-34</td>
					<td width="213">BMI of 35-38 or higher</td>
				</tr>
				</tbody>
			</table>
			<p>Managing your weight can help keep your life insurance premiums affordable. Social support, exercise, and setting realistic weight-loss goals are just a few of the lifestyle modifications that can help manage obesity. Medication may also be an option. Taking medication for obesity may
				raise your life insurance rates, but it may also improve your BMI and place you in a better rate class. Here are a few of the most common medications for obesity:</p>
			<ul>
				<li>Orlistat (Xenical)</li>
				<li>Lorcaserin (Belviq)</li>
				<li>Phentermine-topiramate (Qsymia)</li>
				<li>Phentermine (Adipex-P, Suprenza)</li>
				<li>Desoxyn (methamphetamine)</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.mayoclinic.org/diseases-conditions/obesity/basics/definition/con-20014834</p>
			<p>http://www.ncbi.nlm.nih.gov/pubmed/23280227<br/>
			</p>
			<h2 id="acidreflux">Life Insurance With Acid Reflux</h2>
			<img class="article-image" src="../../img/antacids.jpg" alt="antacid pills" width="300" height="209"/>
			<p class="wp-caption-text">Image via Flickr by Treasure Tia</p>
			<p>Known as gastroesophageal reflux disease (GERD), acid reflux involves the backup of stomach acid into the esophagus. GERD affects approximately 18.6 million Americans. Chronic, untreated acid reflux can result in a host of complications, including:</p>
			<ul>
				<li>Narrowing of the esophagus (esophageal stricture)</li>
				<li>Esophagitis</li>
				<li>Esophageal ulcers</li>
				<li>Esophageal cancer</li>
				<li>Barrett’s esophagus</li>
			</ul>
			<p>These complications of GERD can eventually become life-threatening, which is why life insurers want to know if you suffer from acid reflux. Consult the table below to see how GERD may affect your life insurance rates.</p>
			<table>
				<tbody>
				<tr>
					<td width="213"><strong>Preferred Plus</strong></td>
					<td width="213"><strong>Preferred</strong></td>
					<td width="213"><strong>Standard</strong></td>
				</tr>
				<tr>
					<td width="213">Mild acid reflux treated only by over-the-counter (OTC) medication</td>
					<td width="213">Mild to moderate acid reflux treated by prescription medication</td>
					<td width="213">Moderate to severe acid reflux requiring ongoing treatment, possibly including surgery</td>
				</tr>
				</tbody>
			</table>
			<p>Controlling GERD through lifestyle remedies and medications can help you qualify for lower life insurance rates. Losing weight, avoiding trigger foods, eating smaller meals, and not smoking can help you manage GERD. Some GERD sufferers may also require medication. Remember that taking
				acid reflux medication might affect your life insurance premiums, but if it helps manage your GERD, your rate class may improve. Here are a few of the most popular medications for acid reflux:</p>
			<ul>
				<li>Aciphex (rabepazole)</li>
				<li>Pepcid AC (famotidine)</li>
				<li>Prevacid (iansoprazole)</li>
				<li>Prilosec (omeprazole)</li>
				<li>Protonix (pantoprazole)</li>
				<li>Tagamet (cimetidine)</li>
				<li>Zantac (ranitdine)</li>
				<li>Nexium (esomeprazole)</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.mayoclinic.org/diseases-conditions/gerd/basics/definition/con-20025201</p>
			<p>http://www.nytimes.com/health/guides/disease/gastroesophageal-reflux-disease/complications.html<br/>

			<h2 id="respiratorydisease">Life Insurance With Respiratory Diseases</h2>
			<img class="article-image" src="../../img/lungs.jpg" alt="model of lungs" width="300" height="221"/>
			<p>Image via Flickr by Cea.</p>
			<p>Respiratory disease is an umbrella term that encompasses many specific conditions, including chronic obstructive pulmonary disease (COPD), emphysema, sleep apnea, lung cancer, pneumonia, acute and chronic bronchitis, cystic fibrosis, and mesothelioma. The prevalence of respiratory
				disease
				varies by condition, from over ten million sufferers of COPD in the U.S. to 18 million sufferers of sleep apnea. Respiratory diseases can lead to potentially life-threatening health problems, including:</p>
			<ul>
				<li>Respiratory infections</li>
				<li>Hypertension</li>
				<li>Cardiovascular disease</li>
				<li>Depression</li>
				<li>Collapsed lung</li>
				<li>Fatigue/insomnia</li>
			</ul>
			<p>Because respiratory conditions can elevate your mortality risk, they can also impact your life insurance rates. Life insurers will consider the following factors in determining the rate class of someone with a respiratory ailment:</p>
			<ul>
				<li>What your respiratory disease is</li>
				<li>When you were diagnosed</li>
				<li>What medications you take</li>
				<li>Whether you smoke</li>
				<li>If you have quit smoking, when you quit</li>
				<li>The presence of any other medical conditions</li>
				<li>Whether you’ve ever been hospitalized for the condition</li>
				<li>Date and results of chest x-rays, ECG, etc.</li>
			</ul>
			<p>Those with mild respiratory disease that is well-managed with lifestyle changes and/or medication have a good chance of receiving preferred life insurance rates. Helpful lifestyle modifications may include quitting smoking, practicing proper breathing techniques, exercising and eating
				right, losing weight, and avoiding air pollution. Similarly, your doctor may prescribe medication to help manage your respiratory condition. Any of the following common respiratory medications may affect your premiums:</p>
			<ul>
				<li>Bronchodilators
					<ul>
						<li>Albuterol</li>
						<li>Ipratropium</li>
						<li>Salmeterol</li>
						<li>Spiriva (tiotropium)</li>
					</ul>
				</li>
				<li>Corticosteroids
					<ul>
						<li>Fluticasone (Flovent)</li>
						<li>Prednisolone, prednisone</li>
					</ul>
				</li>
			</ul>
			<ul>
				<li>Antibiotics
					<ul>
						<li>Amoxicillin</li>
						<li>Doxycycline</li>
					</ul>
				</li>
				<li>Phosphodiesterase-4 (PDE4) inhibitors
					<ul>
						<li>Roflumilast (Daliresp)</li>
					</ul>
				</li>
				<li>Methylxanthines
					<ul>
						<li>Theophylline</li>
					</ul>
				</li>
			</ul>
			<p>[cta id=&#8221;513&#8243; vid=&#8221;0&#8243;]<br/>
				<strong>Resources:</strong></p>
			<p>http://www.lung.org/lung-disease/list.html</p>
			<p>http://www.mayoclinic.org/diseases-conditions/copd/basics/definition/con-20032017</p>
			<p>http://www.healthypeople.gov/2020/topics-objectives/topic/respiratory-diseases<br/>
			</p>
			<h2 id="hypothyroidism">Life Insurance With Hypothyroidism</h2>
			<img class="article-image" src="../../img/thyroid.jpg" alt="thyroid" width="200" height="300"/>
			<p>Image via Flickr by euthman</p>
			<p>Also known as underactive thyroid, hypothyroidism is a condition in which the thyroid gland doesn’t produce enough thyroid hormone. The thyroid manages metabolism, or the process of converting food into energy. Without adequate thyroid hormone, the body doesn’t produce as much energy,
				and
				metabolism slows down. About 20 million Americans suffer from some form of thyroid disease. Untreated, hypothyroidism can lead to the following complications:</p>
			<ul>
				<li>Depression</li>
				<li>Goiter</li>
				<li>Heart disease</li>
				<li>Myxedema</li>
				<li>Obesity</li>
			</ul>
			<p>In applying for life insurance, the symptoms of an underactive thyroid will be of greater concern to insurers than the condition itself. Here are a few of the factors life insurers consider in determining the rates of an applicant with hypothyroidism:</p>
			<ul>
				<li>Are you maintaining a healthy weight on your own?</li>
				<li>What are your current thyroid levels?</li>
				<li>When were you diagnosed with hypothyroidism?</li>
				<li>Are you taking medication?</li>
				<li>What symptoms do you experience as a result of your thyroid condition, if any?</li>
			</ul>
			<p>Hypothyroidism itself is not life-threatening; rather, it is the complications of poorly managed hypothyroidism that can be lethal. For this reason, you can significantly improve your life insurance premiums by managing your thyroid condition with lifestyle changes and medication.
				Exercising, eating properly, and getting adequate sleep can help improve hypothyroidism.</p>
			<p>Likewise, your doctor may put you on medication to raise your thyroid levels. Taking medication will likely affect your rates, but the overall effect will be positive if the medication helps keep your thyroid in check. Here are a few of the most popular thyroid medications:</p>
			<ul>
				<li>Synthroid (levothyroxine)</li>
				<li>Thyrolar-1,-2,-3 (liotrix)</li>
				<li>Nature-Throid, Armour Thyroid (thyroid desiccated)</li>
				<li>Thyroxine</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://umm.edu/health/medical/reports/articles/hypothyroidism</p>
			<p>http://www.mayoclinic.org/diseases-conditions/hypothyroidism/basics/definition/con-20021179<br/>
			</p>
			<h2 id="osteoarthritis">Osteoarthritis/Joint Pain</h2>
			<img class="article-image" src="../../img/joint-pain.jpg" alt="joint pain" width="200" height="300"/>
			<p>Image via Flickr by handarmdoc</p>
			<p>Affecting more than 27 million Americans, osteoarthritis is the inflammation of joints that causes stiffness and joint pain. Osteoarthritis is typically caused by wear and tear on the joints and tends to worsen with age. Potential complications associated with arthritis include:</p>
			<ul>
				<li>Permanent disability</li>
				<li>Mobility restrictions</li>
				<li>Chronic pain</li>
				<li>Deformity</li>
				<li>Inability to perform daily tasks</li>
			</ul>
			<p>The life insurance rates of applicants with joint pain will depend on several factors, including the type of arthritis, date of onset, whether tissues other than joints are involved, medications taken, degree of disability, and the extent to which the condition interferes with the
				activities of daily living. See the table below to estimate how your osteoarthritis might affect your premiums.</p>
			<table>
				<tbody>
				<tr>
					<td width="213"><strong>Preferred Plus</strong></td>
					<td width="213"><strong>Preferred</strong></td>
					<td width="213"><strong>Standard or Below</strong></td>
				</tr>
				<tr>
					<td width="213">Mild, infrequent joint pain managed without medication or with OTC NSAIDs; no interference with activities of daily living</td>
					<td width="213">Mild to moderate joint pain managed with prescription medication; small to moderate interference with activities of daily living</td>
					<td width="213">Severe, frequent joint pain resulting in disability, mobility restrictions, and/or inability to perform many activities of daily living</td>
				</tr>
				</tbody>
			</table>
			<p>Those with well-managed osteoarthritis have an excellent chance of receiving preferred rates. Lifestyle changes, such as losing weight, exercising, and using cold and heat, can help you manage joint pain. Medication may also help, although life insurers will consider the use of
				medication
				in determining your rates. The use of NSAIDs, such as Advil, for joint pain is unlikely to elevate your rates significantly, but the use of narcotics may raise premiums. Here are some of the most common medications used for joint pain:</p>
			<ul>
				<li><strong>Analgesics</strong>
					<ul>
						<li>Acetaminophen (Tylenol)</li>
						<li>Hydrocodone (Vicodin)</li>
						<li>Tramadol (Ultram)</li>
						<li>Oxycodone (Oxycontin, Percocet)</li>
						<li><strong>Nonsteroidal anti-inflammatory drugs</strong>
							<ul>
								<li>Ibuprofen (Advil, Motrin IB)</li>
								<li>Aleve</li>
								<li><strong>Corticosteroids</strong>
									<ul>
										<li>Prednisone</li>
										<li>Cortisone</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.cdc.gov/arthritis/data_statistics/arthritis_related_stats.htm</p>
			<p>http://www.mayoclinic.org/diseases-conditions/arthritis/basics/definition/con-20034095<br/>
			</p>
			<h2 id="depression">Life Insurance With Depression</h2>
			<img class="article-image" src="../../img/depression.jpg" alt="depression" width="300" height="200"/>
			<p>Image via Flickr by KellyB.</p>
			<p>Formally known as Major Depressive Disorder, depression is a mental illness that causes lasting feelings of sadness, hopelessness, and worthlessness. Each year, depression affects more than 19 million Americans. Depression is a potentially life-threatening disease that can lead to
				complications such as:</p>
			<ul>
				<li>Obesity</li>
				<li>Substance abuse</li>
				<li>Suicide</li>
				<li>Self-mutilation</li>
				<li>Anxiety</li>
			</ul>
			<p>Recent studies have shown that depression is as deadly as smoking, almost doubling the sufferer’s mortality risk. The potential lethality of depression is what makes the disorder a top concern for life insurers.</p>
			<p>In determining your rates, life insurers will want to know when you were diagnosed, whether you see a psychiatrist, what medications you take (if any), how long you’ve received treatment, and how you’ve responded to treatment. Your insurer will also likely ask about previous
				hospitalizations, suicide attempts, substance abuse, comorbid mental illnesses, and employment status. See the table below to gauge how a diagnosis of depression might affect your premiums.</p>
			<table>
				<tbody>
				<tr>
					<td width="213"><strong>Preferred Plus</strong></td>
					<td width="213"><strong>Regular</strong></td>
					<td width="213"><strong>Table-Rated (Substandard)</strong></td>
				</tr>
				<tr>
					<td width="213">Those with (a) well-controlled depression who are (b) on only one medication that is (c) prescribed by a primary care physician (PCP) and not a psychiatrist may qualify for preferred or even preferred plus rates</td>
					<td width="213">Those with moderate depression or bipolar depression who (a) take more than one medication, and/or (b) are under the care of a psychiatrist, and/or (c) have been hospitalized in the past due to mental illness</td>
					<td width="213">Those with serious depression who (a) receive disability benefits or (b) have a history of suicidal ideation or suicide attempts</td>
				</tr>
				</tbody>
			</table>
			<p>Lifestyle remedies and medication can help you manage your depression and thus receive more affordable life insurance premiums. Exercise, sufficient sleep, therapy, support groups, and abstinence from alcohol and drugs can help control depressive episodes. While taking several
				medications
				for depression may raise your premiums, managing depression well with a single medication will improve your chances of receiving the best rates. Several common antidepressant medications are listed below.</p>
			<ul>
				<li>Zoloft (sertraline)</li>
				<li>Celexa (citalopram)</li>
				<li>Prozac (fluoxetine)</li>
				<li>Desyrel (trazodone)</li>
				<li>Lexapro (escitalopram)</li>
				<li>Cymbalta (duloxetine)</li>
				<li>Wellbutrin (bupropion)</li>
				<li>Effexor (venlafaxine)</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.mayoclinic.org/diseases-conditions/depression/basics/definition/con-20032977</p>
			<p>http://www.ncbi.nlm.nih.gov/pubmed/12450639</p>
			<p>http://www.ox.ac.uk/news/2014-05-23-many-mental-illnesses-reduce-life-expectancy-more-heavy-smoking#<br/>
			</p>
			<h2 id="asthma">Life Insurance With Asthma</h2>
			<img class="article-image" src="../../img/asthma-inhaler.jpg" alt="asthma inhaler" width="300" height="199"/>
			<p>Image via Flickr by NIAID</p>
			<p>Experienced by about 10 percent of Americans, asthma is a respiratory disease characterized by inflammation of the airways. Symptoms include breathing difficulty, coughing, wheezing, and chest tightness. Asthma may result in a number of complications, such as:</p>
			<ul>
				<li>Hospitalizations from asthma attacks</li>
				<li>Sleep disturbances</li>
				<li>Interference with daily activities</li>
				<li>Side effects of asthma medications</li>
				<li>Permanent narrowing of bronchial tubes</li>
			</ul>
			<p>Asthma can vary widely in severity from individual to individual, and life insurers are most concerned with more serious cases. While asthmatics do have a higher mortality risk than non-asthmatics, those with well-controlled asthma have an excellent chance of being underwritten
				favorably.
				In determining the rates of someone with asthma, life insurers typically consider these factors:</p>
			<ul>
				<li>Number of attacks per year</li>
				<li>Asthma-related hospitalizations</li>
				<li>Frequency of steroid treatment</li>
				<li>Asthma-related disabilities</li>
			</ul>
			<p>Managing your asthma through lifestyle modifications and medication may qualify you for preferred life insurance rates. Using your air-conditioning, humidifying, and cleaning and dusting often can help control asthma symptoms. You might also need to take medication, which life
				insurers
				may view favorably if it minimizes the severity of your asthma. Here are a few of the most common asthma medications:</p>
			<ul>
				<li>Singulair (montelukast)</li>
				<li>Medrol (methylprednisolone)</li>
				<li>Flovent (fluticasone)</li>
				<li>Advair Diskus (fluticasone-salmeterol)</li>
				<li>Theo-24 (theophylline)</li>
				<li>Serevent (salmeterol)</li>
				<li>Pulmicort Flexhaler (budesonide)</li>
			</ul>
			<strong>Resources:</strong></p>
			<p>http://www.cdc.gov/nchs/fastats/asthma.htm</p>
			<p>http://www.mayoclinic.org/diseases-conditions/asthma/basics/definition/con-20026992</p>
			<p>https://www.aafa.org/display.cfm?sub=42&#038;id=8<br/>

			<h2 id="fibromyalgia">Fibromyalgia</h2>
			<img class="article-image" src="../../img/headache.jpg" alt="Image via Flickr by r.nial.bradshaw" width="300" height="200"/>
			<p>Image via Flickr by r.nial.bradshaw</p>
			<p>Affecting more than 12 million Americans, fibromyalgia is a musculoskeletal condition that causes joint and muscle pain, fatigue, and mood changes. Untreated fibromyalgia may lead to the following health problems:</p>
			<ul>
				<li>Depression and suicide</li>
				<li>Anxiety</li>
				<li>Social isolation</li>
				<li>Disability</li>
				<li>Mobility restrictions</li>
			</ul>
			<p>Fibromyalgia by itself will not necessarily raise your life insurance premiums, but it is often comorbid with a number of serious conditions, including depression, lupus, arthritis, and irritable bowel syndrome (IBS). The presence of these conditions in conjunction with fibromyalgia
				will
				raise your mortality risk and possibly your rates as well. Here are the factors life insurers consider when determining the rate class of an applicant with fibromyalgia:</p>
			<ul>
				<li><strong>When were you diagnosed? </strong>The longer you’ve had fibromyalgia, the more likely you are to receive premium rates, assuming your condition is stable and well-managed.</li>
				<li><strong>How severe and frequent is your pain?</strong></li>
				<li><strong>What medications do you take, if any?</strong></li>
				<li><strong>Are you able to perform all activities of daily living without difficulty?</strong></li>
				<li><strong>Do you have any other conditions besides fibromyalgia? </strong>The presence of depression and other frequently co-occurring disorders may result in substandard rates</li>
				<li><strong>Do you receive disability benefits? </strong>Your insurer will ask about your employment status to see how disabling your condition is.</li>
			</ul>
			<p>Applicants with well-controlled fibromyalgia can usually qualify for at least standard rates. Lifestyle changes such as eating healthy, exercising, and minimizing stress can help alleviate fibromyalgia pain. Some sufferers may also require medication, which may affect life insurance
				premiums. Rates tend to be higher for fibromyalgia sufferers who take narcotics (e.g., Vicodin, Oxycontin) and/or steroids because of the drugs’ inherent risks. Here are some other common medications for fibromyalgia:</p>
			<ul>
				<li><strong>Analgesics: </strong>acetaminophen, ibuprofen, naproxen, tramadol (Ultram, Conzip)</li>
				<li><strong>Antidepressants:</strong> duloxetine (Cymbalta), milnacipran (Savella), amitriptyline, fluoxetine (Prozac)</li>
				<li><strong>Anti-seizure drugs: </strong>gabapentin (Neurontin, Gralise), pregabalin (Lyrica)</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.mayoclinic.org/diseases-conditions/fibromyalgia/basics/definition/con-20019243</p>
			<p>http://www.ncbi.nlm.nih.gov/pmc/articles/PMC3998848/<br/>
			</p>
			<h2 id="stds">Life Insurance With Sexually Transmitted Diseases (STDs)</h2>
			<img class="article-image" src="../../img/std.jpg" alt="hugging couple" width="199" height="300"/>
			<p>Image via Flickr by pedrosimoes7</p>
			<p>Also called sexually transmitted infections (STIs), sexually transmitted diseases, or STDs, are infectious diseases spread through sexual contact with an infected person. STDs are a common problem — the CDC reports that 110 million Americans have STDs at any given point. Most STDs are
				not
				life-threatening, but some can pose serious health risks if left untreated. Below, you’ll find a list of the most common STDs as well as their potential complications:</p>
			<ul>
				<li><strong>HPV (Human Papillomavirus): </strong>genital warts, cancer of the throat, mouth, cervix, or penis.</li>
				<li><strong>Chlamydia:</strong> elevated HIV risk, pelvic inflammatory disease (PID), prostate gland infection.</li>
				<li><strong>Gonorrhea:</strong> PID, joint infections, elevated HIV risk</li>
				<li><strong>Syphilis:</strong> stroke, cardiovascular damage, neurological problems, meningitis</li>
				<li><strong>Herpes: </strong>meningitis, elevated HIV risk</li>
				<li><strong>Trichomoniasis: </strong>elevated HIV risk</li>
				<li><strong>HIV/AIDS: </strong>cancer, secondary infections, death</li>
			</ul>
			<p>Because the complications of certain STDs can be fatal, life insurers typically ask whether you have ever been diagnosed with an STD. The effect an STD will have on your life insurance rates will depend on the severity of the STD. For instance, if you have HIV/AIDS, you might not be
				eligible for coverage from a traditional provider. The coverage that HIV-positive applicants receive also usually involves high premiums and a modest death benefit.</p>
			<p>On the other hand, preferred plus rates might be available to those with minor STDs that have been treated or well-managed. Here are the factors life insurers are likely to consider in determining the rates of an applicant with an STD:</p>
			<ul>
				<li>Date of diagnosis</li>
				<li>Severity and type of STD</li>
				<li>Medications/treatments received</li>
				<li>Response to treatment/medication</li>
				<li>Any complications/symptoms experienced as a result</li>
			</ul>
			<p>Sticking with a treatment plan and using medication successfully for an STD can help lower your life insurance premiums. Taking certain STD medications may raise your rates but not nearly to the extent that an unmanaged STD would. Here are a few common STD medications:</p>
			<ul>
				<li>Rocephin (ceftriaxone)</li>
				<li>Azithromycin</li>
				<li>Penicillin</li>
				<li>Zovirax (acyclovir)</li>
				<li>Valtrex (valaciclovir)</li>
				<li>Metronidazole</li>
				<li>Doxycycline</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.webmd.com/sexual-conditions/most-common-stds-men-women</p>
			<p>http://www.mayoclinic.org/diseases-conditions/sexually-transmitted-diseases-stds/basics/definition/con-20034128<br/>
			</p>
			<h2 id="alcoholism">Alcoholism and Life Insurance</h2>
			<p><img class="article-image" src="../../img/vodka-drinker.jpg" alt="vodka drinker" width="300" height="300"/>
			<p>Image via Flickr by CarbonNYC [in SF!]</p>
			<p>Also known as alcohol dependence or alcohol addiction, alcoholism is a substance abuse disorder characterized by an inability to control one’s drinking, alcohol tolerance and dependence, and preoccupation with drinking. Alcoholics often continue to drink in spite of negative social,
				financial, professional, and legal consequences. Alcoholism also takes a heavy physiological toll, with complications including:</p>
			<ul>
				<li><strong>Motor vehicle accidents</strong> from driving under the influence.</li>
				<li><strong>Suicide</strong></li>
				<li><strong>Liver disease</strong></li>
				<li><strong>Pancreatitis</strong></li>
				<li><strong>Seizures</strong></li>
				<li><strong>Increased risk of cancer </strong>of the throat, stomach, liver, mouth, breast, and colon</li>
				<li><strong>Hypertension</strong>, which can lead to heart failure and stroke</li>
				<li><strong>Heightened risk of criminal activity and imprisonment, </strong>both of which are associated with shorter lifespan</li>
			</ul>
			<p>Alcoholism affects almost 20 million Americans and greatly increases mortality risk. Alcoholic men are twice as likely as their non-alcoholic counterparts to die prematurely, while alcoholic women are five times as likely. Given the lethality of alcoholism, it makes sense for life
				insurance companies to ask about your history with substance abuse. Here are the things your life insurer will want to know about your history with alcohol:</p>
			<ul>
				<li><strong>If you are abstinent, how long have you been sober? </strong>The rate of relapse is high for recovering alcoholics before five years of sobriety, which is when most insurers will consider offering preferred rates if health is otherwise good.</li>
				<li><strong>If you still drink, how many drinks do you have per day? </strong>Generally, having more than two drinks per day will preclude you from preferred rates, and having more than three or four may also preclude you from standard rates.</li>
				<li><strong>Do you have any alcohol-related health problems, such as cirrhosis?</strong></li>
				<li><strong>Have you sought substance abuse treatment or attended 12-step meetings?</strong></li>
				<li><strong>Do you have any driving under the influence offenses in the past five years?</strong></li>
			</ul>
			<p>The rates you receive as a recovering alcoholic will depend on the severity of your problem and your sobriety time. Managing your alcoholism through sustained sobriety will help you earn your way to premium rate classes. Lifestyle changes conducive to sobriety include attending
				Alcoholics
				Anonymous or another 12-step group, changing your social situation, and living a healthier life through diet, exercise, and adequate sleep.</p>
			<p>Similarly, your doctor might decide to prescribe medication to control cravings and support your sobriety. Taking medication for alcoholism will likely affect your life insurance rates but not as much as the length of your sobriety will. Here are a few common medications prescribed to
				treat alcoholism and its effects:</p>
			<ul>
				<li>Naltrexone (Vivitrol, ReVia)</li>
				<li>Disulfiram (Antabuse)</li>
				<li>Acamprosate (Campral)</li>
				<li>Topiramate (Topamax)</li>
				<li>Benzodiazepines (e.g., Valium, Xanax)</li>
				<li>Thiamine</li>
			</ul>
			<p><strong>Resources:</strong></p>
			<p>http://www.cdc.gov/nchs/fastats/alcohol.htm</p>
			<p>http://pubs.niaaa.nih.gov/publications/arh27-1/39-51.htm</p>
			<p>http://www.mayoclinic.org/diseases-conditions/alcoholism/basics/definition/con-20020866<br/>
			</p>
			<h2 id="drugaddiction">Drug Addiction and Life Insurance</h2>
			<img class="article-image" src="../../img/addiction.jpg" alt="drug addiction" width="200" height="300"/>
			<p class="wp-caption-text">Image via Flickr by Alan Cleaver</p>
			<p>Drug addiction refers to a physiological dependence on a drug or medication. Drug addicts cannot control their drug use, continuing to use in the face of serious consequences. About 23.5 million Americans are addicted to alcohol and drugs. Some of the consequences of drug abuse
				include:</p>
			<ul>
				<li>Psychotic behavior</li>
				<li>Overdose</li>
				<li>Suicide</li>
				<li>Seizures</li>
				<li>Brain damage</li>
				<li>Heightened risk of communicable disease, trauma, and domestic violence</li>
				<li>Accidents</li>
			</ul>
			<p>Given the consequences of drug abuse, it’s not surprising that drug users have a mortality rate that is 10-20 times higher that of the general population of the same age and sex. The lethality of drug addiction is why life insurers are usually wary about insuring applicants with
				chemical
				dependency. If you are actively using, most life insurers will deny you coverage, although some may offer standard or substandard rates to applicants who use marijuana recreationally. Here are the factors life insurers typically consider in determining the rates of applicants with
				drug
				addictions:</p>
			<ul>
				<li><strong>If you are abstinent, how long have you been clean? </strong>Some insurers will not offer coverage to addicts who have been clean less than one year, while others require even more clean time. Generally, a recovering addict in otherwise good health may be eligible for
					preferred rates after five years of abstinence.
				</li>
				<li><strong>How long did you use drugs? </strong>The longer the addiction lasted, the higher the risk you represent to a life insurer.</li>
				<li><strong>How severe was your addiction? </strong>Your life insurer will likely want to know what drugs you used and whether you needed outpatient or inpatient treatment, 12-step support groups, etc. to quit.</li>
				<li><strong>Do you have any drug-related medical issues?</strong></li>
				<li><strong>Have you had any drug-related charges in the last five years?</strong></li>
				<li><strong>Are you currently stable? </strong>A steady job, home, etc. may improve your chances of receiving preferred rates.</li>
			</ul>
			<p>Managing your addiction will help you qualify for the best rate class. For one, lifestyle changes can help you control your condition. Therapy, addressing underlying mental health issues, support groups, and exercise can help keep addiction in check. Additionally, your doctor may
				prescribe medication to help control cravings or mitigate withdrawal. Taking medication for your addiction may raise your premiums, but uncontrolled addiction may bar you from coverage altogether. Here are a few common medications prescribed for drug addiction:</p>
			<ul>
				<li>Naltrexone (Vivitrol)</li>
				<li>Methadone</li>
				<li>Buprenorphine (Subutex, Suboxone)</li>
				<li>Bupropion (Wellbutrin)</li>
			</ul>
			<p>
				<strong>Resources:</strong></p>
			<p>http://www.drugabuse.gov/publications/drugfacts/treatment-approaches-drug-addiction</p>
			<p>http://www.mayoclinic.org/diseases-conditions/drug-addiction/basics/definition/con-20020970</p>
			<p>While medications and pre-existing medical conditions may increase your life insurance premiums, they won’t necessarily make coverage unavailable or cost-prohibitive. Assuming the condition is well-controlled, many life insurers will give preferred rates even if one of these diseases
				is
				present. Managing the condition with medication and lifestyle improvements are the keys to keeping life insurance rates reasonable.</p>
		</article>

	</section>
	<!-- END PAGE-CONTENT -->
	<section class="related-articles">
		<?=$this->render('/main/widgets/related-articles.php');?>
	</section>
</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>
